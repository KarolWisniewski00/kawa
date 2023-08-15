<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class BlogAdminController extends Controller
{
    public function index(){
        return view('admin.blog.index');
    }
    public function create()
    {
        $photos = File::files(public_path('photo'));

        // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
        usort($photos, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        return view('admin.blog.create', compact('photos'));
    }
}
