<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditPasswordUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => 'nullable|min:8|max:255',
            'password_confirm' => 'nullable|min:8|max:255|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'Hasło musi mieć co najmniej :min znaków.',
            'password.max' => 'Hasło nie może przekraczać :max znaków.',
            'password_confirm.min' => 'Potwierdzenie hasła musi mieć co najmniej :min znaków.',
            'password_confirm.max' => 'Potwierdzenie hasła nie może przekraczać :max znaków.',
            'password_confirm.same' => 'Potwierdzenie hasła musi być takie same jak nowe hasło.',
        ];
    }
    
}
