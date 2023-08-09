<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoAdminController extends Controller
{
    public function index()
    {
        return view('admin.technic.info.index', [
            'elements' => Info::orderBy('order')->paginate(20),
        ]);
    }
}
