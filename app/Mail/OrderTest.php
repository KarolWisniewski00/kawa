<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderTest extends Mailable
{
    use Queueable, SerializesModels;

    public $order_id;

    /**
     * Create a new message instance.
     */
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order',
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
        $order_id = $this->order_id;
        $order = Order::where('id', $order_id)->first();

        $orders = OrderItem::where('order_id', $order_id)->get();
        $photos = ProductImage::get();
        $photos_good = [];
        foreach ($orders as $o) {
            foreach($photos as $photo){
                $p = Product::where('name',$o->name)->first();
                if($photo->product_id == $p->id){
                    if($photo->order == 1){
                        array_push($photos_good,$photo->image_path);
                    }
                }
            }
        }
        return $this->subject('Potwierdzenie zamównienia')
                    ->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'))
                    ->view('emails.order', compact('order','photos_good','orders'));
    }
}
