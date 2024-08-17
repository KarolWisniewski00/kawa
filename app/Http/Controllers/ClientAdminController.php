<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ClientAdminController extends Controller
{
    public function index()
    {
        // Pobranie wszystkich zamówień ze statusem 'success', zgrupowanych po adresie e-mail
        $orders = Order::select('email', 'name', 'phone')
            ->where('status', 'W trakcie realizacji') // Filtrowanie zamówień ze statusem 'success'
            ->selectRaw('COUNT(*) as total_orders')
            ->selectRaw('MAX(created_at) as last_order_date')
            ->selectRaw('SUM(total) as total_amount') // Sumowanie kwoty wszystkich zamówień
            ->groupBy('email', 'name', 'phone')
            ->orderBy('total_amount', 'desc') // Sortowanie według liczby zamówień, malejąco
            ->paginate(20);

        return view('admin.client.index', [
            'orders' => $orders,
        ]);
    }
}
