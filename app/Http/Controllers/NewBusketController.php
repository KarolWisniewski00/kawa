<?php

namespace App\Http\Controllers;

use App\Models\Grinding;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;

class NewBusketController extends Controller
{
    public function index()
    {
        $photos = ProductImage::get();
        $cartItems = \Cart::session('cart')->getContent();
        $sizes = Size::get();
        return view('client.coffee.newbusket.index', compact('cartItems', 'photos', 'sizes'));
    }
    public function get(Request $request)
    {
        $cartItems = \Cart::session('cart')->getContent();
        return response()->json($cartItems);
    }
    public function add(Request $request, Product $product)
    {
        $size = Size::where('id', '=', $request->size)->first();
        $grind = Grinding::where('name', '=', $request->grind)->first();
        $product_variant = ProductVariant::where('size_id', '=', $request->size)->where('product_id', $product->id)->first();
        if ($size == null) {
            \Cart::session('cart')->add([
                'id' => intval(strval($product->id) . strval(0) . strval(0)),
                'name' => $product->name,
                'price' => intval($product->price_simple),
                'quantity' => intval($request->quantity),
                'attributes' => [],
                'associatedModel' => $product,
            ]);
        } else {
            \Cart::session('cart')->add([
                'id' => intval(strval($product->id) . strval($size->id) . strval($grind->id)),
                'name' => $product->name,
                'price' => intval($product_variant->price),
                'quantity' => intval($request->quantity),
                'attributes' => [$size->name, $request->grind],
                'associatedModel' => $product,
            ]);
        }
        return redirect()->back()->with('success', 'Produkt został dodany do koszyka.')->with('show-busket', true);
    }
    public function minus(Request $request, Product $product)
    {
        $cart = \Cart::session('cart');
        $size = Size::where('id', '=', $request->size)->first();
        $grind = Grinding::where('name', '=', $request->grind)->first();
        if ($size == null) {
            $currentQuantity = $cart->get(intval(strval($product->id) . strval(0) . strval(0)))->quantity;
        } else {
            $currentQuantity = $cart->get(intval(strval($product->id) . strval($size->id) . strval($grind->id)))->quantity;
        }
        if ($currentQuantity === 1) {
            // Usuń produkt z koszyka, jeśli ilość wynosi 1
            if ($size == null) {
                $cart->remove(intval(strval($product->id) . strval(0) . strval(0)));
            } else {
                $cart->remove(intval(strval($product->id) . strval($size->id) . strval($grind->id)));
            }
            return redirect()->back()->with('success', 'Produkt został usunięty z koszyka.');
        }
        if ($size == null) {
            // Zmniejsz ilość produktu o 1
            $cart->update(intval(strval($product->id) . strval(0) . strval(0)), [
                'quantity' => -1,
            ]);
        } else {
            // Zmniejsz ilość produktu o 1
            $cart->update(intval(strval($product->id) . strval($size->id) . strval($grind->id)), [
                'quantity' => -1,
            ]);
        }

        return redirect()->back()->with('success', 'Usunięto jedną sztukę produktu z koszyka.');
    }
    public function remove(Request $request, Product $product)
    {
        $size = Size::where('id', '=', $request->size)->first();
        $grind = Grinding::where('name', '=', $request->grind)->first();
        if ($size == null) {
            \Cart::session('cart')->remove(intval(strval($product->id) . strval(0) . strval(0)));
        } else {
            \Cart::session('cart')->remove(intval(strval($product->id) . strval($size->id) . strval($grind->id)));
        }

        return redirect()->back()->with('success', 'Produkt został usunięty z koszyka.');
    }
}
