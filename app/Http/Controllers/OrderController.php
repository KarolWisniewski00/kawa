<?php

namespace App\Http\Controllers;

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
use Throwable;

class OrderController extends Controller
{
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
        $orders = Order::where('user_id',$user->id)->orderBy('created_at', 'desc')->paginate(20);
        return view('client.coffee.account.order.index',compact('orders'));
    }
    public function create()
    {
        $photos = ProductImage::get();
        $cartItems = \Cart::session('cart')->getContent();

        $user = Auth::user();
        return view('client.coffee.account.order.create', compact('photos', 'cartItems', 'user'));
    }
    public function store(CreateOrderRequest $request)
    {
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
        $company = Company::get()->pluck('content','type');

        if($total >= $company['free_ship']){}
        else{
            $total = $total + $company['price_ship'];
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
            'status' => 'Oczekujące na płatność',
        ]);

        foreach ($cartContent as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'attributes_name' => $item->attributes[0],
                'attributes_grind' => $item->attributes[1],
            ]);
        }


        \Cart::session('cart')->clear();

        // Wyślij e-mail
        $email = new OrderMail($order);
        Mail::to($request->email)->send($email->build());

        return redirect()->route('account.order.show',$order->id)->with('success', 'Dziękujemy, zamówienie zostało złożone.');
    }
    public function show($slug){
        $user = Auth::user();
        $order = Order::where('id',$slug)->first();
        $orders = OrderItem::where('order_id', $slug)->get();
        $photos = ProductImage::get();
        return view('client.coffee.account.order.show', compact('order','orders','photos'));
    }
}
