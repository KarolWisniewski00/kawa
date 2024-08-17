<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-8">
            {{ __('Klienci') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    @include('admin.module.alerts')
                    <x-application-logo class="block h-12 w-auto" />
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                            Wszyscy klienci
                        </h1>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Imię i nazwisko
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        telefon
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Liczba zamówień
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kwota wszystkich zamówień
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ostatnie zamówienie
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">
                                        {{$order->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->email}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->phone}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->total_orders}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->total_amount}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$order->last_order_date}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-4 py-2">
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>