<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class ShopController extends Controller
{
    public function index(){
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });
    
        Breadcrumbs::for('shop', function ($trail) {
            $trail->parent('index');
            $trail->push('Sklep', route('shop'));
        });
        return view('client.coffee.shop.index',[
            'products' => Product::orderBy('order')->paginate(20),
            'variants' => ProductVariant::get(),
            'photos' => ProductImage::get(),
        ]);
    }
}
