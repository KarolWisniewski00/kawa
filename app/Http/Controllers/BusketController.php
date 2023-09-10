<?php

namespace App\Http\Controllers;

use App\Models\Grinding;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;
use Darryldecode\Cart\CartItem;
use Darryldecode\Cart\CartCollection;
use Illuminate\Support\Facades\Validator;

class BusketController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('account.busket', function ($trail) {
            $trail->parent('index');
            $trail->push('Koszyk', route('account.busket'));
        });
        $photos = ProductImage::get();
        $cartItems = \Cart::session(auth()->id())->getContent();
        $sizes = Size::get();
        return view('client.coffee.account.busket.index', compact('cartItems','photos', 'sizes'));
    }
    public function add(Request $request, Product $product)
    {
        $size = Size::where('id','=', $request->size)->first();
        $grind = Grinding::where('name','=', $request->grind)->first();
        $product_variant = ProductVariant::where('size_id','=', $request->size)->where('product_id', $product->id)->first();
        
        \Cart::session(auth()->id())->add([
            'id' => intval(strval($product->id).strval($size->id).strval($grind->id)),
            'name' => $product->name,
            'price' => intval($product_variant->price),
            'quantity' => intval($request->quantity),
            'attributes' => [$size->name, $request->grind],
            'associatedModel' => $product,
        ]);
        
        return redirect()->route('account.busket')->with('success', 'Produkt został dodany do koszyka.');
    }

    public function minus(Request $request, Product $product)
    {
        $cart = \Cart::session(auth()->id());
        $size = Size::where('id','=', $request->size)->first();
        $grind = Grinding::where('name','=', $request->grind)->first();

        $currentQuantity = $cart->get(intval(strval($product->id).strval($size->id).strval($grind->id)))->quantity;
    
        if ($currentQuantity === 1) {
            // Usuń produkt z koszyka, jeśli ilość wynosi 1
            $cart->remove(intval(strval($product->id).strval($size->id).strval($grind->id)));
            return redirect()->route('account.busket')->with('success', 'Produkt został usunięty z koszyka.');
        }
    
        // Zmniejsz ilość produktu o 1
        $cart->update(intval(strval($product->id).strval($size->id).strval($grind->id)), [
            'quantity' => -1,
        ]);
    
        return redirect()->route('account.busket')->with('success', 'Usunięto jedną sztukę produktu z koszyka.');
    }
    public function remove(Request $request, Product $product)
    {
        $size = Size::where('id','=', $request->size)->first();
        $grind = Grinding::where('name','=', $request->grind)->first();

        \Cart::session(auth()->id())->remove(intval(strval($product->id).strval($size->id).strval($grind->id)));

        return redirect()->route('account.busket')->with('success', 'Produkt został usunięty z koszyka.');
    }
}
