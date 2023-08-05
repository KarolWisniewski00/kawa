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
                    <div class="col-12 my-4" style="overflow:auto;">
                        <h3 class="my-4">Szczegóły zamówienia</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">#</div>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">Zdjęcie</div>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">Nazwa</div>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">Cena</div>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">Ilość</div>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">Łącznie</div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $o)
                                <tr>
                                    <th>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">{{$key+1}}</div>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            @foreach($photos as $photo)
                                            @if($photo->product_id == $o->product_id)
                                            @if($photo->order == 1)
                                            <div style="max-width:50px"><img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;"></div>
                                            @endif
                                            @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">{{$o->name}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center align-items-center">
                                            <div class="fw-bold"> {{$o->price}} PLN</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center align-items-center">
                                            <div class="fw-bold">{{$o->quantity}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">{{$o->quantity*$o->price}} PLN</div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <ul class="list-group ">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Wysyłka PDP + 16 PLN</div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Przelew bankowy</div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{$order->status}}</div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Łącznie</div>
                                        {{$order->total}} PLN
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>