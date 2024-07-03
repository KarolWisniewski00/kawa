<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InpostAdminController extends Controller
{
    public function index()
    {
        // Tworzymy zapytanie do API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJzQlpXVzFNZzVlQnpDYU1XU3JvTlBjRWFveFpXcW9Ua2FuZVB3X291LWxvIn0.eyJleHAiOjIwMzUyMTU3OTQsImlhdCI6MTcxOTg1NTc5NCwianRpIjoiZmZkY2VmOGUtYjZhZS00ZWU5LTgwMTYtNGU0OTYyZWNlYWVkIiwiaXNzIjoiaHR0cHM6Ly9sb2dpbi5pbnBvc3QucGwvYXV0aC9yZWFsbXMvZXh0ZXJuYWwiLCJzdWIiOiJmOjEyNDc1MDUxLTFjMDMtNGU1OS1iYTBjLTJiNDU2OTVlZjUzNToyNzl1VzdDNW1FdnFfTHZLRVpudGJTXzJ5alVaZmMyWUtRUzlyNUdCVS1FIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoic2hpcHgiLCJzZXNzaW9uX3N0YXRlIjoiMzZkNjljOTQtZjNiOS00YmIxLTgyODMtN2I4MWMzZDkzMzdhIiwic2NvcGUiOiJvcGVuaWQgYXBpOmFwaXBvaW50cyBhcGk6c2hpcHgiLCJzaWQiOiIzNmQ2OWM5NC1mM2I5LTRiYjEtODI4My03YjgxYzNkOTMzN2EiLCJhbGxvd2VkX3JlZmVycmVycyI6IiIsInV1aWQiOiIxYzk1MGYyMS00ZDY5LTRmZGYtYmExYi1lNmI4MmQ5YmMzMDciLCJlbWFpbCI6ImtvbnRha3RAY29mZmVlc3VtbWl0LnBsIn0.f8YrzvlREQZrtaSmHdnPU-D8iNMouo5ovRypCodA8ZUFCkAmL28Viv7admOdP2_NTbqCvdpaKo1R6W3dLHiMV200Rcc8rF99V0nLkIt2qoAdUkP3yN4ZXyD7GFSNs7n5ygGLA17hNR_wTTZ8AamwZveyR4g9SBUNSJ4OIrNJy_v53IE8Yh-Mh4DqwaHlTCzZG03IsG4kk46zHCKvAnoqciBuCd0WX9a0PQ1VSJ07h8cli4CPeJyxn81vcfK0WgYhcZinUydTdofDXVE2SKzpfbCXQwASVTU36FjsSob_NqFj-D0__JTY92eOS3N791Ya9U3MU7mft7EUPfRrv34eRA',
        ])->get('https://api-shipx-pl.easypack24.net/v1/organizations');

        // Sprawdzamy czy zapytanie się powiodło
        if ($response->successful()) {
            $data = $response->json(); // Parsujemy odpowiedź JSON
            $response2 = Http::withHeaders([
                'Authorization' => 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJzQlpXVzFNZzVlQnpDYU1XU3JvTlBjRWFveFpXcW9Ua2FuZVB3X291LWxvIn0.eyJleHAiOjIwMzUyMTU3OTQsImlhdCI6MTcxOTg1NTc5NCwianRpIjoiZmZkY2VmOGUtYjZhZS00ZWU5LTgwMTYtNGU0OTYyZWNlYWVkIiwiaXNzIjoiaHR0cHM6Ly9sb2dpbi5pbnBvc3QucGwvYXV0aC9yZWFsbXMvZXh0ZXJuYWwiLCJzdWIiOiJmOjEyNDc1MDUxLTFjMDMtNGU1OS1iYTBjLTJiNDU2OTVlZjUzNToyNzl1VzdDNW1FdnFfTHZLRVpudGJTXzJ5alVaZmMyWUtRUzlyNUdCVS1FIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoic2hpcHgiLCJzZXNzaW9uX3N0YXRlIjoiMzZkNjljOTQtZjNiOS00YmIxLTgyODMtN2I4MWMzZDkzMzdhIiwic2NvcGUiOiJvcGVuaWQgYXBpOmFwaXBvaW50cyBhcGk6c2hpcHgiLCJzaWQiOiIzNmQ2OWM5NC1mM2I5LTRiYjEtODI4My03YjgxYzNkOTMzN2EiLCJhbGxvd2VkX3JlZmVycmVycyI6IiIsInV1aWQiOiIxYzk1MGYyMS00ZDY5LTRmZGYtYmExYi1lNmI4MmQ5YmMzMDciLCJlbWFpbCI6ImtvbnRha3RAY29mZmVlc3VtbWl0LnBsIn0.f8YrzvlREQZrtaSmHdnPU-D8iNMouo5ovRypCodA8ZUFCkAmL28Viv7admOdP2_NTbqCvdpaKo1R6W3dLHiMV200Rcc8rF99V0nLkIt2qoAdUkP3yN4ZXyD7GFSNs7n5ygGLA17hNR_wTTZ8AamwZveyR4g9SBUNSJ4OIrNJy_v53IE8Yh-Mh4DqwaHlTCzZG03IsG4kk46zHCKvAnoqciBuCd0WX9a0PQ1VSJ07h8cli4CPeJyxn81vcfK0WgYhcZinUydTdofDXVE2SKzpfbCXQwASVTU36FjsSob_NqFj-D0__JTY92eOS3N791Ya9U3MU7mft7EUPfRrv34eRA',
            ])->get('https://api-shipx-pl.easypack24.net/v1/organizations/92302/shipments');

            if ($response2->successful()) {
                $data2 = $response2->json(); // Parsujemy odpowiedź JSON
                return view('admin.inpost.show', ['data' => $data, 'data2' => $data2]); // Przekazujemy dane do widoku
            } else {
                // W przypadku błędu zwracamy odpowiednią informację
                return view('admin.inpost.show', ['data' => $data, 'data2' => 'error']); // Przekazujemy dane do widoku
            }
        } else {
            // W przypadku błędu zwracamy odpowiednią informację
            return view('admin.inpost.show', ['data' => 'error', 'data2' => 'error']);
        }
    }
}
