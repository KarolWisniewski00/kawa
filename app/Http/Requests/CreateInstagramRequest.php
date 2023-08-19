<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInstagramRequest extends FormRequest
{
    public function rules()
    {
        return [
            'url' => 'required|url|max:255',
            'order' => 'required|integer',
            'photo' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'url.required' => 'URL jest wymagany.',
            'url.url' => 'Podany URL jest nieprawidłowy.',
            'url.max' => 'URL nie może przekraczać :max znaków.',
            'order.required' => 'Kolejność jest wymagana.',
            'order.integer' => 'Kolejność musi być liczbą całkowitą.',
            'photo.required' => 'Zdjęcie jest wymagane.',
            'photo.string' => 'Zdjęcie musi być tekstem.',
            'photo.max' => 'Zdjęcie nie może przekraczać :max znaków.',
        ];
    }
}
