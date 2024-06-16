<?php

namespace App\Http\Controllers;

use App\Enums\OrderLog as EnumsOrderLog;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderLog;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function createInvoice(Order $order, $status = null)
    {
        $apiToken = '6oQip8emYz6GpixnQZeb';
        $order_items = OrderItem::where('order_id', $order->id)->get();
        $positions = [];
        $company = Company::where('type', 'price_ship')->first();
        $company_free = Company::where('type', 'free_ship')->first();
        $company_name = Company::where('type', 'name_company')->first();
        $company_nip = Company::where('type', 'nip')->first();
        $company_adres = Company::where('type', 'adres_contact_page')->first();
        $company_phone = Company::where('type', 'phone_contact_page')->first();
        $company_email = Company::where('type', 'email_contact_page')->first();

        $counter_price = 0;
        foreach ($order_items as $key => $value) {
            array_push($positions, ['name' => $value->name . " " . $value->attributes_name . " " . $value->attributes_grind, 'tax' => 23, 'total_price_gross' => floatval(floatval($value->price) * floatval($value->quantity)), 'quantity' => $value->quantity]);
            $counter_price += ($value->price * $value->quantity);
        }
       $tot = $order->total - $company->content;
        if($tot == $counter_price){
            if ($counter_price < $company_free->content) {
                array_push($positions, ['name' => 'Przesyłka InPost', 'tax' => 23, 'total_price_gross' => intval($company->content), 'quantity' => 1]);
            }
        }

        if ($order->payment) {
            $order_payment = 'on-line';
        } else {
            $order_payment = "transfer";
        }
        if ($order->nip != null) {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://coffeesummit.fakturownia.pl/invoices.json', [
                'api_token' => $apiToken,
                'invoice' => [
                    'kind' => 'vat',
                    'number' => null,
                    'sell_date' => $order->created_at->format('Y-m-d'),
                    'issue_date' => $order->created_at->format('Y-m-d'),
                    'paid_date' => $order->created_at->addDays(7)->format('Y-m-d'),
                    'seller_www' => 'www.coffeesummit.pl',
                    'buyer_name' => $order->company,
                    'buyer_post_code' => $order->post_invoice,
                    'buyer_city' => $order->city_invoice,
                    'buyer_street' => $order->street_invoice,
                    'buyer_tax_no' => $order->nip,
                    'positions' => $positions,
                    "payment_type" => $order_payment,
                    "status" => $status
                ],
            ]);
        } else {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://coffeesummit.fakturownia.pl/invoices.json', [
                'api_token' => $apiToken,
                'invoice' => [
                    'kind' => 'vat',
                    'number' => null,
                    'sell_date' => $order->created_at->format('Y-m-d'),
                    'issue_date' => $order->created_at->format('Y-m-d'),
                    'paid_date' => $order->created_at->addDays(7)->format('Y-m-d'),
                    'buyer_name' => $order->name,
                    'buyer_post_code' => $order->post,
                    'buyer_city' => $order->city,
                    'buyer_street' => $order->street,
                    'buyer_tax_no' => '',
                    'positions' => $positions,
                    "payment_type" => $order_payment,
                    "status" => $status
                ],
            ]);
        }

        $response_json = $response->json();
        try {
            $response_email = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://coffeesummit.fakturownia.pl/invoices/' . $response_json['id'] . '/send_by_email.json', [
                'api_token' => $apiToken,
                'email_to' => strval($order->email) . ',' . strval($company_email->content),
            ]);
        } catch (\Throwable $th) {
            return $response_json;
        }

        // Możesz obsłużyć odpowiedź od API tutaj, na przykład zwrócić ją jako odpowiedź HTTP lub przetworzyć dane odpowiedzi.

        return $response_json; // Zwróć odpowiedź jako JSON w odpowiedzi HTTP.
    }
    public function logAndReturnResponseFromCreateInvoice($response, $user, Order $order, $ret = true)
    {
        try {
            $name = $user->name;
        } catch (\Throwable $th) {
            $name = 'UNKNOW';
        }
        try {
            if ($response['code'] == 'error') {
                try {
                    OrderLog::create([
                        'name' => $name,
                        'description' => 'Odpowiedź fakturownia:' . $response['message']['department'],
                        'type' => EnumsOrderLog::ADMIN,
                        'order_id' => $order->id,
                    ]);
                } catch (\Throwable $th) {
                    try {
                        OrderLog::create([
                            'name' => $name,
                            'description' => 'Odpowiedź fakturownia:' . $response['message']['buyer_tax_no'],
                            'type' => EnumsOrderLog::ADMIN,
                            'order_id' => $order->id,
                        ]);
                    } catch (\Throwable $th) {
                        OrderLog::create([
                            'name' => $name,
                            'description' => 'Error nie wysłano faktury',
                            'type' => EnumsOrderLog::ADMIN,
                            'order_id' => $order->id,
                        ]);
                    }
                }
                if ($ret != false) {
                    return redirect()->route('dashboard.order.show', $order->id)->with('fail', 'Faktura nie została wysłana.');
                }
            } else {
                OrderLog::create([
                    'name' => $name,
                    'description' => 'Wysłano fakturę i utworzono w systemie fakturownia',
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $order->id,
                ]);
                if ($ret != false) {
                    return redirect()->route('dashboard.order.show', $order->id)->with('success', 'Faktura została pomyślnie wysłana.');
                }
            }
        } catch (\Throwable $th) {
            OrderLog::create([
                'name' => $name,
                'description' => 'Wysłano fakturę i utworzono w systemie fakturownia',
                'type' => EnumsOrderLog::ADMIN,
                'order_id' => $order->id,
            ]);
            if ($ret != false) {
                return redirect()->route('dashboard.order.show', $order->id)->with('success', 'Faktura została pomyślnie wysłana.');
            }
        }
    }
}
