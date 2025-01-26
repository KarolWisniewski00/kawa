<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
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
            'categories' => Category::paginate(20),
        ]);
    }
    public function store(Request $request)
    {
        if($request->description == null){
            $description = '';
        }else{
            $description = $request->description;
        }
        if($request->seo_title == null){
            $seo_title = $request->name;
        }else{
            $seo_title = $request->seo_title;
        }
        if($request->seo_description == null){
            $seo_description = $request->name;
        }else{
            $seo_description = $request->seo_description;
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $description,
            'order' => $request->order,
            'view' => 0,
            'busket' => 0,
            'sell' => 0,
            'visibility_on_website' => isset($request->visibility_on_website)  ? 1 : 0,
            'seo_title' => $seo_title,
            'seo_description' => $seo_description,
            'visibility_in_google' => isset($request->visibility_in_google)  ? 1 : 0,
            'coffee' => $request->coffee != null ? $request->coffee : 0,
            'tool' =>  $request->tool != null ? $request->tool : 0,
            'lemon' =>  $request->lemon != null ? $request->lemon : 0,
            'height' =>  $request->height != null ? $request->height : 0,
            'view_type' =>  $request->view_type,
            'price_simple' =>  $request->price_simple,
        ]);
        $product->categories()->sync($request->category);

        if ($product) {
            // Save product variants
            $prices = $request->price;
            $grinds = $request->grind;
            //$prices = array_filter($request->price);


            if (!empty($prices)) {
                foreach ($prices as $key => $price) {
                    if ($price != null) {
                        $variant = new ProductVariant([
                            'product_id' => $product->id,
                            'size_id' => $key + 1,
                            'grinding_id' => null,
                            'price' => $price
                        ]);
                        $variant->save();
                    }
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
            $image = new ProductImage([
                'product_id' => $product->id,
                'image_path' => $request->photo,
                'order' => 1
            ]);
            $image->save();

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
        $productPhotos = ProductImage::where('product_id', $product->id)->first();

        // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
        usort($photos, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        $categories = Category::paginate(20);
        return view('admin.shop.product.edit', compact('categories', 'product', 'sizes', 'grindTypes', 'photos', 'productSizes', 'productGrinds', 'productPhotos'));
    }

    public function update(CreateProductRequest $request, Product $product)
    {
        if($request->description == null){
            $description = '';
        }else{
            $description = $request->description;
        }
        if($request->seo_title == null){
            $seo_title = $request->name;
        }else{
            $seo_title = $request->seo_title;
        }
        if($request->seo_description == null){
            $seo_description = $request->name;
        }else{
            $seo_description = $request->seo_description;
        }

        // Aktualizujemy dane produktu
        $res = $product->update([
            'name' => $request->name,
            'description' => $description,
            'order' => $request->order,
            'visibility_on_website' => isset($request->visibility_on_website)  ? 1 : 0,
            'seo_title' => $seo_title,
            'seo_description' => $seo_description,
            'visibility_in_google' => isset($request->visibility_in_google)  ? 1 : 0,
            'coffee' => $request->coffee != null ? $request->coffee : 0,
            'tool' =>  $request->tool != null ? $request->tool : 0,
            'lemon' =>  $request->lemon != null ? $request->lemon : 0,
            'height' =>  $request->height != null ? $request->height : 0,
            'photo_second' =>  $request->photo_second,
            'view_type' =>  $request->view_type,
            'price_simple' =>  $request->price_simple,
        ]);
        $product->categories()->sync($request->category);
        // Usuwamy wszystkie stare warianty produktu i zapisujemy nowe dane
        $prices = $request->price;
        $grinds = $request->grind;

        ProductVariant::where('product_id', $product->id)->delete();
        if (!empty($prices)) {
            foreach ($prices as $key => $price) {
                if ($price != null) {
                    $variant = new ProductVariant([
                        'product_id' => $product->id,
                        'size_id' => $key + 1,
                        'grinding_id' => null,
                        'price' => $price
                    ]);
                    $variant->save();
                }
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
        if ($request->photo != null) {
            ProductImage::where('product_id', $product->id)->update([
                'image_path' => $request->photo,
            ]);
        }
        if ($res) {
            return redirect()->route('dashboard.shop.product')
                ->with('success', 'Produkt został zaktualizowany.');
        } else {
            return redirect()->route('dashboard.shop.product.edit', $product->id)
                ->with('fail', 'Wystąpił błąd podczas aktualizowania produktu.');
        }
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
