<?php

namespace App\Http\Controllers;

use App\Models\Cookies;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class PolicyCookiesController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('policy-cookies', function ($trail) {
            $trail->parent('index');
            $trail->push('Polityka Cookies', route('policy-cookies'));
        });
        $elements = Cookies::orderBy('order')->get();
        return view('client.coffee.policy.cookies.index', compact('elements'));
    }
}
