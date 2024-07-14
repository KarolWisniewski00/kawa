<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        if($request->input('payload.status') == 'delivered')
        Order::where('shipment_id', $request->input('payload.shipment_id'))->update([
            'status' => 'Zrealizowane'
        ]);
        return response()->json(['status' => 'success'], 200);
    }
}
