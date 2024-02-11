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
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(20);
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $ordersJS = Order::where('created_at', '>=', $sevenDaysAgo)->get();
        return view('dashboard', compact('orders', 'ordersJS'));
    }
    public function show(Order $order)
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
        return view('admin.order.show', compact('order', 'orders', 'photos', 'photo_good', 'order_logs'));
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
