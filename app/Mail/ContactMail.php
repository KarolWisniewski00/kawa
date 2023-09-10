<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $surname;
    public $email;
    public $message;
    public $phone;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $surname, $email, $message, $phone)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->message = $message;
        $this->phone = $phone;
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    public function build()
    {
        $m = $this->message;
        return $this->subject('Nowa wiadomość od ' . $this->name.' '.$this->surname)
                    ->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'))
                    ->view('emails.contact', compact('m')); // Utwórz widok e-maila, np. 'resources/views/emails/contact.blade.php'
    }
}
