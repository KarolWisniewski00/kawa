<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoAdminController extends Controller
{
    public function index(){
        return view('admin.photo.index');
    }
}
