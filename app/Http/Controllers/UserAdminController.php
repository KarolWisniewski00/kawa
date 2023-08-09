<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::orderBy('created_at', 'desc')->paginate(20),
        ]);
    }
    public function delete(User $user)
    {
        $u = Auth::user();
        if ($u->id != $user->id){
            $res = $user->delete();
            if ($res) {
                return redirect()->route('dashboard.user')
                    ->with('success', 'Użytkownik został usunięty.');
            } else {
                return redirect()->route('dashboard.user')
                    ->with('fail', 'Wystąpił błąd podczas usuwania Użytkownika.');
            }
        }else{
            return redirect()->route('dashboard.user')
            ->with('fail', 'Nie można usunąć samego siebie.');
        }
    }
}
