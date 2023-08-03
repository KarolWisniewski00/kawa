<?php

namespace App\Http\Controllers;

use App\Models\Grinding;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductAdminController extends Controller
{
    public function index()
    {
        return view('admin.shop.product.index', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(20)
        ]);
    }
    public function create()
    {
        $photos = File::files(public_path('photo'));

        // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
        usort($photos, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        return view('admin.shop.product.create', [
            'sizes' => Size::get(),
            'grindTypes' => Grinding::get(),
            'photos' => $photos,
        ]);
    }
    public function store(Request $request)
    {
        $res = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'promotional_price' => $request->promotional_price,
            'order' => $request->order,
            'visibility_on_website' => $request->visibility_on_website  ? 1 : 0,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'visibility_in_google' => $request->visibility_in_google  ? 1 : 0,
        ]);
        if ($res) {
            return redirect()->route('dashboard.shop.product')
                ->with('success', 'Produkt został dodany.');
        } else {
            return redirect()->route('dashboard.shop.product.create')
                ->with('fail', 'Wystąpił błąd podczas dodawania produktu.');
        }
    }

    public function edit(Grinding $grinding)
    {
        return view('admin.shop.grinding.edit', compact('grinding'));
    }

    public function update(Request $request, Grinding $grinding)
    {
        $res = $grinding->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($res) {
            return redirect()->route('dashboard.shop.grinding')
                ->with('success', 'Rodzaj mielenia został zaktualizowany.');
        } else {
            return redirect()->route('dashboard.shop.grinding.edit', $grinding->id)
                ->with('fail', 'Wystąpił błąd podczas aktualizacji rodzaju mielenia.');
        }
    }

    public function delete(Grinding $grinding)
    {
        $res = $grinding->delete();
        if ($res) {
            return redirect()->route('dashboard.shop.grinding')
                ->with('success', 'Rodzaj mielenia został usunięty.');
        } else {
            return redirect()->route('dashboard.shop.grinding')
                ->with('fail', 'Wystąpił błąd podczas usuwania rodzaju mielenia.');
        }
    }
}
