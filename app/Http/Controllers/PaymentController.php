<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Models\Payment;
use Devpark\Transfers24\Requests\Transfers24;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private Transfers24 $transfers24;

    public function __construct(Transfers24 $transfers24)
    {
        $this->transfers24 = $transfers24;
    }
    public function status(Request $request)
    {
        $payment = app()->make(\App\Payment::class);
        $registration_request = app()->make(\Devpark\Transfers24\Requests\Transfers24::class);

        $register_payment = $registration_request->setEmail('test@example.com')->setAmount(100)->init();

        if ($register_payment->isSuccess()) {
            $payment = Payment::where('session_id', $register_payment->getSessionId())->firstOrFail();
            $payment->update([
                'status' => PaymentStatus::SUCCESS,
            ]);
            return $registration_request->execute($register_payment->getToken(), true);
        } else {
            $payment = Payment::where('session_id', $register_payment->getSessionId())->firstOrFail();
            $payment->status = PaymentStatus::FAIL;
            $payment->error_code = $register_payment->getErrorCode();
            $payment->error_description = $register_payment->getErrorDescription();
            return $registration_request->execute($register_payment->getToken(), true);
        }
    }
}
