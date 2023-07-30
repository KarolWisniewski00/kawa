<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index(){
        return view('admin.shop.product.index');
    }
    public function create(){
        return view('admin.shop.product.create');
    }
}
