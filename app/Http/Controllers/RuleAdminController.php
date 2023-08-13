<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRuleRequest;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleAdminController extends Controller
{
    public function index()
    {
        $elements = Rule::orderBy('order')->paginate(20);
        return view('admin.technic.rule.index', compact('elements'));
    }
    public function create()
    {
        return view('admin.technic.rule.create');
    }
    public function store(CreateRuleRequest $request)
    {
        $rule = new Rule();
        $rule->type = $request->type;
        $rule->content = $request->content;
        $rule->order = $request->order;
        $res = $rule->save();

        if ($res) {
            return redirect()->route('dashboard.technic.rule')->with('success', 'Treść została pomyślnie zapisana.');
        } else {
            return redirect()->route('dashboard.technic.rule.create')->with('fail', 'Treść nie została zapisana.');
        }
    }
    public function edit(Rule $element)
    {
        return view('admin.technic.rule.edit', compact('element'));
    }
    public function update(CreateRuleRequest $request, Rule $element)
    {
        $res = $element->update([
            'type' => $request->type,
            'content' => $request->content,
            'order' => $request->order,
        ]);

        if ($res) {
            return redirect()->route('dashboard.technic.rule')
                ->with('success', 'Treść została zaktualizowana.');
        } else {
            return redirect()->route('dashboard.technic.rule.edit', $element->id)
                ->with('Fail', 'Wystąpił błąd podczas aktualizowania treści.');
        }
    }
    public function delete(Rule $element)
    {
        $res = $element->delete();
        if ($res) {
            return redirect()->route('dashboard.technic.rule')
                ->with('success', 'Treść została usunięta.');
        } else {
            return redirect()->route('dashboard.technic.rule')
                ->with('fail', 'Wystąpił błąd podczas usuwania treści.');
        }
    }
}
