<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class BlogAdminController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('order')->paginate(20);

        return view('admin.blog.index', compact('blogs'));
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
    public function store(CreateBlogRequest $request)
    {
        $product = Blog::create([
            'title' => $request->title,
            'photo' => $request->photo,
            'start' => $request->start,
            'content' => $request->content,
            'end' => $request->end,
            'order' => $request->order,
            'visibility_on_website' => isset($request->visibility_on_website)  ? 1 : 0,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywards' => $request->seo_keywards,
            'visibility_in_google' => isset($request->visibility_in_google)  ? 1 : 0,
        ]);
        if ($product) {
            return redirect()->route('dashboard.blog')
                ->with('success', 'Wpis został dodany.');
        } else {
            return redirect()->route('dashboard.blog.create')
                ->with('fail', 'Wystąpił błąd podczas dodawania wpisu.');
        }
    }

    public function edit(Blog $blog)
    {
        $photos = File::files(public_path('photo'));

        // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
        usort($photos, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        return view('admin.blog.edit', compact('photos', 'blog'));
    }

    public function update(CreateBlogRequest $request, Blog $blog)
    {
        // Aktualizujemy dane produktu
        $res = $blog->update([
            'title' => $request->title,
            'photo' => $request->photo,
            'start' => $request->start,
            'content' => $request->content,
            'end' => $request->end,
            'order' => $request->order,
            'visibility_on_website' => isset($request->visibility_on_website)  ? 1 : 0,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywards' => $request->seo_keywards,
            'visibility_in_google' => isset($request->visibility_in_google)  ? 1 : 0,
        ]);

        if ($res) {
            return redirect()->route('dashboard.blog')
                ->with('success', 'Wpis został zaktualizowany.');
        } else {
            return redirect()->route('dashboard.blog.edit', $blog->id)
                ->with('Fail', 'Wystąpił błąd podczas aktualizowania wpisu.');
        }
    }

    public function delete(Blog $blog)
    {
        $res = $blog->delete();
        if ($res) {
            return redirect()->route('dashboard.blog')
                ->with('success', 'Wpis został usunięty.');
        } else {
            return redirect()->route('dashboard.blog')
                ->with('fail', 'Wystąpił błąd podczas usuwania wpisu.');
        }
    }
}
