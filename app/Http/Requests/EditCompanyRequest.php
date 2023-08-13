<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCompanyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'content' => 'required|string',
        ];
    }
}