<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCompanyRequest;
use App\Models\Company;
use App\Models\Rule;
use Illuminate\Http\Request;

class CompanyAdminController extends Controller
{
    public function index()
    {
        $elements = Company::get();
        return view('admin.technic.company.index', compact('elements'));
    }
    public function edit(Company $element)
    {
        return view('admin.technic.company.edit', compact('element'));
    }
    public function update(EditCompanyRequest $request, Company $element)
    {
        $res = $element->update([
            'content' => $request->content,
        ]);

        if ($res) {
            return redirect()->route('dashboard.technic.company')
                ->with('success', 'Treść została zaktualizowana.');
        } else {
            return redirect()->route('dashboard.technic.company.edit', $element->id)
                ->with('Fail', 'Wystąpił błąd podczas aktualizowania treści.');
        }
    }
}
