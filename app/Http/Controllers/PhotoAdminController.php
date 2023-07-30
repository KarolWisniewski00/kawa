<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\LengthAwarePaginator;

class PhotoAdminController extends Controller
{
    public function index()
    {
        $files = collect(File::files(public_path('photo')));
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20;

        $currentPageItems = $files->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $paginatedFiles = new LengthAwarePaginator(
            $currentPageItems,
            $files->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        return view('admin.photo.index', [
            'photoFiles' => $paginatedFiles
        ]);
    }
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $fileName = time() . rand(1, 100) . '.' . $file->extension();
        $res = $file->move(public_path('photo'), $fileName);

        if ($res) {
            return response()->json(['success' => 'Zdjęcie zostało pomyślnie przesłane.']);
        } else {
            return response()->json(['fail' => 'Zdjęcie nie zostało zapisane.']);
        }
    }
    public function delete($slug)
    {
        $photoFilePath = public_path('photo/' . $slug);

        if (File::exists($photoFilePath)) {
            $res = File::delete($photoFilePath);
        }

        if ($res) {
            return redirect()->route('dashboard.photo')->with('success', 'Zdjęcie zostało pomyślnie usunięte.');
        } else {
            return redirect()->route('dashboard.photo')->with('fail', 'Zdjęcie nie zostało usunięte.');
        }
    }
}
