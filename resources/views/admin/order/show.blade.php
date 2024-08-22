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
                            Podgląd zamówienia
                        </h1>
                        <a href="{{route('dashboard')}}" type="button" class="mt-8 mb-4 text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a>
                    </div>
                    <div class="grid grid-cols-1">
                        <div class=" my-5 p-5 rounded-xl shadow
                            @if($order->shipment_id != null && $order->status == "W trakcie realizacji")
                            bg-lime-200
                            @elseif($order->status == "Zrealizowane")
                            bg-lime-200
                            @elseif($order->status == "W trakcie realizacji")
                            bg-lime-100
                            @elseif($order->status == "Weryfikacja płatności")
                            bg-amber-100
                            @elseif($order->status == "Oczekujące na płatność")
                            bg-amber-100
                            @elseif($order->status == "Anulowano")
                            bg-rose-100
                            @endif
                            ">
                            <div class="flex flex-row justify-between">
                                <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                    Zamówienie
                                </h1>
                            </div>
                            <dl class="max-w-md text-gray-900 divide-y divide-gray-400 w-full">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">Status</dt>
                                    <dd class="text-lg font-semibold">{{$order->status}}</dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">Numer Zamówienia</dt>
                                    <dd class="text-lg font-semibold">{{$order->number}}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">Data</dt>
                                    <dd class="text-lg font-semibold">{{$order->created_at}}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">Łącznie</dt>
                                    <dd class="text-lg font-semibold">{{$order->total}} PLN</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg">Metoda płatności</dt>
                                    @if ($order->payment)
                                    <dd class="text-lg font-semibold">Płatność online</dd>
                                    @else
                                    <dd class="text-lg font-semibold">Przelew bankowy</dd>
                                    @endif
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <div class="bg-blue-50 my-5 p-5 rounded-xl shadow">
                                <div class="flex flex-row justify-between">
                                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                        Dane osoby odbierającej
                                    </h1>
                                </div>
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-400">
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Imię i nazwisko</dt>
                                        <dd class="text-lg font-semibold">{{$order->name_recive}}</dd>
                                    </div>
                                    <div class="flex flex-col py-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Email</dt>
                                        <dd class="text-lg font-semibold">{{$order->email_recive}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Numer telefonu</dt>
                                        <dd class="text-lg font-semibold">{{$order->phone_recive}}</dd>
                                    </div>
                                </dl>
                            </div>
                            <div class="bg-violet-50 my-5 p-5 rounded-xl shadow">
                                <div class="flex flex-row justify-between">
                                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                        Adres dostawy
                                    </h1>
                                </div>
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-400">
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Adres</dt>
                                        <dd class="text-lg font-semibold">{{$order->adres}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Ciąg dalszy adresu</dt>
                                        <dd class="text-lg font-semibold">{{$order->adres_extra}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Miasto</dt>
                                        <dd class="text-lg font-semibold">{{$order->city}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Kod pocztowy</dt>
                                        <dd class="text-lg font-semibold">{{$order->post}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Uwagi dotyczące zamówienia</dt>
                                        <dd class="text-lg font-semibold">{{$order->extra}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Typ adresu</dt>
                                        @if($order->adres_type == 'carrier')
                                        <dd class="text-lg font-semibold">Kurier</dd>
                                        @elseif($order->adres_type == 'adres_person')
                                        <dd class="text-lg font-semibold">Dostawa osobista</dd>
                                        @else
                                        <dd class="text-lg font-semibold">Paczkomat</dd>
                                        @endif
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Numer paczkomatu</dt>
                                        <dd class="text-lg font-semibold">{{$order->point}}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <div>
                            <div class="bg-amber-50 my-5 p-5 rounded-xl shadow">
                                <div class="flex flex-row justify-between">
                                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                        Dane klienta osoby zamawiającej
                                    </h1>
                                </div>
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-400">
                                    <div class="flex flex-col pb-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Imię i nazwisko</dt>
                                        <dd class="text-lg font-semibold">{{$order->name}}</dd>
                                    </div>
                                    <div class="flex flex-col py-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Email</dt>
                                        <dd class="text-lg font-semibold">{{$order->email}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Numer telefonu</dt>
                                        <dd class="text-lg font-semibold">{{$order->phone}}</dd>
                                    </div>
                                </dl>
                            </div>
                            <div class="bg-rose-50 my-5 p-5 rounded-xl shadow">
                                <div class="flex flex-row justify-between">
                                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                        Dane firmy
                                    </h1>
                                </div>
                                <dl class="max-w-md text-gray-900 divide-y divide-gray-400">
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Nazwa firmy</dt>
                                        <dd class="text-lg font-semibold">{{$order->company}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">NIP</dt>
                                        <dd class="text-lg font-semibold">{{$order->nip}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Adres</dt>
                                        <dd class="text-lg font-semibold">{{$order->adres_invoice}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Ciąg dalszy adresu</dt>
                                        <dd class="text-lg font-semibold">{{$order->adres_extra_invoice}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Miasto</dt>
                                        <dd class="text-lg font-semibold">{{$order->city_invoice}}</dd>
                                    </div>
                                    <div class="flex flex-col pt-3">
                                        <dt class="mb-1 text-gray-500 md:text-lg">Kod pocztowy</dt>
                                        <dd class="text-lg font-semibold">{{$order->post_invoice}}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                            Zamówienie
                        </h1>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 table-fixed">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Zdjęcie
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nazwa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rozmiar opakowania
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rodzaj mielenia
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
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        @foreach($photos as $p)
                                        @php
                                        $liczbaString = (string)$o->product_id;
                                        $drugaLiczbaString = (string)$p->product_id;

                                        if (substr($liczbaString, 0, strlen($drugaLiczbaString)) == $drugaLiczbaString) {
                                        $img = $p->image_path;
                                        } else {
                                        $img = 'error';
                                        }
                                        @endphp
                                        @if($img != 'error')
                                        <img src="{{ asset('photo/' . $img) }}" alt="" class="img-fluid" height="48px" width="48px" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                                        @endif
                                        @endforeach
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$o->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$o->attributes_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$o->attributes_grind}}
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
                    <div class="my-5 py-5">
                        <div class="flex flex-row justify-between">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                Zmiana statusu
                            </h1>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <a href="{{route('dashboard.order.status', ['id'=>$order->id, 'slug'=>'0'])}}" class="text-xl mt-8 mb-4 text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-clock mr-2"></i>Oczekujące na płatność</a>
                            <a href="{{route('dashboard.order.status', ['id'=>$order->id, 'slug'=>'1'])}}" class="text-xl mt-8 mb-4 text-white bg-lime-500 hover:bg-lime-600 focus:ring-4 focus:ring-lime-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-business-time mr-2"></i>W trakcie realizacji</a>
                            <a href="{{route('dashboard.order.status', ['id'=>$order->id, 'slug'=>'2'])}}" class="text-xl mt-8 mb-4 text-white bg-emerald-500 hover:bg-emerald-600 focus:ring-4 focus:ring-emerald-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-check mr-2"></i>Zrealizowane</a>
                            <a href="{{route('dashboard.order.status', ['id'=>$order->id, 'slug'=>'3'])}}" class="text-xl mt-8 mb-4 text-white bg-rose-500 hover:bg-rose-600 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-x mr-2"></i>Anulowano</a>
                        </div>
                        @if($order->status != "Anulowano")
                        @if($order->status != "Oczekujące na płatność")
                        @if($order->status != "Weryfikacja płatności")
                        <div class="flex flex-row justify-between">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                Funkcje fakturownia
                            </h1>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <a href="{{route('dashboard.order.email', $order)}}" class="col-span-2 text-xl mt-8 mb-4 text-white bg-violet-500 hover:bg-violet-600 focus:ring-4 focus:ring-violet-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-file mr-2"></i>Utwórz fakturę + wyślij mailem</a>
                        </div>
                        <div class="flex flex-row justify-between">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                                Funkcje InPost
                            </h1>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            @if($order->shipment_id == null)
                            @if($order->point != null)
                            <a href="{{route('inpost.createShipmentPointToPoint',[$order,'small'])}}" class="text-xl mt-8 mb-4 text-yellow-500 bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-box-open mr-2"></i>Utwórz przesyłkę Paczkomat -> Paczkomat A</a>
                            <a href="{{route('inpost.createShipmentPointToPoint',[$order,'medium'])}}" class="text-xl mt-8 mb-4 text-yellow-500 bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-box-open mr-2"></i>Utwórz przesyłkę Paczkomat -> Paczkomat B</a>
                            <a href="{{route('inpost.createShipmentPointToPoint',[$order,'large'])}}" class="text-xl mt-8 mb-4 text-yellow-500 bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-box-open mr-2"></i>Utwórz przesyłkę Paczkomat -> Paczkomat C</a>
                            @else
                            <form class="col-span-2 w-full grid grid-cols-1 md:grid-cols-2 gap-5" action="{{route('inpost.createShipmentCarrierToCarrier')}}" method="post">
                                @csrf
                                <div class="mb-6 col-span-2">
                                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900">Firma odbiorcy</label>
                                    <input value="{{$order->company}}" name="company" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    @error('company')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Imię odbiorcy</label>
                                    <input value="{{$name_splited['first_name']}}" name="first_name" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    @error('first_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nazwisko odbiorcy</label>
                                    <input value="{{$name_splited['last_name']}}" name="last_name" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    @error('last_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6 col-span-2">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">e-mail odbiorcy</label>
                                    <input value="{{$email}}" name="email" type="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6 col-span-2">
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Numer telefonu odbiorcy</label>
                                    <input value="{{$phone}}" name="phone" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="street" class="block mb-2 text-sm font-medium text-gray-900">Ulica odbiorcy</label>
                                    <input value="{{$adres_splited['first_name']}}" name="street" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    @error('street')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="building_number" class="block mb-2 text-sm font-medium text-gray-900">Numer budynku odbiorcy</label>
                                    <input value="{{$adres_splited['last_name']}}" name="building_number" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    @error('building_number')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900">Miasto odbiorcy</label>
                                    <input value="{{$order->city}}" name="city" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    @error('city')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="post" class="block mb-2 text-sm font-medium text-gray-900">Kod pocztowy odbiorcy</label>
                                    <input value="{{$order->post}}" name="post" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    @error('post')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--Parcels-->
                                <div class="col-span-2">
                                    <div class="bg-gray-800 my-5 p-5 text-yellow-500 rounded-xl shadow grid grid-cols-1 md:grid-cols-4 gap-5">
                                        <span class="mb-6 col-span-2 text-3xl"><i class="fa-solid fa-box-open"></i></span>
                                        <div class="mb-6 col-span-2">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" name="nonstandard" class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-900 rounded-full peer peer-focus:ring-4 peer-focus:ring-yellow-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-700 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-600"></div>
                                                <span class="ml-3 text-sm font-medium">Paczka niestandardowa</span>
                                            </label>
                                            @error('nonstandard')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-6">
                                            <label for="weight" class="block mb-2 text-sm font-medium">Waga [kg]</label>
                                            <input value="" name="weight" type="text" class="border-yellow-500 shadow-sm bg-gray-900 border border-gray-300 text-yellow-500 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" required>
                                            @error('weight')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-6">
                                            <label for="length" class="block mb-2 text-sm font-medium">Długość [mm]</label>
                                            <input value="" name="length" type="text" class="border-yellow-500 shadow-sm bg-gray-900 border border-gray-300 text-yellow-500 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" required>
                                            @error('length')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-6">
                                            <label for="width" class="block mb-2 text-sm font-medium">Szerokość [mm]</label>
                                            <input value="" name="width" type="text" class="border-yellow-500 shadow-sm bg-gray-900 border border-gray-300 text-yellow-500 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" required>
                                            @error('width')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-6">
                                            <label for="height" class="block mb-2 text-sm font-medium">Wysokość [mm]</label>
                                            <input value="" name="height" type="text" class="border-yellow-500 shadow-sm bg-gray-900 border border-gray-300 text-yellow-500 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" required>
                                            @error('height')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--END Parcels-->
                                <div class="mb-6 col-span-2">
                                    <ul class="grid w-full gap-6 md:grid-cols-2">
                                        <li>
                                            <label for="size-1" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Dodatkowa ochrona</div>
                                                    <div class="mb-6">
                                                        <label for="insurance" class="block mb-2 text-sm font-medium text-gray-900 ">Wartość [zł]</label>
                                                        <input value="5000" name="insurance" type="number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                        @error('insurance')
                                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="size-1" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Kwota pobrania</div>
                                                    <div class="mb-6">
                                                        <label for="cod" class="block mb-2 text-sm font-medium text-gray-900 ">Wartość [zł]</label>
                                                        <input value="" name="cod" type="number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                        @error('cod')
                                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </ul>
                                    @error('size')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="service_sms" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        <span class="ml-3 text-sm font-medium text-gray-900">Serwis SMS</span>
                                    </label>
                                    @error('weight')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="service_email" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                        <span class="ml-3 text-sm font-medium text-gray-900">Serwis email</span>
                                    </label>
                                    @error('weight')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <button type="submit" class="col-span-2 text-xl mt-8 mb-4 text-yellow-500 bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-box-open mr-2"></i>Utwórz przesyłkę Kurier -> Kurier</button>
                            </form>
                        </div>
                        @endif
                        @else
                        <a href="{{route('inpost.checkStatusShipmentById',$order)}}" class="text-xl mt-8 mb-4 text-yellow-500 bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-check mr-2"></i>Sprawdź status przesyłki</a>
                        <a href="{{route('inpost.getLabel',$order)}}" class="text-xl mt-8 mb-4 text-yellow-500 bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg  px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-download mr-2"></i>Pobierz etykietę A6P</a>
                        @if($order->point != null)
                       
                        @else

                        @endif
                        @endif
                        @endif
                        @endif
                        @endif
                    </div>
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                            Historia operacji
                        </h1>
                    </div>
                    <div class="grid grid-cols-1 mt-8">

                        <ol class="relative border-s border-gray-200">
                            @if($order_logs)
                            @foreach($order_logs as $log)
                            <li class="mb-10 ms-4">
                                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400">{{$log->created_at}}</time>
                                <h3 class="text-lg font-semibold text-gray-900">{{$log->name}}</h3>
                                <p class="mb-4 text-base font-normal text-gray-500">{{$log->description}}</p>
                            </li>
                            @endforeach
                            @endif
                        </ol>


                    </div>
                </div>
            </div>
        </div>
</x-app-layout>