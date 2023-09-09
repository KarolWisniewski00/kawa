<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditAccountUserRequest extends FormRequest
{
    public function rules()
    {
        $user = Auth::user();
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|email|unique:users,email,' . $user->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Imię i nazwisko jest wymagane.',
            'name.string' => 'Imię i nazwisko musi być tekstem.',
            'name.max' => 'Imię i nazwisko nie może przekraczać :max znaków.',
            'email.required' => 'Adres email jest wymagany.',
            'email.email' => 'Adres email musi być poprawny.',
            'email.max' => 'Adres email nie może przekraczać :max znaków.',
            'email.unique' => 'Adres email jest już w użyciu.',
        ];
    }
}
