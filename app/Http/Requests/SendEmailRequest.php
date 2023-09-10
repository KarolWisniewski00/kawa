<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole "Imię" jest wymagane.',
            'name.string' => 'Pole "Imię" powinno zawierać tekst.',
            'name.max' => 'Pole "Imię" nie może być dłuższe niż 255 znaków.',
            
            'surname.required' => 'Pole "Nazwisko" jest wymagane.',
            'surname.string' => 'Pole "Nazwisko" powinno zawierać tekst.',
            'surname.max' => 'Pole "Nazwisko" nie może być dłuższe niż 255 znaków.',
            
            'email.required' => 'Pole "E-mail" jest wymagane.',
            'email.email' => 'Pole "E-mail" powinno zawierać poprawny adres e-mail.',
            'email.max' => 'Pole "E-mail" nie może być dłuższe niż 255 znaków.',
            
            'message.required' => 'Pole "Wiadomość" jest wymagane.',
            'message.string' => 'Pole "Wiadomość" powinno zawierać tekst.',
            'message.max' => 'Pole "Wiadomość" nie może być dłuższe niż 255 znaków.',
            
            'phone.required' => 'Pole "Telefon" jest wymagane.',
            'phone.string' => 'Pole "Telefon" powinno zawierać tekst.',
            'phone.max' => 'Pole "Telefon" nie może być dłuższe niż 20 znaków.',
        ];
    }
}
