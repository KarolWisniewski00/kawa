<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInstagramRequest;
use App\Models\Instagram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InstagramAdminController extends Controller
{
    public function index()
    {
        $instagrams = Instagram::orderBy('order')->get();
        return view('admin.technic.instagram.index',compact('instagrams'));
        
    }
    public function create()
    {
        $photos = File::files(public_path('photo'));

        // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
        usort($photos, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        return view('admin.technic.instagram.create',compact('photos'));
        
    }
    public function store(CreateInstagramRequest $request){

        $instagram = new Instagram();
        $instagram->url = $request->url;
        $instagram->order = $request->order;
        $instagram->photo = $request->photo;
        $res = $instagram->save();

        if($res){
            return redirect()->route('dashboard.technic.instagram')->with('success', 'Zdjęcie z instagrama zostało dodane.');
        }else{
            return redirect()->route('dashboard.technic.instagram')->with('fail', 'Wystąpił błąd podczas dodawania zdjęcia z instagrama.');
        }
    }
    public function edit(Instagram $instagram){
        $photos = File::files(public_path('photo'));

        // Sortowanie tablicy $photos od najnowszych do najstarszych na podstawie daty utworzenia.
        usort($photos, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });

        return view('admin.technic.instagram.edit',compact('instagram','photos'));
    }
    public function update(CreateInstagramRequest $request, Instagram $instagram)
    {
        $res = $instagram->update([
            'url' => $request->url,
            'order' => $request->order,
            'photo' => $request->photo,
        ]);

        if ($res) {
            return redirect()->route('dashboard.technic.instagram')
                ->with('success', 'Zdjęcie z instagrama zostało zaktualizowane.');
        } else {
            return redirect()->route('dashboard.technic.instagram.edit', $instagram->id)
                ->with('Fail', 'Wystąpił błąd podczas aktualizowania zdjęcia z instagrama.');
        }
    }
    public function delete(Instagram $instagram)
    {
        $res = $instagram->delete();
        if ($res) {
            return redirect()->route('dashboard.technic.instagram')
                ->with('success', 'Zdjęcie z instagrama zostało usunięte.');
        } else {
            return redirect()->route('dashboard.technic.instagram')
                ->with('fail', 'Wystąpił błąd podczas usuwania zdjęcia z instagrama.');
        }
    }
}
