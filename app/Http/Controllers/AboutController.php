<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class AboutController extends Controller
{
    public function index(){
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });
    
        Breadcrumbs::for('about', function ($trail) {
            $trail->parent('index');
            $trail->push('O nas', route('about'));
        });
        return view('client.coffee.about.index');
    }
}
