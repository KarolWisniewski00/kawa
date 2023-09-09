<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zamówienia') }}
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
                            Wszystkie produkty
                        </h1>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Numer zamówienia
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Imię i Nazwisko
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Firma i NIP
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Adres
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Miasto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kwota
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Podgląd
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                <tr>
                                    <td class="px-6 py-4">
                                    {{$order->number}}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$order->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$order->company}}
                                    {{$order->nip}}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$order->adres}}
                                    {{$order->adres_extra}}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$order->city}}
                                    {{$order->post}}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$order->status}}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$order->total}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('dashboard.order.show', $order)}}" type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-4 py-2">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>