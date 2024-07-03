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
                    <div class="grid grid-cols-1">
                        <div class="bg-stone-50 my-5 p-5 rounded-xl shadow">
                            <div class="flex flex-row justify-between">
                                <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                    Dane zaczerpnięte z InPost API
                                </h1>
                            </div>
                            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 w-full">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">Źródło</dt>
                                    <dd class="text-lg font-semibold">{{$data['items'][0]['href']}}</dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">ID</dt>
                                    <dd class="text-lg font-semibold">{{$data['items'][0]['id']}}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">OwnerID</dt>
                                    <dd class="text-lg font-semibold">{{$data['items'][0]['owner_id']}}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">NIP</dt>
                                    <dd class="text-lg font-semibold">{{$data['items'][0]['tax_id']}}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">Nazwa</dt>
                                    <dd class="text-lg font-semibold">{{$data['items'][0]['name']}}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">Data utworzenia</dt>
                                    <dd class="text-lg font-semibold">{{$data['items'][0]['created_at']}}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">Data aktualizacji</dt>
                                    <dd class="text-lg font-semibold">{{$data['items'][0]['updated_at']}}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <div class="bg-blue-50 my-5 p-5 rounded-xl shadow">
                                <div class="flex flex-row justify-between">
                                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                        Usługi
                                    </h1>
                                </div>
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-200">
                                    @foreach($data['items'][0]['services'] as $k => $s)
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">{{$k}}</dt>
                                        <dd class="text-lg font-semibold">{{$s}}</dd>
                                    </div>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                        <div>
                            <div class="bg-amber-50 my-5 p-5 rounded-xl shadow">
                                <div class="flex flex-row justify-between">
                                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                        Adres
                                    </h1>
                                </div>
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-200">
                                    @foreach($data['items'][0]['address'] as $k => $s)
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">{{$k}}</dt>
                                        <dd class="text-lg font-semibold">{{$s}}</dd>
                                    </div>
                                    @endforeach
                                </dl>
                            </div>
                            <div class="bg-rose-50 my-5 p-5 rounded-xl shadow">
                                <div class="flex flex-row justify-between">
                                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                        Adres FV
                                    </h1>
                                </div>
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-200">
                                    @foreach($data['items'][0]['invoice_address'] as $k => $s)
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">{{$k}}</dt>
                                        <dd class="text-lg font-semibold">{{$s}}</dd>
                                    </div>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-2 py-1">
                                        ID
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Status
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Referencja
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Usługa
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Utworzono
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        Aktualizacja
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data2['items'] as $k => $i)
                                <tr class="bg-gray-100">
                                    <td class="px-2 py-1">
                                        {{$i['id']}}
                                    </td>
                                    <td class="px-2 py-1">
                                        {{$i['status']}}
                                    </td>
                                    <td class="px-2 py-1">
                                        {{$i['reference']}}
                                    </td>
                                    <td class="px-2 py-1">
                                        {{$i['service']}}
                                    </td>
                                    <td class="px-2 py-1">
                                        {{$i['created_at']}}
                                    </td>
                                    <td class="px-2 py-1">
                                        {{$i['updated_at']}}
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