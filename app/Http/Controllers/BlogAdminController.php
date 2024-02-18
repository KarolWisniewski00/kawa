<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogAdminController extends Controller
{
    public function index()
    {
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
    public function createSecond()
    {
        $photos = File::files(public_path('photo'));

        // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
        usort($photos, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        return view('admin.blog.create-second', compact('photos'));
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
    public function storeSecond(Request $request)
    {
        $product = Blog::create([
            'title' => $request->title,
            'photo' => $request->photo,
            'content_photo_1' => $request->photo1,
            'content_photo_2' => $request->photo2,
            'content_text_1' => $request->content_text_1,
            'content_text_2' => $request->content_text_2,
            'content_text_3' => $request->content_text_3,
            'content_text_4' => $request->content_text_4,
            'content_text_5' => $request->content_text_5,
            'content_text_6' => $request->content_text_6,
            'content_text_7' => $request->content_text_7,
            'content_text_8' => $request->content_text_8,
            'start' => $request->start,
            'content' => '',
            'type' => 'SECOND',
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
    public function editSecond(Blog $blog)
    {
        $photos = File::files(public_path('photo'));

        // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
        usort($photos, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        return view('admin.blog.edit-second', compact('photos', 'blog'));
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
                ->with('fail', 'Wystąpił błąd podczas aktualizowania wpisu.');
        }
    }
    public function updateSecond(Request $request, Blog $blog)
    {
        // Aktualizujemy dane produktu
        $res = $blog->update([
            'title' => $request->title,
            'photo' => $request->photo,
            'content_photo_1' => $request->photo1,
            'content_photo_2' => $request->photo2,
            'content_text_1' => $request->content_text_1,
            'content_text_2' => $request->content_text_2,
            'content_text_3' => $request->content_text_3,
            'content_text_4' => $request->content_text_4,
            'content_text_5' => $request->content_text_5,
            'content_text_6' => $request->content_text_6,
            'content_text_7' => $request->content_text_7,
            'content_text_8' => $request->content_text_8,
            'start' => $request->start,
            'content' => '',
            'type' => 'SECOND',
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
                ->with('fail', 'Wystąpił błąd podczas aktualizowania wpisu.');
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
