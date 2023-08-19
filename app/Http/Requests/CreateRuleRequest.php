<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRuleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'type' => 'required|string',
            'content' => 'required|string',
            'order' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Rodzaj jest wymagany.',
            'type.string' => 'Rodzaj musi być tekstem.',
            'content.required' => 'Treść jest wymagana.',
            'content.string' => 'Treść musi być tekstem.',
            'order.required' => 'Kolejność jest wymagana.',
            'order.integer' => 'Kolejność musi być liczbą całkowitą.',
        ];
    }
}
