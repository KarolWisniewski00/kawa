<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inpost') }}
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
                            Inpost
                        </h1>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-2 py-1">
                                        Numer Przesyłki
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Osoba odbierająca
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Rozmiar przesyłki
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Typ przesyłki
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Pobierz etykietę A6P
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Podgląd zamówienia
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shipments['items'] as $key => $shipment)
                                <tr class="
                                        @if($shipment['custom_attributes']['sending_method'] == 'any_point')
                                        bg-lime-100
                                        @else
                                        bg-gray-100
                                        @endif
                                        text-sm">
                                    <td class="px-2 py-1">
                                        {{$shipment['tracking_number']}}
                                    </td>
                                    <td class="px-2 py-1">
                                        <div>{{$shipment['receiver']['first_name']}}</div>
                                        <div>{{$shipment['receiver']['last_name']}}</div>
                                        <div><a href="tel:{{$shipment['receiver']['phone']}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$shipment['receiver']['phone']}}</a></div>
                                        <div><a href="mailto:{{$shipment['receiver']['email']}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$shipment['receiver']['email']}}</a></div>
                                    </td>
                                    <td class="px-2 py-1">
                                        {{$shipment['parcels'][0]['template']}}
                                    </td>
                                    <td class="px-2 py-1">
                                        @if($shipment['custom_attributes']['sending_method'] == 'any_point')
                                        Paczkomat -> Paczkomat
                                        @else
                                        {{$shipment['custom_attributes']['sending_method']}}
                                        @endif
                                    </td>
                                    <td class="px-2 py-1">
                                        @if($shipment['custom_attributes']['sending_method'] == 'any_point')
                                        <a href="{{route('inpost.getLabelByShipmentId', $shipment['id'])}}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                        @endif
                                    </td>
                                    <td class="px-2 py-1">
                                        @if($shipment['custom_attributes']['sending_method'] == 'any_point')
                                        <a href="{{route('dashboard.order.showByShipmentId', $shipment['id'])}}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200"><i class="fa-solid fa-eye"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>