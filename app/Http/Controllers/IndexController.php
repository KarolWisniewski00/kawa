<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('client.coffee.index',[
            'products' => Product::orderBy('order')->take(3)->get(),
            'variants' => ProductVariant::get(),
            'photos' => ProductImage::get(),
        ]);
    }
}
