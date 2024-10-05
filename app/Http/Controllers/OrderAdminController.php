<?php

namespace App\Http\Controllers;

use App\Enums\OrderLog as EnumsOrderLog;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderLog;
use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderAdminController extends Controller
{
    private function gShow(Order $order)
    {
        $user = Auth::user();
        $orders = OrderItem::where('order_id', $order->id)->get();
        $photos = ProductImage::get();
        foreach ($orders as $o) {
            foreach ($photos as $photo) {
                $p = Product::where('name', $o->name)->first();
                if ($photo->product_id == $p->id) {
                    if ($photo->order == 1) {
                        $photo_good = $photo->image_path;
                    }
                }
            }
        }
        $order = Order::where('id', $order->id)->first();
        $order_logs = OrderLog::where('order_id', $order->id)->get();
        //
        if ($order->name_recive != null) {
            $name = $order->name_recive;
        } else {
            $name = $order->name;
        }
        if ($order->email_recive != null) {
            $email = $order->email_recive;
        } else {
            $email = $order->email;
        }
        if ($order->phone_recive != null) {
            $phone = $order->phone_recive;
        } else {
            $phone = $order->phone;
        }
        $name_splited = $this->splitName($name);
        $adres_splited = $this->splitName($order->adres);
        //
        return view('admin.order.show', compact(
            'order',
            'orders',
            'photos',
            'photo_good',
            'order_logs',
            'name_splited',
            'adres_splited',
            'email',
            'phone',
        ));
    }
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(20);
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $today = Carbon::now()->startOfDay();
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfYear = Carbon::now()->startOfYear();

        // Pobranie zamówień z ostatniego tygodnia, których status to "W trakcie realizacji"
        $ordersSevenDaysAgo = Order::where('created_at', '>=', $sevenDaysAgo)
            ->where('status', 'W trakcie realizacji')
            ->get();

        // Obliczenie sumy kwot tych zamówień
        $totalSevenDaysAgo = $ordersSevenDaysAgo->sum('total');

        // Pobranie zamówień z dzisiaj, których status to "W trakcie realizacji"
        $ordersToday = Order::where('created_at', '>=', $today)
            ->where('status', 'W trakcie realizacji')
            ->get();

        // Obliczenie sumy kwot tych zamówień
        $totalToday = $ordersToday->sum('total');

        // Pobranie zamówień z bieżącego miesiąca, których status to "W trakcie realizacji"
        $ordersThisMonth = Order::where('created_at', '>=', $startOfMonth)
            ->where('status', 'W trakcie realizacji')
            ->get();

        // Obliczenie sumy kwot tych zamówień
        $totalThisMonth = $ordersThisMonth->sum('total');

        // Pobranie zamówień z ostatniego tygodnia do JavaScript
        $ordersJS = Order::where('created_at', '>=', $sevenDaysAgo)
            ->where('status', 'W trakcie realizacji')
            ->get();

        // Pobranie zamówień z bieżącego roku, których status to "W trakcie realizacji"
        $ordersThisYear = Order::where('created_at', '>=', $startOfYear)
            ->where('status', 'W trakcie realizacji')
            ->with('orderItems') // Pobranie elementów zamówienia (OrderItems)
            ->get();

        // Przechodzimy przez zamówienia i analizujemy atrybuty "attributes_name"
        $peru_kilos = 0;
        $brazylia_kilos = 0;
        $indie_kilos = 0;
        $etiopia_kilos = 0;
        foreach ($ordersThisYear as $order) {
            foreach ($order->orderItems as $item) {
                if ($item->name == 'Peru ALPAMAYO') {
                    // Sprawdzenie, czy 'attributes_name' zawiera konkretne wartości, np. '100 g'
                    if (strpos($item->attributes_name, '100 g') !== false) {
                        $peru_kilos += 0.1;
                    }
                    if (strpos($item->attributes_name, '250 g') !== false) {
                        $peru_kilos += 0.25;
                    }
                    if (strpos($item->attributes_name, '500 g') !== false) {
                        $peru_kilos += 0.5;
                    }
                    if (strpos($item->attributes_name, '1 kg (2 x 500 g)') !== false) {
                        $peru_kilos += 1;
                    }
                    if (strpos($item->attributes_name, '500 g (2 x 250 g)') !== false) {
                        $peru_kilos += 0.5;
                    }
                }
                if ($item->name == 'Brazylia NEBLINA') {
                    // Sprawdzenie, czy 'attributes_name' zawiera konkretne wartości, np. '100 g'
                    if (strpos($item->attributes_name, '100 g') !== false) {
                        $brazylia_kilos += 0.1;
                    }
                    if (strpos($item->attributes_name, '250 g') !== false) {
                        $brazylia_kilos += 0.25;
                    }
                    if (strpos($item->attributes_name, '500 g') !== false) {
                        $brazylia_kilos += 0.5;
                    }
                    if (strpos($item->attributes_name, '1 kg (2 x 500 g)') !== false) {
                        $brazylia_kilos += 1;
                    }
                    if (strpos($item->attributes_name, '500 g (2 x 250 g)') !== false) {
                        $brazylia_kilos += 0.5;
                    }
                }
                if ($item->name == 'Indie RIMO') {
                    // Sprawdzenie, czy 'attributes_name' zawiera konkretne wartości, np. '100 g'
                    if (strpos($item->attributes_name, '100 g') !== false) {
                        $indie_kilos += 0.1;
                    }
                    if (strpos($item->attributes_name, '250 g') !== false) {
                        $indie_kilos += 0.25;
                    }
                    if (strpos($item->attributes_name, '500 g') !== false) {
                        $indie_kilos += 0.5;
                    }
                    if (strpos($item->attributes_name, '1 kg (2 x 500 g)') !== false) {
                        $indie_kilos += 1;
                    }
                    if (strpos($item->attributes_name, '500 g (2 x 250 g)') !== false) {
                        $indie_kilos += 0.5;
                    }
                }
                if ($item->name == 'Etiopia RAS DASHEN') {
                    // Sprawdzenie, czy 'attributes_name' zawiera konkretne wartości, np. '100 g'
                    if (strpos($item->attributes_name, '100 g') !== false) {
                        $etiopia_kilos += 0.1;
                    }
                    if (strpos($item->attributes_name, '250 g') !== false) {
                        $etiopia_kilos += 0.25;
                    }
                    if (strpos($item->attributes_name, '500 g') !== false) {
                        $etiopia_kilos += 0.5;
                    }
                    if (strpos($item->attributes_name, '1 kg (2 x 500 g)') !== false) {
                        $etiopia_kilos += 1;
                    }
                    if (strpos($item->attributes_name, '500 g (2 x 250 g)') !== false) {
                        $etiopia_kilos += 0.5;
                    }
                }
                if ($item->name == 'ZESTAW Peru + Indie + Etiopia + Brazylia') {
                    // Sprawdzenie, czy 'attributes_name' zawiera konkretne wartości, np. '100 g'
                    if (strpos($item->attributes_name, '100 g') !== false) {
                        $etiopia_kilos += 0.1;
                        $indie_kilos += 0.1;
                        $brazylia_kilos += 0.1;
                        $peru_kilos += 0.1;
                    }
                    if (strpos($item->attributes_name, '250 g') !== false) {
                        $etiopia_kilos += 0.25;
                        $indie_kilos += 0.25;
                        $brazylia_kilos += 0.25;
                        $peru_kilos += 0.25;
                    }
                    if (strpos($item->attributes_name, '500 g') !== false) {
                        $etiopia_kilos += 0.5;
                        $indie_kilos += 0.5;
                        $brazylia_kilos += 0.5;
                        $peru_kilos += 0.5;
                    }
                    if (strpos($item->attributes_name, '1 kg (2 x 500 g)') !== false) {
                        $etiopia_kilos += 1;
                        $indie_kilos += 1;
                        $brazylia_kilos += 1;
                        $peru_kilos += 1;
                    }
                    if (strpos($item->attributes_name, '500 g (2 x 250 g)') !== false) {
                        $etiopia_kilos += 0.5;
                        $indie_kilos += 0.5;
                        $brazylia_kilos += 0.5;
                        $peru_kilos += 0.5;
                    }
                }
            }
        }
        return view('dashboard', compact('etiopia_kilos','indie_kilos','brazylia_kilos','peru_kilos', 'orders', 'ordersJS', 'totalSevenDaysAgo', 'totalToday', 'totalThisMonth'));
    }
    public function showByShipmentId(Int $id)
    {
        $order = Order::where('shipment_id', $id)->first();
        return $this->gShow($order);
    }
    public function show(Order $order)
    {
        return $this->gShow($order);
    }
    public function status($id, $slug)
    {
        $user = Auth::user();
        switch ($slug) {
            case 0:
                $res = Order::where('id', '=', $id)->update(['status' => 'Oczekujące na płatność']);
                OrderLog::create([
                    'name' => $user->name,
                    'description' => 'Zmiana statusu na Oczekujące na płatność',
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $id,
                ]);
                break;
            case 1:
                $res = Order::where('id', '=', $id)->update(['status' => 'W trakcie realizacji']);
                OrderLog::create([
                    'name' => $user->name,
                    'description' => 'Zmiana statusu na W trakcie realizacji',
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $id,
                ]);
                break;
            case 2:
                $res = Order::where('id', '=', $id)->update(['status' => 'Zrealizowane']);
                OrderLog::create([
                    'name' => $user->name,
                    'description' => 'Zmiana statusu na Zrealizowane',
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $id,
                ]);
                break;
            case 3:
                $res = Order::where('id', '=', $id)->update(['status' => 'Anulowano']);
                OrderLog::create([
                    'name' => $user->name,
                    'description' => 'Zmiana statusu na Anulowano',
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $id,
                ]);
                break;
            case 5:
                $res = Order::where('id', '=', $id)->update(['status' => 'Opłacone']);
                OrderLog::create([
                    'name' => $user->name,
                    'description' => 'Zmiana statusu na Opłacone',
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $id,
                ]);
                break;
            case 6:
                $res = Order::where('id', '=', $id)->update(['status' => 'Anulowano']);
                OrderLog::create([
                    'name' => $user->name,
                    'description' => 'Zmiana statusu na Anulowano',
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $id,
                ]);
                break;
        }
        if ($res) {
            return redirect()->route('dashboard.order.show', $id)->with('success', 'Status został pomyślnie zapisany.');
        } else {
            return redirect()->route('dashboard.order.show', $id)->with('fail', 'Status nie został zapisany.');
        }
    }
    public function email(Order $order)
    {
        $user = Auth::user();

        $response = $this->createInvoice($order);
        return $this->logAndReturnResponseFromCreateInvoice($response, $user, $order);
    }
}
