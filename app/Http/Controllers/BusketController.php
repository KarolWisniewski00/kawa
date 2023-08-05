<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
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
        return view('client.coffee.account.busket.index', compact('cartItems','photos'));
    }
    public function add(Request $request, Product $product)
    {
        \Cart::session(auth()->id())->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => 100,
            'quantity' => 1,
            'attributes' => [],
            'associatedModel' => $product,
        ]);
        return redirect()->route('account.busket')->with('success', 'Produkt został dodany do koszyka.');
    }

    public function minus(Request $request, Product $product)
    {
        $cart = \Cart::session(auth()->id());
    
        $currentQuantity = $cart->get($product->id)->quantity;
    
        if ($currentQuantity === 1) {
            // Usuń produkt z koszyka, jeśli ilość wynosi 1
            $cart->remove($product->id);
            return redirect()->route('account.busket')->with('success', 'Produkt został usunięty z koszyka.');
        }
    
        // Zmniejsz ilość produktu o 1
        $cart->update($product->id, [
            'quantity' => -1,
        ]);
    
        return redirect()->route('account.busket')->with('success', 'Usunięto jedną sztukę produktu z koszyka.');
    }
    public function remove(Request $request, Product $product)
    {
        \Cart::session(auth()->id())->remove($product->id);

        return redirect()->route('account.busket')->with('success', 'Produkt został usunięty z koszyka.');
    }
}
