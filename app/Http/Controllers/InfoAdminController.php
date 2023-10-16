<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRuleRequest;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoAdminController extends Controller
{
    public function index()
    {
        $elements = Info::orderBy('order')->paginate(20);
        return view('admin.technic.info.index', compact('elements'));
    }
    public function create()
    {
        return view('admin.technic.info.create');
    }
    public function store(CreateRuleRequest $request)
    {
        $info = new Info();
        $info->type = $request->type;
        $info->content = $request->content;
        $info->order = $request->order;
        $res = $info->save();

        if ($res) {
            return redirect()->route('dashboard.technic.info')->with('success', 'Treść została pomyślnie zapisana.');
        } else {
            return redirect()->route('dashboard.technic.info.create')->with('fail', 'Treść nie została zapisana.');
        }
    }
    public function edit(Info $element)
    {
        return view('admin.technic.info.edit', compact('element'));
    }
    public function update(CreateRuleRequest $request, Info $element)
    {
        $res = $element->update([
            'type' => $request->type,
            'content' => $request->content,
            'order' => $request->order,
        ]);

        if ($res) {
            return redirect()->route('dashboard.technic.info')
                ->with('success', 'Treść została zaktualizowana.');
        } else {
            return redirect()->route('dashboard.technic.info.edit', $element->id)
                ->with('fail', 'Wystąpił błąd podczas aktualizowania treści.');
        }
    }
    public function delete(Info $element)
    {
        $res = $element->delete();
        if ($res) {
            return redirect()->route('dashboard.technic.info')
                ->with('success', 'Treść została usunięta.');
        } else {
            return redirect()->route('dashboard.technic.info')
                ->with('fail', 'Wystąpił błąd podczas usuwania treści.');
        }
    }
}
