<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderAdminController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(20);
        return view('dashboard',compact('orders'));
    }
    public function show(Order $order){
        $user = Auth::user();
        $orders = OrderItem::where('order_id', $order->id)->get();
        $photos = ProductImage::get();
        $order = Order::where('id',$order->id)->first();
        return view('admin.order.show', compact('order','orders','photos'));
    }
    public function status($id, $slug)
    {
        switch ($slug) {
            case 0:
                $res = Order::where('id', '=', $id)->update(['status' => 'Oczekujące na płatność']);
                break;
            case 1:
                $res = Order::where('id', '=', $id)->update(['status' => 'W trakcie realizacji']);
                break;
            case 2:
                $res = Order::where('id', '=', $id)->update(['status' => 'Zrealizowane']);
                break;
            case 3:
                $res = Order::where('id', '=', $id)->update(['status' => 'Anulowano']);
                break;
            case 5:
                $res = Order::where('id', '=', $id)->update(['status' => 'Opłacone']);
                break;
        }
        if ($res) {
            return redirect()->route('dashboard.order.show', $id)->with('success', 'Status został pomyślnie zapisany.');
        } else {
            return redirect()->route('dashboard.order.show', $id)->with('fail', 'Status nie został zapisany.');
        }
    }
}
