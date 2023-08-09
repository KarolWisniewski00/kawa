<?php

namespace App\Http\Controllers;

use App\Models\Priv;
use Illuminate\Http\Request;

class PrivAdminController extends Controller
{
    public function index()
    {
        return view('admin.technic.priv.index', [
            'elements' => Priv::orderBy('order')->paginate(20),
        ]);
    }
}
