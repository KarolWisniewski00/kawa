<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCompanyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'content' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Treść jest wymagana.',
            'content.string' => 'Treść musi być tekstem.',
            'content.max' => 'Treść nie może przekraczać :max znaków.',
        ];
    }
}
