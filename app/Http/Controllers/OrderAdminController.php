<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderAdminController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard',compact('orders'));
    }
    public function show(Order $order){
        $user = Auth::user();
        $orders = OrderItem::where('order_id', $order->id)->get();
        $photos = ProductImage::get();
        foreach ($orders as $o) {
            foreach($photos as $photo){
                $p = Product::where('name',$o->name)->first();
                if($photo->product_id == $p->id){
                    if($photo->order == 1){
                        $photo_good = $photo->image_path;
                    }
                }
            }
        }
        $order = Order::where('id',$order->id)->first();
        return view('admin.order.show', compact('order','orders','photos','photo_good'));
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
            case 6:
                $res = Order::where('id', '=', $id)->update(['status' => 'Anulowano']);
                if ($res) {
                    return redirect()->route('dashboard')->with('success', 'Status został pomyślnie zapisany.');
                }
                break;
        }
        if ($res) {
            return redirect()->route('dashboard.order.show', $id)->with('success', 'Status został pomyślnie zapisany.');
        } else {
            return redirect()->route('dashboard.order.show', $id)->with('fail', 'Status nie został zapisany.');
        }
    }
}
