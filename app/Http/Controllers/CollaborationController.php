<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
class CollaborationController extends Controller
{
    public function index(){
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });
    
        Breadcrumbs::for('collaboration', function ($trail) {
            $trail->parent('index');
            $trail->push('Wspólpraca', route('collaboration'));
        });
        return view('client.coffee.collaboration.index');
    }
}
