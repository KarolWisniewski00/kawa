<?php

namespace App\Http\Controllers;

use App\Models\Grinding;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductAdminController extends Controller
{
    public function index()
    {
        return view('admin.shop.product.index', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(20),
            'variants' => ProductVariant::get(),
            'photos' => ProductImage::get(),
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
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'order' => $request->order,
            'view' => 0,
            'busket' => 0,
            'sell' => 0,
            'visibility_on_website' => $request->visibility_on_website == "1"  ? 1 : 0,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'visibility_in_google' => $request->visibility_in_google == "1"  ? 1 : 0,
        ]);
        if ($product) {
            // Save product variants
            $sizes = $request->size;
            $grinds = $request->grind;
            $prices = array_filter($request->price);


            if (!empty($sizes)) {
                foreach ($sizes as $key => $size) {
                    $variant = new ProductVariant([
                        'product_id' => $product->id,
                        'size_id' => $size,
                        'grinding_id' => null,
                        'price' => $prices[$key]
                    ]);
                    $variant->save();
                }
            }
            if (!empty($grinds)) {
                foreach ($grinds as  $grind) {
                    $variant = new ProductVariant([
                        'product_id' => $product->id,
                        'grinding_id' => $grind,
                        'size_id' => null,
                        'price' => null
                    ]);
                    $variant->save();
                }
            }

            // Save product images with the given order
            $photos = $request->photo;

            if (!empty($photos)) {
                foreach ($photos as $key => $photo) {
                    $image = new ProductImage([
                        'product_id' => $product->id,
                        'image_path' => $photo,
                        'order' => $key + 1,
                    ]);
                    $image->save();
                }
            }

            return redirect()->route('dashboard.shop.product')
                ->with('success', 'Produkt został dodany.');
        } else {
            return redirect()->route('dashboard.shop.product.create')
                ->with('fail', 'Wystąpił błąd podczas dodawania produktu.');
        }
    }

    public function edit(Product $product)
    {
        $sizes = Size::get();
        $grindTypes = Grinding::get();
        $photos = File::files(public_path('photo'));
        $productSizes = ProductVariant::where('product_id', $product->id)->where('size_id', '!=', null)->get();
        $productGrinds = ProductVariant::where('product_id', $product->id)->where('grinding_id', '!=', null)->get();
        $productPhotos = ProductImage::where('product_id', $product->id)->get();

        // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
        usort($photos, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        return view('admin.shop.product.edit', compact('product', 'sizes', 'grindTypes', 'photos', 'productSizes', 'productGrinds', 'productPhotos'));
    }

    public function update(Request $request, Product $product)
    {
        // Aktualizujemy dane produktu
        $res = $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'order' => $request->order,
            'visibility_on_website' => $request->visibility_on_website == 1  ? 1 : 0,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'visibility_in_google' => $request->visibility_in_google == 1  ? 1 : 0,
        ]);

        // Usuwamy wszystkie stare warianty produktu i zapisujemy nowe dane
        $sizes = $request->size;
        $grinds = $request->grind;
        $prices = $request->price;

        ProductVariant::where('product_id', $product->id)->delete();
        if (!empty($sizes)) {
            foreach ($sizes as $key => $size) {
                $variant = new ProductVariant([
                    'product_id' => $product->id,
                    'size_id' => $size,
                    'grinding_id' => null,
                    'price' => $prices[$key]
                ]);
                $variant->save();
            }
        }

        if (!empty($grinds)) {
            foreach ($grinds as $grind) {
                $variant = new ProductVariant([
                    'product_id' => $product->id,
                    'grinding_id' => $grind,
                    'size_id' => null,
                    'price' => null
                ]);
                $variant->save();
            }
        }

        // Usuwamy wszystkie stare zdjęcia produktu i zapisujemy nowe dane
        $photos = $request->photo;

        ProductImage::where('product_id', $product->id)->delete();

        if (!empty($photos)) {
            foreach ($photos as $key => $photo) {
                $image = new ProductImage([
                    'product_id' => $product->id,
                    'image_path' => $photo,
                    'order' => $key + 1,
                ]);
                $image->save();
            }
        }
        if ($res) {
            return redirect()->route('dashboard.shop.product')
                ->with('success', 'Produkt został zaktualizowany.');
        } else {
            return redirect()->route('dashboard.shop.product.edit', $product->id)
                ->with('Fail', 'Wystąpił błąd podczas aktualizowania produktu.');
        }
        //todo:zrobić zdjęcia ordering oraz checkboxy widoczności
    }

    public function delete(Product $product)
    {
        $res = $product->delete();
        if ($res) {
            return redirect()->route('dashboard.shop.product')
                ->with('success', 'Produkt został usunięty.');
        } else {
            return redirect()->route('dashboard.shop.product')
                ->with('fail', 'Wystąpił błąd podczas usuwania produktu.');
        }
    }
}
