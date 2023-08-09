<?php

namespace App\Http\Controllers;

use App\Models\Cookies;
use Illuminate\Http\Request;

class CookiesAdminController extends Controller
{
    public function index()
    {
        return view('admin.technic.cookies.index', [
            'elements' => Cookies::orderBy('order')->paginate(20),
        ]);
    }
}
