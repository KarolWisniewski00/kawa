<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleAdminController extends Controller
{
    public function index()
    {
        return view('admin.technic.rule.index', [
            'elements' => Rule::orderBy('order')->paginate(20),
        ]);
    }
}
