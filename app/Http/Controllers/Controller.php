<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function createInvoice(Order $order)
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
            array_push($positions, ['name' => $value->name . " " . $value->attributes_name . " " . $value->attributes_grind, 'tax' => 23, 'total_price_gross' => $value->price, 'quantity' => $value->quantity]);
            $counter_price += ($value->price * $value->quantity);
        }
        if ($company_free->content != null && $company_free->content != 0) {
            if ($counter_price < $company_free->content) {
                array_push($positions, ['name' => 'Przesyłka InPost', 'tax' => 23, 'total_price_gross' => intval($company->content), 'quantity' => 1]);
            }
        }
        if ($order->payment) {
            $order_payment = 'on-line';
        } else {
            $order_payment = "transfer";
        }
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
                'seller_name' => $company_name->content,
                'seller_tax_no' => $company_nip->content,
                'seller_street' => $company_adres->content,
                'seller_phone' => $company_phone->content,
                'seller_email' => $company_email->content,
                'seller_www' => 'www.coffeesummit.pl',
                'buyer_name' => $order->name,
                'buyer_post_code' => $order->post,
                'buyer_city' => $order->city,
                'buyer_street' => $order->adres,
                'buyer_email' => $order->email,
                'buyer_phone' => $order->phone,
                'buyer_tax_no' => $order->nip != null ? $order->nip : '',
                'positions' => $positions,
                "payment_type" => $order_payment,
            ],
        ]);
        $response_json = $response->json();
        $response_email = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://coffeesummit.fakturownia.pl/invoices/' . $response_json['id'] . '/send_by_email.json', [
            'api_token' => $apiToken,
            'email_to' => strval($order->email) . ',' . strval($company_email->content),
        ]);
        dd($response_email);

        // Możesz obsłużyć odpowiedź od API tutaj, na przykład zwrócić ją jako odpowiedź HTTP lub przetworzyć dane odpowiedzi.

        return $response_json; // Zwróć odpowiedź jako JSON w odpowiedzi HTTP.
    }
}
