<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCompanyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'content' => 'nullable|string|max:1500',
        ];
    }

    public function messages()
    {
        return [
            'content.string' => 'Treść musi być tekstem.',
            'content.max' => 'Treść nie może przekraczać :max znaków.',
        ];
    }
}
