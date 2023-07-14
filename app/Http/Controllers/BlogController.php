<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class BlogController extends Controller
{
    public function index(){
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });
    
        Breadcrumbs::for('blog', function ($trail) {
            $trail->parent('index');
            $trail->push('Blog', route('blog'));
        });
        return view('client.coffee.blog.index');
    }
    public function show($slug) {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });
    
        Breadcrumbs::for('blog', function ($trail) {
            $trail->parent('index');
            $trail->push('Blog', route('blog'));
        });
    
        Breadcrumbs::for('blog.show', function ($trail, $slug) {
            $trail->parent('blog');
            // Dodaj odpowiednie dane zależne od bloga, na przykład:
            // $blog = Blog::where('slug', $slug)->first();
            // $trail->push($blog->title, route('blog.show', $slug));
            $trail->push('Blog Post', route('blog.show', $slug));
        });
    
        return view('client.coffee.blog.show');
    }
    
}
