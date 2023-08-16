<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Instagram;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $instagrams = Instagram::orderBy('order')->get();
        $products = Product::orderBy('order')->take(3)->get();
        $variants = ProductVariant::get();
        $photos = ProductImage::get();
        $blogs = Blog::orderBy('order')->take(4)->get();
        return view('client.coffee.index',compact('instagrams','products','variants','photos','blogs'));
    }
}
