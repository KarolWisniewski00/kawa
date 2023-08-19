<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'photo' => 'required|string|max:255',
            'start' => 'required||string|max:4294967295',
            'content' => 'required|string|max:4294967295',
            'end' => 'required|string|max:4294967295',
            'order' => 'required|integer',
            'visibility_on_website' => 'boolean',
            'seo_title' => 'string|max:255',
            'seo_description' => 'string|max:255',
            'seo_keywords' => 'string|max:255',
            'visibility_in_google' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tytuł jest wymagany.',
            'photo.required' => 'Zdjęcie jest wymagane.',
            'start.required' => 'Data rozpoczęcia jest wymagana.',
            'content.required' => 'Treść jest wymagana.',
            'end.required' => 'Data zakończenia jest wymagana.',
            'order.required' => 'Kolejność jest wymagana.',
            'order.integer' => 'Kolejność musi być liczbą całkowitą.',
            'visibility_on_website.boolean' => 'Pole widoczności na stronie musi być typu logicznego.',
            'seo_title.string' => 'Meta-tytuł musi być tekstem.',
            'seo_title.max' => 'Meta-tytuł nie może przekraczać :max znaków.',
            'seo_description.string' => 'Meta-opis musi być tekstem.',
            'seo_description.max' => 'Meta-opis nie może przekraczać :max znaków.',
            'seo_keywords.string' => 'Meta-słowa kluczowe muszą być tekstem.',
            'seo_keywords.max' => 'Meta-słowa kluczowe nie mogą przekraczać :max znaków.',
            'visibility_in_google.boolean' => 'Pole widoczności w Google musi być typu logicznego.',
        ];
    }
}
