<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class BusketController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('account.busket', function ($trail) {
            $trail->parent('index');
            $trail->push('Koszyk', route('account.busket'));
        });
        return view('client.coffee.account.busket.index');
    }
}
