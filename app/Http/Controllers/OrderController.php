<?php

namespace App\Http\Controllers;

use App\Enums\OrderLog as EnumsOrderLog;
use App\Enums\PaymentStatus;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;
use Darryldecode\Cart\CartItem;
use Darryldecode\Cart\CartCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\OrderMail;
use App\Models\OrderLog;
use App\Models\Payment;
use App\Models\Product;
use Devpark\Transfers24\Exceptions\RequestException;
use Devpark\Transfers24\Exceptions\RequestExecutionException;
use Devpark\Transfers24\Requests\Transfers24;
use Illuminate\Support\Facades\Log;
use Throwable;

class OrderController extends Controller
{
    private Transfers24 $transfers24;

    public function __construct(Transfers24 $transfers24)
    {
        $this->transfers24 = $transfers24;
    }

    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('account.order', function ($trail) {
            $trail->parent('index');
            $trail->push('Zamówienia', route('account.order'));
        });
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(20);
        return view('client.coffee.account.order.index', compact('orders'));
    }
    public function create()
    {
        $photos = ProductImage::get();
        $cartItems = \Cart::session('cart')->getContent();

        $user = Auth::user();
        $elements = Company::get();
        return view('client.coffee.account.order.create', compact('photos', 'cartItems', 'user', 'elements'));
    }
    public function store(CreateOrderRequest $request)
    {
        if ($request->type_transfer == 'false' && $request->type_transfer_24 == 'false') {
            return redirect()->back()->with('fail', 'Administrator nie ustawił formy płatności. Przepraszamy za utrudnienia.');
        }
        $cartContent = \Cart::session('cart')->getContent();

        if ($cartContent->isEmpty()) {
            return redirect()->back()->with('fail', 'Nie można złożyć zamówienia gdy koszyk jest pusty.');
        }
        try {
            $user = Auth::user();
            $usrid = $user->id;
        } catch (Throwable $e) {
            $usrid = null;
        }

        $total = \Cart::session('cart')->getTotal();
        $company = Company::get()->pluck('content', 'type');
        if ($request->adres_type >= 'adres_person') {
        } else {
            if ($total >= $company['free_ship']) {
            } else {
                $total = $total + $company['price_ship'];
            }
        }
        $order = Order::create([
            'number' => Str::random(4),
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company ? $request->company : null,
            'nip' => $request->nip,
            'post' => $request->post,
            'adres' => $request->street,
            'adres_extra' => $request->street_extra,
            'city' => $request->city,
            'phone' => $request->phone,
            'extra' => $request->extra,
            'user_id' => $usrid,
            'total' => $total,
            'adres_type' => $request->adres_type,
            'status' => 'Oczekujące na płatność',
        ]);

        foreach ($cartContent as $item) {
            $o = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'attributes_name' => $item->attributes[0],
                'attributes_grind' => $item->attributes[1],
            ]);
            $product = Product::where('name', $item->name)->firstOrFail();
            $product->update(['sell' => intval($product->sell) + $item->quantity]);
        }
        OrderLog::create([
            'name' => 'Klient',
            'description' => 'Utworzenie zamówienia',
            'type' => EnumsOrderLog::CLIENT,
            'order_id' => $order->id,
        ]);
        if ($request->type_transfer_24 == 'true') {
            return $this->paymentTransaction($order);
        } elseif ($request->type_transfer == 'true') {
            \Cart::session('cart')->clear();

            // Wyślij e-mail
            $email = new OrderMail($order);
            Mail::to($request->email)
                ->to('admin@coffeesummit.pl')
                ->to('sklep@coffeesummit.pl')
                ->to('kontakt@coffeesummit.pl')
                ->to('radek.karminski@coffeesummit.pl')
                ->send($email->build());
            $response = $this->createInvoice($order);
            $this->logAndReturnResponseFromCreateInvoice($response, $user, $order, false);
            return redirect()->route('account.order.show', $order->id)->with('success', 'Dziękujemy, zamówienie zostało złożone.');
        }
    }
    public function show($slug)
    {
        $user = Auth::user();
        $order = Order::where('id', $slug)->first();
        $orders = OrderItem::where('order_id', $slug)->get();
        $photos = ProductImage::get();
        return view('client.coffee.account.order.show', compact('order', 'orders', 'photos'));
    }
    private function paymentTransaction(Order $order)
    {
        $payment = new Payment();
        $payment->order_id = $order->id;
        $this->transfers24->setEmail($order->email)->setAmount($order->total);
        try {
            $response = $this->transfers24->init();
            if ($response->isSuccess()) {
                $payment->status = PaymentStatus::IN_PROGRESS;
                $payment->session_id = $response->getSessionId();
                $payment->save();
                $order->update([
                    'status' => 'Weryfikacja płatności'
                ]);

                \Cart::session('cart')->clear();
                OrderLog::create([
                    'name' => 'Przelewy24',
                    'description' => 'Przeniesienie do zewnętrznego systemu płatności Przelewy24. Zmiana statusu na Weryfikacja płatności',
                    'type' => EnumsOrderLog::SYSTEM,
                    'order_id' => $order->id,
                ]);
                return redirect($this->transfers24->execute($response->getToken(), false));
            } else {
                $payment->status = PaymentStatus::FAIL;
                $payment->error_code = $response->getErrorCode();
                $payment->error_description = json_encode($response->getErrorDescription());
                $payment->save();
                OrderLog::create([
                    'name' => '[Błąd] Przelewy24',
                    'description' => 'Operacja przeniesienia użytkownika do zewnętrznego systemu płatności się nie powiodła',
                    'type' => EnumsOrderLog::SYSTEM,
                    'order_id' => $order->id,
                ]);
                return back()->with('fail', 'Ups. Coś poszło nie tak.');
            }
        } catch (RequestException | RequestExecutionException $error) {
            Log::error('Błąd transakcji', ['error' => $error]);
            OrderLog::create([
                'name' => '[Błąd krytyczny] Przelewy24',
                'description' => 'Operacja przeniesienia użytkownika do zewnętrznego systemu płatności się nie powiodła',
                'type' => EnumsOrderLog::SYSTEM,
                'order_id' => $order->id,
            ]);
            return back()->with('fail', 'Ups. Coś poszło nie tak.');
        }
    }
    public function status($id, $slug)
    {
        $user = Auth::user();
        switch ($slug) {
            case 0:
                $res = Order::where('id', '=', $id)->update(['status' => 'Anulowano']);
                OrderLog::create([
                    'name' => 'Klient',
                    'description' => 'Zmiana statusu na Anulowano',
                    'type' => EnumsOrderLog::CLIENT,
                    'order_id' => $id,
                ]);
                break;
        }
        if ($res) {
            return redirect()->route('account.order.show', $id)->with('success', 'Status został pomyślnie zapisany.');
        } else {
            return redirect()->route('account.order.show', $id)->with('fail', 'Status nie został zapisany.');
        }
    }
}
