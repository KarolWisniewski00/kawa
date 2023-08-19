<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGrindingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:grindings',
            'usage_information' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nazwa rodzaju mielenia jest wymagana.',
            'name.unique' => 'Podana nazwa rodzaju mielenia już istnieje.',
        ];
    }
}
