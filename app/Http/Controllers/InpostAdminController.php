<?php

namespace App\Http\Controllers;

use App\Enums\OrderLog as EnumsOrderLog;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class InpostAdminController extends Controller
{
    private function gLabel(Order $order, User $user)
    {
        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJzQlpXVzFNZzVlQnpDYU1XU3JvTlBjRWFveFpXcW9Ua2FuZVB3X291LWxvIn0.eyJleHAiOjIwMzUyMTU3OTQsImlhdCI6MTcxOTg1NTc5NCwianRpIjoiZmZkY2VmOGUtYjZhZS00ZWU5LTgwMTYtNGU0OTYyZWNlYWVkIiwiaXNzIjoiaHR0cHM6Ly9sb2dpbi5pbnBvc3QucGwvYXV0aC9yZWFsbXMvZXh0ZXJuYWwiLCJzdWIiOiJmOjEyNDc1MDUxLTFjMDMtNGU1OS1iYTBjLTJiNDU2OTVlZjUzNToyNzl1VzdDNW1FdnFfTHZLRVpudGJTXzJ5alVaZmMyWUtRUzlyNUdCVS1FIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoic2hpcHgiLCJzZXNzaW9uX3N0YXRlIjoiMzZkNjljOTQtZjNiOS00YmIxLTgyODMtN2I4MWMzZDkzMzdhIiwic2NvcGUiOiJvcGVuaWQgYXBpOmFwaXBvaW50cyBhcGk6c2hpcHgiLCJzaWQiOiIzNmQ2OWM5NC1mM2I5LTRiYjEtODI4My03YjgxYzNkOTMzN2EiLCJhbGxvd2VkX3JlZmVycmVycyI6IiIsInV1aWQiOiIxYzk1MGYyMS00ZDY5LTRmZGYtYmExYi1lNmI4MmQ5YmMzMDciLCJlbWFpbCI6ImtvbnRha3RAY29mZmVlc3VtbWl0LnBsIn0.f8YrzvlREQZrtaSmHdnPU-D8iNMouo5ovRypCodA8ZUFCkAmL28Viv7admOdP2_NTbqCvdpaKo1R6W3dLHiMV200Rcc8rF99V0nLkIt2qoAdUkP3yN4ZXyD7GFSNs7n5ygGLA17hNR_wTTZ8AamwZveyR4g9SBUNSJ4OIrNJy_v53IE8Yh-Mh4DqwaHlTCzZG03IsG4kk46zHCKvAnoqciBuCd0WX9a0PQ1VSJ07h8cli4CPeJyxn81vcfK0WgYhcZinUydTdofDXVE2SKzpfbCXQwASVTU36FjsSob_NqFj-D0__JTY92eOS3N791Ya9U3MU7mft7EUPfRrv34eRA',
        ])->get('https://api-shipx-pl.easypack24.net/v1/shipments/' . $order->shipment_id . '/label', [
            'type' => 'a6',
        ]);


        if ($res) {
            OrderLog::create([
                'name' => $user->name,
                'description' => 'Pobranie etykiety A6P ' . $order->point,
                'type' => EnumsOrderLog::ADMIN,
                'order_id' => $order->id,
            ]);
            // Zwróć plik jako odpowiedź do pobrania
            return Response::make($res->body(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $order->point . '.pdf"',
            ]);
        } else {
            OrderLog::create([
                'name' => $user->name,
                'description' => 'Nie udało się pobrać etykiety A6P',
                'type' => EnumsOrderLog::ADMIN,
                'order_id' => $order->id,
            ]);
            return redirect()->route('dashboard.order.show', $order->id)->with('fail', 'Nie udało się pobrać etykiety A6P');
        }
    }

    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJzQlpXVzFNZzVlQnpDYU1XU3JvTlBjRWFveFpXcW9Ua2FuZVB3X291LWxvIn0.eyJleHAiOjIwMzUyMTU3OTQsImlhdCI6MTcxOTg1NTc5NCwianRpIjoiZmZkY2VmOGUtYjZhZS00ZWU5LTgwMTYtNGU0OTYyZWNlYWVkIiwiaXNzIjoiaHR0cHM6Ly9sb2dpbi5pbnBvc3QucGwvYXV0aC9yZWFsbXMvZXh0ZXJuYWwiLCJzdWIiOiJmOjEyNDc1MDUxLTFjMDMtNGU1OS1iYTBjLTJiNDU2OTVlZjUzNToyNzl1VzdDNW1FdnFfTHZLRVpudGJTXzJ5alVaZmMyWUtRUzlyNUdCVS1FIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoic2hpcHgiLCJzZXNzaW9uX3N0YXRlIjoiMzZkNjljOTQtZjNiOS00YmIxLTgyODMtN2I4MWMzZDkzMzdhIiwic2NvcGUiOiJvcGVuaWQgYXBpOmFwaXBvaW50cyBhcGk6c2hpcHgiLCJzaWQiOiIzNmQ2OWM5NC1mM2I5LTRiYjEtODI4My03YjgxYzNkOTMzN2EiLCJhbGxvd2VkX3JlZmVycmVycyI6IiIsInV1aWQiOiIxYzk1MGYyMS00ZDY5LTRmZGYtYmExYi1lNmI4MmQ5YmMzMDciLCJlbWFpbCI6ImtvbnRha3RAY29mZmVlc3VtbWl0LnBsIn0.f8YrzvlREQZrtaSmHdnPU-D8iNMouo5ovRypCodA8ZUFCkAmL28Viv7admOdP2_NTbqCvdpaKo1R6W3dLHiMV200Rcc8rF99V0nLkIt2qoAdUkP3yN4ZXyD7GFSNs7n5ygGLA17hNR_wTTZ8AamwZveyR4g9SBUNSJ4OIrNJy_v53IE8Yh-Mh4DqwaHlTCzZG03IsG4kk46zHCKvAnoqciBuCd0WX9a0PQ1VSJ07h8cli4CPeJyxn81vcfK0WgYhcZinUydTdofDXVE2SKzpfbCXQwASVTU36FjsSob_NqFj-D0__JTY92eOS3N791Ya9U3MU7mft7EUPfRrv34eRA',
        ])->get('https://api-shipx-pl.easypack24.net/v1/organizations/92302/shipments');

        if ($response->successful()) {
            $shipments = $response->json();
            return view('admin.inpost.show', ['shipments' => $shipments]);
        } else {
            return view('admin.inpost.show', ['shipments' => 'error']);
        }
    }
    public function createShipmentPointToPoint(Order $order, String $size)
    {
        $user = Auth::user();
        if ($order->name_recive != null) {
            $name = $order->name_recive;
        } else {
            $name = $order->name;
        }
        if ($order->email_recive != null) {
            $email = $order->email_recive;
        } else {
            $email = $order->email;
        }
        if ($order->phone_recive != null) {
            $phone = $order->phone_recive;
        } else {
            $phone = $order->phone;
        }
        $name_splited = $this->splitName($name);

        if ($order->point != null) {
            $shipment =  $this->createShipment(
                $name_splited['first_name'],
                $name_splited['last_name'],
                $email,
                $phone,
                $order->point,
                $order->company,
                $size
            );
            OrderLog::create([
                'name' => $user->name,
                'description' => 'Utworzono przesyłkę w InPost - ' . $size,
                'type' => EnumsOrderLog::ADMIN,
                'order_id' => $order->id,
            ]);
            OrderLog::create([
                'name' => $user->name,
                'description' => 'Nnumer id przesyłki - ' . $shipment['id'],
                'type' => EnumsOrderLog::ADMIN,
                'order_id' => $order->id,
            ]);
            Order::where('id', '=', $order->id)->update(['shipment_id' => $shipment['id']]);
            return redirect()->route('dashboard.order.show', $order->id)->with('success', 'Przesyłkę utworzono.');
        } else {
            OrderLog::create([
                'name' => $user->name,
                'description' => 'Nie utworzono przesyłki - brak numeru paczkomatu.',
                'type' => EnumsOrderLog::ADMIN,
                'order_id' => $order->id,
            ]);
            return redirect()->route('dashboard.order.show', $order->id)->with('fail', 'Przesyłka nie została utworzona - brak numeru paczkomatu.');
        }
    }
    public function checkStatusShipmentById(Order $order)
    {
        $user = Auth::user();

        $res = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJzQlpXVzFNZzVlQnpDYU1XU3JvTlBjRWFveFpXcW9Ua2FuZVB3X291LWxvIn0.eyJleHAiOjIwMzUyMTU3OTQsImlhdCI6MTcxOTg1NTc5NCwianRpIjoiZmZkY2VmOGUtYjZhZS00ZWU5LTgwMTYtNGU0OTYyZWNlYWVkIiwiaXNzIjoiaHR0cHM6Ly9sb2dpbi5pbnBvc3QucGwvYXV0aC9yZWFsbXMvZXh0ZXJuYWwiLCJzdWIiOiJmOjEyNDc1MDUxLTFjMDMtNGU1OS1iYTBjLTJiNDU2OTVlZjUzNToyNzl1VzdDNW1FdnFfTHZLRVpudGJTXzJ5alVaZmMyWUtRUzlyNUdCVS1FIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoic2hpcHgiLCJzZXNzaW9uX3N0YXRlIjoiMzZkNjljOTQtZjNiOS00YmIxLTgyODMtN2I4MWMzZDkzMzdhIiwic2NvcGUiOiJvcGVuaWQgYXBpOmFwaXBvaW50cyBhcGk6c2hpcHgiLCJzaWQiOiIzNmQ2OWM5NC1mM2I5LTRiYjEtODI4My03YjgxYzNkOTMzN2EiLCJhbGxvd2VkX3JlZmVycmVycyI6IiIsInV1aWQiOiIxYzk1MGYyMS00ZDY5LTRmZGYtYmExYi1lNmI4MmQ5YmMzMDciLCJlbWFpbCI6ImtvbnRha3RAY29mZmVlc3VtbWl0LnBsIn0.f8YrzvlREQZrtaSmHdnPU-D8iNMouo5ovRypCodA8ZUFCkAmL28Viv7admOdP2_NTbqCvdpaKo1R6W3dLHiMV200Rcc8rF99V0nLkIt2qoAdUkP3yN4ZXyD7GFSNs7n5ygGLA17hNR_wTTZ8AamwZveyR4g9SBUNSJ4OIrNJy_v53IE8Yh-Mh4DqwaHlTCzZG03IsG4kk46zHCKvAnoqciBuCd0WX9a0PQ1VSJ07h8cli4CPeJyxn81vcfK0WgYhcZinUydTdofDXVE2SKzpfbCXQwASVTU36FjsSob_NqFj-D0__JTY92eOS3N791Ya9U3MU7mft7EUPfRrv34eRA',
        ])->get('https://api-shipx-pl.easypack24.net/v1/shipments/' . $order->shipment_id);

        OrderLog::create([
            'name' => $user->name,
            'description' => 'Status przesyłki to ' . $res['status'],
            'type' => EnumsOrderLog::ADMIN,
            'order_id' => $order->id,
        ]);
        OrderLog::create([
            'name' => $user->name,
            'description' => 'Nnumer przesyłki - ' . $res['tracking_number'],
            'type' => EnumsOrderLog::ADMIN,
            'order_id' => $order->id,
        ]);
        return redirect()->route('dashboard.order.show', $order->id)->with('success', 'Status przesyłki to ' . $res['status']);
    }
    public function getLabelByShipmentId(Int $id)
    {
        $user = Auth::user();
        $order = Order::where('shipment_id', $id)->first();
        return $this->gLabel($order, $user);
    }
    public function getLabel(Order $order)
    {
        $user = Auth::user();
        return $this->gLabel($order, $user);
    }
    public function createShipmentCarrierToCarrier(Order $order, String $size)
    {
        $user = Auth::user();
        OrderLog::create([
            'name' => $user->name,
            'description' => 'Tymczasowo zablokowane.',
            'type' => EnumsOrderLog::ADMIN,
            'order_id' => $order->id,
        ]);
        return redirect()->route('dashboard.order.show', $order->id)->with('fail', 'Tymczasowo zablokowane.');
        //
        if ($order->name_recive != null) {
            $name = $order->name_recive;
        } else {
            $name = $order->name;
        }
        if ($order->email_recive != null) {
            $email = $order->email_recive;
        } else {
            $email = $order->email;
        }
        if ($order->phone_recive != null) {
            $phone = $order->phone_recive;
        } else {
            $phone = $order->phone;
        }
        $name_splited = $this->splitName($name);
        $adres_splited = $this->splitName($order->adres);
        //
        if ($order->point != null) {
            OrderLog::create([
                'name' => $user->name,
                'description' => 'Nie utworzono przesyłki - Jest numer paczkomatu.',
                'type' => EnumsOrderLog::ADMIN,
                'order_id' => $order->id,
            ]);
            return redirect()->route('dashboard.order.show', $order->id)->with('fail', 'Przesyłka nie została utworzona - Jest numer paczkomatu.');
        } else {

            $shipment =  $this->createShipment(
                $name_splited['first_name'],
                $name_splited['last_name'],
                $email,
                $phone,
                'null',
                $order->company,
                $size,
                "inpost_courier_standard",
                'test',
                $adres_splited['first_name'],
                $adres_splited['last_name'],
                $order->city,
                $order->post,
                $parcels = null,
                $insurance = null,
                $cod = null,
            );
            if ($shipment['status'] == 400) {
                OrderLog::create([
                    'name' => $user->name,
                    'description' => $shipment,
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $order->id,
                ]);
                return redirect()->route('dashboard.order.show', $order->id)->with('fail', 'Brak numeru trucker.');
            } else {
                OrderLog::create([
                    'name' => $user->name,
                    'description' => 'Utworzono przesyłkę w InPost',
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $order->id,
                ]);
                OrderLog::create([
                    'name' => $user->name,
                    'description' => 'Nnumer id przesyłki - ' . $shipment['id'],
                    'type' => EnumsOrderLog::ADMIN,
                    'order_id' => $order->id,
                ]);
                //Order::where('id', '=', $order->id)->update(['shipment_id' => $shipment['id']]);
                return redirect()->route('dashboard.order.show', $order->id)->with('success', 'Przesyłkę utworzono.');
            }
        }
    }
}
