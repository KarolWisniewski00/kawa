<?php

namespace App\Http\Controllers;

use App\Enums\OrderLog as EnumsOrderLog;
use App\Enums\PaymentStatus;
use App\Mail\OrderMail;
use App\Mail\OrderTest;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\Payment;
use Devpark\Transfers24\Requests\Transfers24;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;
use Darryldecode\Cart\CartItem;
use Darryldecode\Cart\CartCollection;

class PaymentController extends Controller
{
    private Transfers24 $transfers24;

    public function __construct(Transfers24 $transfers24)
    {
        $this->transfers24 = $transfers24;
    }
    
    public function status(Request $request)
    {
        $respone = $this->transfers24->receive($request);
        $payment = Payment::where('session_id', $respone->getSessionId())->firstOrFail();

        if ($respone->isSuccess()) {
            $payment->status = PaymentStatus::SUCCESS;
            $payment->save();
            Order::where('id', '=', $payment->order_id)->update(['status' => 'W trakcie realizacji']);
            $order = Order::where('id', '=', $payment->order_id)->first();
            $email = new OrderTest($order->id);
            Mail::to($order->email)->send($email->build());
            Mail::to('kontakt@coffeesummit.pl')->send($email->build());
            $discount = Discount::where('id', $order->discount)->first();
            $response = $this->createInvoice($order, 'paid', $discount);
            $this->logAndReturnResponseFromCreateInvoice($response, 'UNKNOW', $order, false);
            OrderLog::create([
                'name' => 'Przelewy24',
                'description' => 'Płatność została zrealizowana. Zmiana statusu na W trakcie realizacji',
                'type' => EnumsOrderLog::SYSTEM,
                'order_id' => $order->id,
            ]);
        } else {
            $payment->status = PaymentStatus::FAIL;
            $payment->error_code = $respone->getErrorCode();
            $payment->error_description = $respone->getErrorDescription();
            $payment->save();
        }
    }
}
