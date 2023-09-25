<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCompanyRequest;
use App\Models\Company;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyAdminController extends Controller
{
    public function index()
    {
        $elements = Company::get();
        return view('admin.technic.company.index', compact('elements'));
    }
    public function edit(Company $element)
    {
        if (
            $element->type == 'photo_about_home_page_1' ||
            $element->type == 'photo_about_home_page_2' ||
            $element->type == 'photo_about_home_page_3' ||
            $element->type == 'photo_collaboration_page_1' ||
            $element->type == 'photo_collaboration_page_2' ||
            $element->type == 'photo_collaboration_page_3' ||
            $element->type == 'photo_about_page_1' ||
            $element->type == 'photo_about_page_2' ||
            $element->type == 'photo_about_page_3' ||
            $element->type == 'photo_about_page_4' ||
            $element->type == 'photo_about_page_5' ||
            $element->type == 'photo_about_page_6'
        ) {
            $photos = File::files(public_path('photo'));

            // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
            usort($photos, function ($a, $b) {
                return filemtime($b) - filemtime($a);
            });
        } else {
            $photos = null;
        }
        return view('admin.technic.company.edit', compact('element', 'photos'));
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
