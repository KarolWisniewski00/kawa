<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class InfoController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('info', function ($trail) {
            $trail->parent('index');
            $trail->push('Informacje wysyłkowe', route('info'));
        });
        return view('client.coffee.info.index');
    }
}
