<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountAdminController extends Controller
{
    public function index()
    {
        // Pobierz wszystkie kody rabatowe z bazy danych
        $discounts = Discount::all();

        // Przekaż kody do widoku
        return view('admin.shop.discount.index', compact('discounts'));
    }

    public function create()
    {
        // Pobieramy wszystkie produkty, które można przypisać do kodu rabatowego
        $products = Product::all();

        // Zwracamy widok z formularzem, przekazując listę produktów
        return view('admin.shop.discount.create', compact('products'));
    }
    public function store(Request $request)
    {
        // Walidacja danych
        $validated = $request->validate([
            'code' => 'required|string|max:255',
            'type' => 'required|in:kwotowy,procentowy', // Sprawdzamy, czy typ jest poprawny
            'value' => 'required|integer', // Wymagana liczba całkowita
        ]);

        // Tworzymy nowy kod rabatowy
        $discount = Discount::create([
            'code' => $validated['code'],
            'type' => $validated['type'],
            'value' => $validated['value'],
            'kind' => 'none',
        ]);


        return redirect()->route('dashboard.shop.discount')
            ->with('success', 'Kod rabatowy został pomyślnie utworzony.');
    }
    public function delete($id)
    {
        Discount::where('id', $id)->delete();
        return redirect()->route('dashboard.shop.discount')
            ->with('success', 'Kod rabatowy został pomyślnie usunięty.');
    }
    public function check(Request $request)
    {
        $code = $request->input('discount_code');

        $discount = Discount::where('code', $code)->first();

        if ($discount) {
            // Jeśli kod rabatowy istnieje, oblicz nową cenę
            $newPrice = $this->calculateDiscount($discount, $request->input('price'));

            return response()->json([
                'success' => true,
                'newPrice' => $newPrice
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nieprawidłowy kod rabatowy'
            ]);
        }
    }


}
