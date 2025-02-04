<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Blog;
use App\Models\Instagram;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        $instagrams = Instagram::orderBy('order')->get();
        $products = Product::orderBy('order')->take(3)->get();
        $products2 = Product::orderBy('created_at', 'desc')->take(3)->get();
        $variants = ProductVariant::get();
        $photos = ProductImage::get();
        $blogs = Blog::orderBy('order')->take(4)->get();
        return view('client.coffee.index', compact('instagrams', 'products', 'products2', 'variants', 'photos', 'blogs'));
    }
    public function dark()
    {
        $instagrams = Instagram::orderBy('order')->get();
        $products = Product::orderBy('order')->take(3)->get();
        $variants = ProductVariant::get();
        $photos = ProductImage::get();
        $blogs = Blog::orderBy('order')->take(4)->get();
        return view('client.coffee.dark', compact('instagrams', 'products', 'variants', 'photos', 'blogs'));
    }
}
