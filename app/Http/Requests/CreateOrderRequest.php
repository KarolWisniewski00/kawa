<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:255',
            'post' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'street_extra' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'extra' => 'nullable|string',
            'type_transfer' => 'required',
            'type_transfer_24' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Imię i nazwisko jest wymagane.',
            'name.string' => 'Imię i nazwisko musi być tekstem.',
            'name.max' => 'Imię i nazwisko nie może przekraczać :max znaków.',
            'email.required' => 'Adres email jest wymagany.',
            'email.email' => 'Adres email musi być poprawny.',
            'email.max' => 'Adres email nie może przekraczać :max znaków.',
            'company.string' => 'Nazwa firmy musi być tekstem.',
            'company.max' => 'Nazwa firmy nie może przekraczać :max znaków.',
            'nip.string' => 'NIP musi być tekstem.',
            'nip.max' => 'NIP nie może przekraczać :max znaków.',
            'post.required' => 'Kod pocztowy jest wymagany.',
            'post.string' => 'Kod pocztowy musi być tekstem.',
            'post.max' => 'Kod pocztowy nie może przekraczać :max znaków.',
            'street.required' => 'Ulica jest wymagana.',
            'street.string' => 'Ulica musi być tekstem.',
            'street.max' => 'Ulica nie może przekraczać :max znaków.',
            'street_extra.string' => 'Adres dodatkowy musi być tekstem.',
            'street_extra.max' => 'Adres dodatkowy nie może przekraczać :max znaków.',
            'city.required' => 'Miasto jest wymagane.',
            'city.string' => 'Miasto musi być tekstem.',
            'city.max' => 'Miasto nie może przekraczać :max znaków.',
            'phone.required' => 'Numer telefonu jest wymagany.',
            'phone.string' => 'Numer telefonu musi być tekstem.',
            'phone.max' => 'Numer telefonu nie może przekraczać :max znaków.',
            'extra.string' => 'Dodatkowe informacje muszą być tekstem.',
        ];
    }
}
