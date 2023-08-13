<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRuleRequest;
use App\Models\Priv;
use Illuminate\Http\Request;

class PrivAdminController extends Controller
{
    public function index()
    {
        $elements = Priv::orderBy('order')->paginate(20);
        return view('admin.technic.priv.index', compact('elements'));
        
    }
    public function create()
    {
        return view('admin.technic.priv.create');
    }
    public function store(CreateRuleRequest $request)
    {
        $priv = new Priv();
        $priv->type = $request->type;
        $priv->content = $request->content;
        $res = $priv->save();

        if ($res) {
            return redirect()->route('dashboard.technic.priv')->with('success', 'Treść została pomyślnie zapisana.');
        } else {
            return redirect()->route('dashboard.technic.priv.create')->with('fail', 'Treść nie została zapisana.');
        }
    }
    public function edit(Priv $element)
    {
        return view('admin.technic.priv.edit', compact('element'));
    }
    public function update(CreateRuleRequest $request, Priv $element)
    {
        $res = $element->update([
            'type' => $request->type,
            'content' => $request->content,
        ]);

        if ($res) {
            return redirect()->route('dashboard.technic.priv')
                ->with('success', 'Treść została zaktualizowana.');
        } else {
            return redirect()->route('dashboard.technic.priv.edit', $element->id)
                ->with('Fail', 'Wystąpił błąd podczas aktualizowania treści.');
        }
    }
    public function delete(Priv $element)
    {
        $res = $element->delete();
        if ($res) {
            return redirect()->route('dashboard.technic.priv')
                ->with('success', 'Treść została usunięta.');
        } else {
            return redirect()->route('dashboard.technic.priv')
                ->with('fail', 'Wystąpił błąd podczas usuwania treści.');
        }
    }
}
