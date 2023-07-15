<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class OrderController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('account.order', function ($trail) {
            $trail->parent('index');
            $trail->push('Zamówienia', route('account.order'));
        });
        return view('client.coffee.account.order.index');
    }
}
