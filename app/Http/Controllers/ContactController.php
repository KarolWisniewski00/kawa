<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class ContactController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('contact', function ($trail) {
            $trail->parent('index');
            $trail->push('Kontakt', route('contact'));
        });
        return view('client.coffee.contact.index');
    }
}
