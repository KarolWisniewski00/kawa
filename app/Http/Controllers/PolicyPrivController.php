<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class PolicyPrivController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('policy-priv', function ($trail) {
            $trail->parent('index');
            $trail->push('Polityka Prywatności', route('policy-priv'));
        });
        return view('client.coffee.policy.priv.index');
    }
}
