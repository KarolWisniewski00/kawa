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
                            Zamówienie
                        </h1>
                        <a href="{{route('dashboard')}}" type="button" class="mt-8 mb-4 text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a>
                    </div>
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Status</dt>
                            <dd class="text-lg font-semibold">{{$order->status}}</dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Numer Zamówienia</dt>
                            <dd class="text-lg font-semibold">{{$order->number}}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Data</dt>
                            <dd class="text-lg font-semibold">{{$order->created_at}}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Łącznie</dt>
                            <dd class="text-lg font-semibold">{{$order->total}} PLN</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Metoda płatności</dt>
                            <dd class="text-lg font-semibold">Przelew bankowy</dd>
                        </div>
                    </dl>
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                            Dane klienta
                        </h1>
                    </div>
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Imię i nazwisko</dt>
                            <dd class="text-lg font-semibold">{{$order->name}}</dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email</dt>
                            <dd class="text-lg font-semibold">{{$order->email}}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Numer telefonu</dt>
                            <dd class="text-lg font-semibold">{{$order->phone}}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nazwa firmy</dt>
                            <dd class="text-lg font-semibold">{{$order->company}}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">NIP</dt>
                            <dd class="text-lg font-semibold">{{$order->nip}}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Adres</dt>
                            <dd class="text-lg font-semibold">{{$order->adres}}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Ciąg dalsy adresu</dt>
                            <dd class="text-lg font-semibold">{{$order->adres_extra}}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Miasto</dt>
                            <dd class="text-lg font-semibold">{{$order->city}}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Uwagi dotyczące zamówienia</dt>
                            <dd class="text-lg font-semibold">{{$order->extra}}</dd>
                        </div>
                    </dl>
                    <div class="flex flex row">
                        <a href="{{route('dashboard.order.status', ['id'=>$order->id, 'slug'=>'0'])}}" type="button" class="mt-8 mb-4 text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-amber-600 dark:hover:bg-amber-700 focus:outline-none dark:focus:ring-amber-800"><i class="fa-solid fa-clock mr-2"></i>Oczekujące na płatność</a>
                        <a href="{{route('dashboard.order.status', ['id'=>$order->id, 'slug'=>'1'])}}" type="button" class="mt-8 mb-4 text-white bg-lime-500 hover:bg-lime-600 focus:ring-4 focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-lime-600 dark:hover:bg-lime-700 focus:outline-none dark:focus:ring-lime-800"><i class="fa-solid fa-business-time mr-2"></i>W trakcie realizacji</a>
                        <a href="{{route('dashboard.order.status', ['id'=>$order->id, 'slug'=>'2'])}}" type="button" class="mt-8 mb-4 text-white bg-emerald-500 hover:bg-emerald-600 focus:ring-4 focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-emerald-600 dark:hover:bg-emerald-700 focus:outline-none dark:focus:ring-emerald-800"><i class="fa-solid fa-check mr-2"></i>Zrealizowane</a>
                        <a href="{{route('dashboard.order.status', ['id'=>$order->id, 'slug'=>'3'])}}" type="button" class="mt-8 mb-4 text-white bg-rose-500 hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-rose-600 dark:hover:bg-rose-700 focus:outline-none dark:focus:ring-rose-800"><i class="fa-solid fa-x mr-2"></i>Anulowano</a>
                    </div>
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                            Zamówienie
                        </h1>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Zdjęcie
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nazwa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cena
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ilość
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Łącznie
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $o)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach($photos as $photo)
                                        @if($photo->product_id == $o->product_id)
                                        @if($photo->order == 1)
                                        <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" height="48px" width="48px" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                                        @endif
                                        @endif
                                        @endforeach
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$o->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$o->price}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$o->quantity}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$o->quantity*$o->price}} PLN
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