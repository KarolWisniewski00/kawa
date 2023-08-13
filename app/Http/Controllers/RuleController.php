<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class RuleController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('rule', function ($trail) {
            $trail->parent('index');
            $trail->push('Regulamin', route('rule'));
        });
        $elements = Rule::orderBy('order')->get();
        return view('client.coffee.rule.index', compact('elements'));
    }
}
