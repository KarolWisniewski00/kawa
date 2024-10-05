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

    public function calculateDiscount($discount, $price)
    {
        if ($discount->type == 'procentowy') {
            return $price - ($price * ($discount->value /  100));
        } else {
            return $price - $discount->value;
        }
    }

    public function createInvoice(Order $order, $status = null, $discount = null)
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

        if ($discount != null) {
            if ($discount->type == 'procentowy') {
                $counter_price = 0;
                foreach ($order_items as $key => $value) {
                    $total = floatval(floatval($value->price) * floatval($value->quantity));
                    $newPrice = (float) $this->calculateDiscount($discount, (float) $total);
                    $total = $newPrice;

                    array_push($positions, ['name' => $value->name . " " . $value->attributes_name . " " . $value->attributes_grind, 'tax' => 23, 'total_price_gross' => $total, 'quantity' => $value->quantity]);
                    $counter_price += $total;
                }

                $companyContent = (float) $this->calculateDiscount($discount, (float) $company->content);
                if ($order->adres_type == 'adres_person') {
                    if ($order->post == '64-920') {
                    } else {
                        array_push($positions, ['name' => 'Przesyłka InPost', 'tax' => 23, 'total_price_gross' => $companyContent, 'quantity' => 1]);
                    }
                } else {
                    if ($total >= $company->content) {
                    } else {
                        array_push($positions, ['name' => 'Przesyłka InPost', 'tax' => 23, 'total_price_gross' => $companyContent, 'quantity' => 1]);
                    }
                }
            } else {
                $counter_price = 0;
                foreach ($order_items as $key => $value) {
                    if ($key == 0) {
                        $total = floatval(floatval($value->price) * floatval($value->quantity));
                        $newPrice = (float) $this->calculateDiscount($discount, (float) $total);
                        $total = $newPrice;

                        array_push($positions, ['name' => $value->name . " " . $value->attributes_name . " " . $value->attributes_grind, 'tax' => 23, 'total_price_gross' => $total, 'quantity' => $value->quantity]);
                        $counter_price += $total;
                    } else {
                        array_push($positions, ['name' => $value->name . " " . $value->attributes_name . " " . $value->attributes_grind, 'tax' => 23, 'total_price_gross' => floatval(floatval($value->price) * floatval($value->quantity)), 'quantity' => $value->quantity]);
                        $counter_price += ($value->price * $value->quantity);
                    }
                }

                if ($order->adres_type == 'adres_person') {
                    if ($order->post == '64-920') {
                    } else {
                        array_push($positions, ['name' => 'Przesyłka InPost', 'tax' => 23, 'total_price_gross' =>  (float) $company->content, 'quantity' => 1]);
                    }
                } else {
                    if ($counter_price >= $order->total) {
                    } else {
                        array_push($positions, ['name' => 'Przesyłka InPost', 'tax' => 23, 'total_price_gross' =>  (float) $company->content, 'quantity' => 1]);
                    }
                }
            }
        } else {
            $counter_price = 0;
            foreach ($order_items as $key => $value) {
                array_push($positions, ['name' => $value->name . " " . $value->attributes_name . " " . $value->attributes_grind, 'tax' => 23, 'total_price_gross' => floatval(floatval($value->price) * floatval($value->quantity)), 'quantity' => $value->quantity]);
                $counter_price += ($value->price * $value->quantity);
            }
            $tot = $order->total - $company->content;
            if ($tot == $counter_price) {
                if ($counter_price < $company_free->content) {
                    array_push($positions, ['name' => 'Przesyłka InPost', 'tax' => 23, 'total_price_gross' => intval($company->content), 'quantity' => 1]);
                }
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
            return null;
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
        if ($response == null) {
            OrderLog::create([
                'name' => $name,
                'description' => 'Nie utworzono faktury ponieważ nie podano nipu',
                'type' => EnumsOrderLog::ADMIN,
                'order_id' => $order->id,
            ]);
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
    public function splitName($name)
    {
        $parts = explode(' ', $name);
        $firstName = array_shift($parts);
        $lastName = implode(' ', $parts);

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
        ];
    }
    public function createShipment(
        String $first_name,
        String $last_name,
        String $email,
        String $phone,
        String $target_point,
        String $company_name = null,
        String $template = "small",
        String $service = "inpost_locker_standard",
        String $reference = 'coffeesummit.pl',
    ) {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJzQlpXVzFNZzVlQnpDYU1XU3JvTlBjRWFveFpXcW9Ua2FuZVB3X291LWxvIn0.eyJleHAiOjIwMzUyMTU3OTQsImlhdCI6MTcxOTg1NTc5NCwianRpIjoiZmZkY2VmOGUtYjZhZS00ZWU5LTgwMTYtNGU0OTYyZWNlYWVkIiwiaXNzIjoiaHR0cHM6Ly9sb2dpbi5pbnBvc3QucGwvYXV0aC9yZWFsbXMvZXh0ZXJuYWwiLCJzdWIiOiJmOjEyNDc1MDUxLTFjMDMtNGU1OS1iYTBjLTJiNDU2OTVlZjUzNToyNzl1VzdDNW1FdnFfTHZLRVpudGJTXzJ5alVaZmMyWUtRUzlyNUdCVS1FIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoic2hpcHgiLCJzZXNzaW9uX3N0YXRlIjoiMzZkNjljOTQtZjNiOS00YmIxLTgyODMtN2I4MWMzZDkzMzdhIiwic2NvcGUiOiJvcGVuaWQgYXBpOmFwaXBvaW50cyBhcGk6c2hpcHgiLCJzaWQiOiIzNmQ2OWM5NC1mM2I5LTRiYjEtODI4My03YjgxYzNkOTMzN2EiLCJhbGxvd2VkX3JlZmVycmVycyI6IiIsInV1aWQiOiIxYzk1MGYyMS00ZDY5LTRmZGYtYmExYi1lNmI4MmQ5YmMzMDciLCJlbWFpbCI6ImtvbnRha3RAY29mZmVlc3VtbWl0LnBsIn0.f8YrzvlREQZrtaSmHdnPU-D8iNMouo5ovRypCodA8ZUFCkAmL28Viv7admOdP2_NTbqCvdpaKo1R6W3dLHiMV200Rcc8rF99V0nLkIt2qoAdUkP3yN4ZXyD7GFSNs7n5ygGLA17hNR_wTTZ8AamwZveyR4g9SBUNSJ4OIrNJy_v53IE8Yh-Mh4DqwaHlTCzZG03IsG4kk46zHCKvAnoqciBuCd0WX9a0PQ1VSJ07h8cli4CPeJyxn81vcfK0WgYhcZinUydTdofDXVE2SKzpfbCXQwASVTU36FjsSob_NqFj-D0__JTY92eOS3N791Ya9U3MU7mft7EUPfRrv34eRA',
        ])->post('https://api-shipx-pl.easypack24.net/v1/organizations/92302/shipments', [
            "receiver" => [
                "company_name" => $company_name,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone" => $phone,
            ],
            "parcels" => [
                "template" => $template
            ],
            "custom_attributes" => [
                "sending_method" => "any_point",
                "target_point" => $target_point
            ],
            "service" => $service,
            "reference" => $reference
        ]);
    }
    public function createShipmentCToC(
        String $first_name,
        String $last_name,
        String $email,
        String $phone,
        String $company_name = null,
        String $reference = 'coffeesummit.pl',
        String $street,
        String $building_number,
        String $city,
        String $post_code,
        String $weight,
        String $length,
        String $width,
        String $height,
        String $insurance,
    ) {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJzQlpXVzFNZzVlQnpDYU1XU3JvTlBjRWFveFpXcW9Ua2FuZVB3X291LWxvIn0.eyJleHAiOjIwMzUyMTU3OTQsImlhdCI6MTcxOTg1NTc5NCwianRpIjoiZmZkY2VmOGUtYjZhZS00ZWU5LTgwMTYtNGU0OTYyZWNlYWVkIiwiaXNzIjoiaHR0cHM6Ly9sb2dpbi5pbnBvc3QucGwvYXV0aC9yZWFsbXMvZXh0ZXJuYWwiLCJzdWIiOiJmOjEyNDc1MDUxLTFjMDMtNGU1OS1iYTBjLTJiNDU2OTVlZjUzNToyNzl1VzdDNW1FdnFfTHZLRVpudGJTXzJ5alVaZmMyWUtRUzlyNUdCVS1FIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoic2hpcHgiLCJzZXNzaW9uX3N0YXRlIjoiMzZkNjljOTQtZjNiOS00YmIxLTgyODMtN2I4MWMzZDkzMzdhIiwic2NvcGUiOiJvcGVuaWQgYXBpOmFwaXBvaW50cyBhcGk6c2hpcHgiLCJzaWQiOiIzNmQ2OWM5NC1mM2I5LTRiYjEtODI4My03YjgxYzNkOTMzN2EiLCJhbGxvd2VkX3JlZmVycmVycyI6IiIsInV1aWQiOiIxYzk1MGYyMS00ZDY5LTRmZGYtYmExYi1lNmI4MmQ5YmMzMDciLCJlbWFpbCI6ImtvbnRha3RAY29mZmVlc3VtbWl0LnBsIn0.f8YrzvlREQZrtaSmHdnPU-D8iNMouo5ovRypCodA8ZUFCkAmL28Viv7admOdP2_NTbqCvdpaKo1R6W3dLHiMV200Rcc8rF99V0nLkIt2qoAdUkP3yN4ZXyD7GFSNs7n5ygGLA17hNR_wTTZ8AamwZveyR4g9SBUNSJ4OIrNJy_v53IE8Yh-Mh4DqwaHlTCzZG03IsG4kk46zHCKvAnoqciBuCd0WX9a0PQ1VSJ07h8cli4CPeJyxn81vcfK0WgYhcZinUydTdofDXVE2SKzpfbCXQwASVTU36FjsSob_NqFj-D0__JTY92eOS3N791Ya9U3MU7mft7EUPfRrv34eRA',
        ])->post('https://api-shipx-pl.easypack24.net/v1/organizations/92302/shipments', [
            "receiver" => [
                "company_name" => $company_name,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone" => $phone,
                "address" => [
                    "street" => $street,
                    "building_number" => $building_number,
                    "city" => $city,
                    "post_code" => $post_code,
                    "country_code" => "PL"
                ]
            ],
            "parcels" => [
                [
                    "dimensions" => [
                        "length" => intval($length),
                        "width" => intval($width),
                        "height" => intval($height),
                        "unit" => "mm"
                    ],
                    "weight" => [
                        "amount" => intval($weight),
                        "unit" => "kg"
                    ],
                    "is_non_standard" => false
                ]
            ],
            "insurance" => [
                "amount" => intval($insurance),
                "currency" => "PLN"
            ],
            //"cod" => [
            //    "amount" => intval($cod),
            //    "currency" => "PLN"
            //],

            "service" => "inpost_courier_standard",

            //"additional_services" => [
            //    "email",
            //    "sms"
            //],
            "reference" => $reference,
            'trucker_id' => 45903608
        ]);
    }
}
