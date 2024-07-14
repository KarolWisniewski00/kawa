<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:4294967295',
            'order' => 'required|integer',
            'price.*' => 'nullable|numeric|min:0',
            'grinding.*' => 'nullable|exists:grinds,id',
            'visibility_on_website' => 'nullable|boolean',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'visibility_in_google' => 'nullable|boolean',
            'coffee' => 'nullable',
            'tool' => 'nullable',
            'lemon' => 'nullable',
            'height' => 'nullable|integer',
            'photo' => 'required|string|max:255',
            'photo_second' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nazwa produktu jest wymagana.',
            'name.string' => 'Nazwa produktu musi być tekstem.',
            'name.max' => 'Nazwa produktu nie może przekraczać :max znaków.',
            'description.required' => 'Opis produktu jest wymagany.',
            'description.string' => 'Opis produktu musi być tekstem.',
            'order.required' => 'Kolejność jest wymagana.',
            'order.integer' => 'Kolejność musi być liczbą całkowitą.',
            'price.*.numeric' => 'Cena produktu musi być liczbą.',
            'price.*.min' => 'Cena produktu nie może być ujemna.',
            'grind.*.exists' => 'Wybrany rodzaj mielenia jest nieprawidłowy.',
            'visibility_on_website.boolean' => 'Pole widoczności na stronie musi być typu logicznego.',
            'seo_title.string' => 'Meta-tytuł musi być tekstem.',
            'seo_title.max' => 'Meta-tytuł nie może przekraczać :max znaków.',
            'seo_description.string' => 'Meta-opis musi być tekstem.',
            'seo_description.max' => 'Meta-opis nie może przekraczać :max znaków.',
            'visibility_in_google.boolean' => 'Pole widoczności w Google musi być typu logicznego.',
            'photo.required' => 'Zdjęcie produktu jest wymagane.',
            'photo.string' => 'Zdjęcie produktu musi być tekstem.',
            'photo.max' => 'Zdjęcie produktu nie może przekraczać :max znaków.',
            'photo_second.string' => 'Drugie zdjęcie produktu musi być tekstem.',
            'photo_second.max' => 'Drugie zdjęcie produktu nie może przekraczać :max znaków.',
        ];
    }
}
