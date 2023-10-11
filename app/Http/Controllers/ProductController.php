<?php

namespace App\Http\Controllers;

use App\Models\Grinding;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Size;
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
        return view('client.coffee.shop.product.show', [
            'product' => Product::where('id', $slug)->first(),
            'products' => Product::take(3)->get(),
            'variants' => ProductVariant::get(),
            'photos' => ProductImage::get(),
            'sizes' => Size::get(),
            'grindTypes' => Grinding::get(),
        ]);
    }
}
