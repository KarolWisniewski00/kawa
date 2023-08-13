<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRuleRequest;
use App\Models\Cookies;
use Illuminate\Http\Request;

class CookiesAdminController extends Controller
{
    public function index()
    {
        $elements = Cookies::orderBy('order')->paginate(20);
        return view('admin.technic.cookies.index', compact('elements'));
    }
    public function create()
    {
        return view('admin.technic.cookies.create');
    }
    public function store(CreateRuleRequest $request)
    {
        $cookies = new Cookies();
        $cookies->type = $request->type;
        $cookies->content = $request->content;
        $res = $cookies->save();

        if ($res) {
            return redirect()->route('dashboard.technic.cookies')->with('success', 'Treść została pomyślnie zapisana.');
        } else {
            return redirect()->route('dashboard.technic.cookies.create')->with('fail', 'Treść nie została zapisana.');
        }
    }
    public function edit(Cookies $element)
    {
        return view('admin.technic.cookies.edit', compact('element'));
    }
    public function update(CreateRuleRequest $request, Cookies $element)
    {
        $res = $element->update([
            'type' => $request->type,
            'content' => $request->content,
        ]);

        if ($res) {
            return redirect()->route('dashboard.technic.cookies')
                ->with('success', 'Treść została zaktualizowana.');
        } else {
            return redirect()->route('dashboard.technic.cookies.edit', $element->id)
                ->with('Fail', 'Wystąpił błąd podczas aktualizowania treści.');
        }
    }
    public function delete(Cookies $element)
    {
        $res = $element->delete();
        if ($res) {
            return redirect()->route('dashboard.technic.cookies')
                ->with('success', 'Treść została usunięta.');
        } else {
            return redirect()->route('dashboard.technic.cookies')
                ->with('fail', 'Wystąpił błąd podczas usuwania treści.');
        }
    }
}
