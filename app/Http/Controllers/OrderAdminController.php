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
        return view('admin.order.show', compact('order','orders','photos'));
    }
}
