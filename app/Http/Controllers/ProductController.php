<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class ProductController extends Controller
{
    public function show($slug)
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('shop', function ($trail) {
            $trail->parent('index');
            $trail->push('Sklep', route('shop'));
        });

        Breadcrumbs::for('shop.product.show', function ($trail, $productId) {
            $trail->parent('shop');
            // Dodaj odpowiednie dane zależne od produktu, na przykład:
            // $product = Product::find($productId);
            // $trail->push($product->name, route('shop.product.show', $productId));
            $trail->push('Product', route('shop.product.show', $productId));
        });
        return view('client.coffee.shop.product.show');
    }
}
