<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Contracts\DeletesUsers;
class UserController extends Controller implements DeletesUsers
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('account.user', function ($trail) {
            $trail->parent('index');
            $trail->push('Konto', route('account.user'));
        });
        $user = Auth::user();
        return view('client.coffee.account.user.index', compact('user'));
    }
    //INDEX EDIT
    public function edit($element)
    {
        $user = Auth::user();
        if($element == 'account'){
            return view('client.coffee.account.user.edit.account', compact('user'));
        }else{
            return view('client.coffee.account.user.edit.password', compact('user'));
        }
    }
    //FORM EDIT
    public function update(Request $request, $element)
    {
        $user = Auth::user();
        if($element == 'account'){
            $res = User::where('id', '=', $user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }else{
            if (Hash::check($request->password_old, $user->password)) {
                $res = User::where('id', '=', $user->id)->update([
                    'password' => Hash::make($request->password),
                ]);
            }
        }
        if (isset($res) && $res) {
            return redirect()->route('account.user')->with('success', 'Operacja zakończona powodzeniem.');
        } else {
            return redirect()->route('account.user.edit', $element)->with('fail', 'Coś poszło nie tak.');
        }
    }
    //DELETE ACCOUNT
    public function delete()
    {
        $user = Auth::user();
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
        return redirect()->route('account.user')->with('success', 'Operacja zakończona powodzeniem.');
    }
}
