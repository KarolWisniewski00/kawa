<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSizeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:sizes,name,' . $this->size->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nazwa jest wymagana.',
            'name.string' => 'Nazwa musi być tekstem.',
            'name.max' => 'Nazwa nie może przekraczać :max znaków.',
            'name.unique' => 'Podana nazwa już istnieje.',
        ];
    }
}
