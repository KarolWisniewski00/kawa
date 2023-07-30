<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeAdminController extends Controller
{
    public function index()
    {
        return view('admin.shop.size.index', [
            'sizes' => Size::paginate(20),
        ]);
    }
    public function create()
    {
        return view('admin.shop.size.create');
    }
    public function store(CreateSizeRequest $request)
    {
        $res = Size::create([
            'name' => $request->name,
        ]);

        if ($res) {
            return redirect()->route('dashboard.shop.size')
                ->with('success', 'Rozmiar opakowania został dodany.');
        } else {
            return redirect()->route('dashboard.shop.size.create')
                ->with('fail', 'Wystąpił błąd podczas dodawania rozmiaru opakowania.');
        }
    }
    public function edit(Size $size)
    {
        return view('admin.shop.size.edit', compact('size'));
    }

    public function update(UpdateSizeRequest $request, Size $size)
    {
        $res = $size->update([
            'name' => $request->name,
        ]);

        if ($res) {
            return redirect()->route('dashboard.shop.size')
                ->with('success', 'Rozmiar opakowania został zaktualizowany.');
        } else {
            return redirect()->route('dashboard.shop.size.create')
                ->with('fail', 'Wystąpił błąd podczas aktualizacji rozmiaru opakowania.');
        }
    }
    public function delete(Size $size)
    {
        $res = $size->delete();
        if ($res) {
            return redirect()->route('dashboard.shop.size')
                ->with('success', 'Rozmiar opakowania został usunięty.');
        } else {
            return redirect()->route('dashboard.shop.size.create')
                ->with('fail', 'Wystąpił błąd podczas usuwanie rozmiaru opakowania.');
        }
    }
}
