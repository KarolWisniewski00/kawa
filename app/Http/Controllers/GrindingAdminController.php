<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGrindingRequest;
use App\Http\Requests\UpdateGrindingRequest;
use App\Models\Grinding;
use Illuminate\Http\Request;

class GrindingAdminController extends Controller
{
    public function index()
    {
        return view('admin.shop.grinding.index', [
            'grindTypes' => Grinding::paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.shop.grinding.create');
    }

    public function store(CreateGrindingRequest $request)
    {
        $res = Grinding::create([
            'name' => $request->name,
            'usage_information' => $request->usage_information,
        ]);

        if ($res) {
            return redirect()->route('dashboard.shop.grinding')
                ->with('success', 'Rodzaj mielenia został dodany.');
        } else {
            return redirect()->route('dashboard.shop.grinding.create')
                ->with('fail', 'Wystąpił błąd podczas dodawania rodzaju mielenia.');
        }
    }

    public function edit(Grinding $grinding)
    {
        return view('admin.shop.grinding.edit', compact('grinding'));
    }

    public function update(UpdateGrindingRequest $request, Grinding $grinding)
    {
        $res = $grinding->update([
            'name' => $request->name,
            'usage_information' => $request->usage_information,
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
