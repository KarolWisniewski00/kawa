<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGrindingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:grindings,name,' . $this->grinding->id,
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
