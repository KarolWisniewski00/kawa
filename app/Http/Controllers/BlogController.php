<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
        $blogs = Blog::orderBy('order')->paginate(10);
        return view('client.coffee.blog.index', compact('blogs'));
    }
    public function show($blog) {
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
        $blog = Blog::where('id',$blog)->first();
        return view('client.coffee.blog.show', compact('blog'));
    }
    
}
