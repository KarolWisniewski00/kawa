<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
class UserController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('account.user', function ($trail) {
            $trail->parent('index');
            $trail->push('Konto', route('account.user'));
        });
        return view('client.coffee.account.user.index');
    }
}
