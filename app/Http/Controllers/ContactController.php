<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        Breadcrumbs::for('index', function ($trail) {
            $trail->push('Home', route('index'));
        });

        Breadcrumbs::for('contact', function ($trail) {
            $trail->parent('index');
            $trail->push('Kontakt', route('contact'));
        });
        return view('client.coffee.contact.index');
    }

    public function store(SendEmailRequest $request)
    {
        // Dane z formularza
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $message = $request->message;
        $phone = $request->phone;

        // Wyślij e-mail
        $email = new ContactMail($name,$surname, $email, $message, $phone);
        Mail::to('kontakt@coffeesummit.pl')->send($email->build());

        // Powrót po wysłaniu
        return back()->with('success', 'Wiadomość została wysłana pomyślnie.');
    }
}
