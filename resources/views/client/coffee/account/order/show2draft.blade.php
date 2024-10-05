@extends('layout.coffee')
@section('SEO')
<title>Podsumowanie zamówienia | Coffee Summit</title>
<meta property="og:title" content="Podsumowanie zamówienia | Coffee Summit" />
<meta name="twitter:title" content="Podsumowanie zamówienia | Coffee Summit" />
@endsection
@section('content')
<!--RESUME-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199493482_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">Zamówienia</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    @if($order->shipment_id != null && $order->status == "W trakcie realizacji")
                    <h1>Dziękujemy, zamówienie przyjęte</h1>
                    @elseif($order->status == "Zrealizowane")
                    <h1>Dziękujemy, zaostało zrealizowane</h1>
                    @elseif($order->status == "W trakcie realizacji")
                    <h1>Dziękujemy, zamówienie przyjęte</h1>
                    @elseif($order->status == "Weryfikacja płatności")
                    <h1>Weryfikacja płatności</h1>
                    @elseif($order->status == "Oczekujące na płatność")
                    <h1>Brak płatności</h1>
                    @elseif($order->status == "Anulowano")
                    <h1>Anulowano</h1>
                    @endif    
                </div>
                @include('client.coffee.module.alert')
                <div class="my-4 mx-2">
                    <p class="text-muted m-0 p-0 mb-1">Status</p>
                    @if($order->shipment_id != null && $order->status == "W trakcie realizacji")
                    <p class="text-success fw-bold m-0 p-0 mb-2">{{$order->status}}</p>
                    @elseif($order->status == "Zrealizowane")
                    <p class="text-success fw-bold m-0 p-0 mb-2">{{$order->status}}</p>
                    @elseif($order->status == "W trakcie realizacji")
                    <p class="text-success fw-bold m-0 p-0 mb-2">{{$order->status}}</p>
                    @elseif($order->status == "Weryfikacja płatności")
                    <p class="text-warning fw-bold m-0 p-0 mb-2">{{$order->status}}</p>
                    @elseif($order->status == "Oczekujące na płatność")
                    <p class="text-warning fw-bold m-0 p-0 mb-2">{{$order->status}}</p>
                    @elseif($order->status == "Anulowano")
                    <p class="text-danger fw-bold m-0 p-0 mb-2">{{$order->status}}</p>
                    @endif
                    <p class="text-muted m-0 p-0 mb-1">Numer zamówienia</p>
                    <p class="fw-bold m-0 p-0 mb-2">{{$order->number}}</p>

                    <p class="text-muted m-0 p-0 mb-1">Data</p>
                    <p class="fw-bold m-0 p-0 mb-2">{{$order->created_at}}</p>

                    <p class="text-muted m-0 p-0 mb-1">Łącznie</p>
                    <p class="fw-bold m-0 p-0 mb-2">{{$order->total}} PLN</p>
                    @if ($order->payment)
                    <p class="text-muted m-0 p-0 mb-1">Metoda płatności</p>
                    <p class="fw-bold m-0 p-0 mb-2">Płatność online</p>
                    @else
                    <p class="text-muted m-0 p-0 mb-1">Metoda płatności</p>
                    <p class="fw-bold m-0 p-0 mb-2">Przelew bankowy</p>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 my-4 mx-2">
                <h1 class="mb-4">Osoba zamawiająca</h1>
                <p class="text-muted m-0 p-0 mb-1">Imię i nazwisko</p>
                <p class="fw-bold m-0 p-0 mb-2">{{$order->name}}</p>

                <p class="text-muted m-0 p-0 mb-1">Email</p>
                <p class="fw-bold m-0 p-0 mb-2">{{$order->email}}</p>

                <p class="text-muted m-0 p-0 mb-1">Numer telefonu</p>
                <p class="fw-bold m-0 p-0 mb-2">{{$order->phone}}</p>

                @if ($order->company != null)
                <h1 class="mb-4">Dane do faktury</h1>
                <p class="text-muted m-0 p-0 mb-1">Nazwa firmy</p>
                <p class="fw-bold m-0 p-0 mb-2">{{$order->company}}</p>
                @if ($order->nip != null)
                <p class="text-muted m-0 p-0 mb-1">NIP</p>
                <p class="fw-bold m-0 p-0 mb-2">{{$order->nip}}</p>
                @endif
                @endif

                <h1 class="mb-4">Dane do wysyłki</h1>
                <p class="text-muted m-0 p-0 mb-1">Ulica</p>
                <p class="fw-bold m-0 p-0 mb-2">{{$order->adres}}</p>
                @if ($order->street_extra != null)
                <p class="text-muted m-0 p-0 mb-1">Ciąg dalsy adresu</p>
                <p class="fw-bold m-0 p-0 mb-2">{{$order->adres_extra}}</p>
                @endif
                <p class="text-muted m-0 p-0 mb-1">Miasto</p>
                <p class="fw-bold m-0 p-0 mb-2">{{$order->city}}</p>
                @if($order->extra != null)
                <p class="text-muted m-0 p-0 mb-1">Uwagi dotyczące zamówienia</p>
                <p class="fw-bold m-0 p-0 mb-2">{{$order->extra}}</p>
                @endif
            </div>
            @if ($order->payment)
            @else
            <div class="col-12 col-md-6 my-4">
                <h1 class="mb-4">Dane do przelewu</h1>
                <p class="text-muted">{{ $company['name_company'] }}</p>
                <p class="text-muted">NIP:{{ $company['nip'] }}</p>
                <h3 class="my-4">Nasze dane bankowe</h3>
                <h6>{{ $company['name_bank'] }}</h6>
                <div class="d-flex justify-content-between align-items-center text-center my-2">
                    <div class="text-muted fw-bold">Numer konta: <span id="numer-konta">{{ $company['number_account_bank'] }}</span></div>
                    <button class="btn btn-primary" type="button" onclick="skopiujNumerKonta()"><i class="fa-solid fa-copy me-2"></i>Kopiuj</button>
                </div>
                <p class="text-muted fw-bold">IBAN: {{ $company['number_iban'] }}</p>
                <p class="text-muted fw-bold">BIC: {{ $company['number_bic'] }}</p>
                <p class="text-danger fw-bold">Dowód zakupu będzie wysłany wraz z paczką.</p>
            </div>
            @endif
            <div class="col-12 my-4" style="overflow:auto;">
                <h3 class="my-4">Szczegóły zamówienia</h3>
                <div class="list-group mb-5 d-block d-md-none">
                    @php
                    $k = 1;
                    @endphp
                    @foreach ($orders as $key => $item)
                    <div class="list-group-item list-group-item-action flex-column align-items-start p-3 gap-3">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                        </div>
                        <div class="d-flex w-100 justify-content-between pt-3">
                            <div class="d-fled flex-col">
                                <h4>{{ $item->name }}</h4>
                                <small class="text-muted fw-bold"></small>
                            </div>
                            <div class="d-fled flex-col text-end">
                                <small class="text-muted">{{ $item->quantity }} x</small>
                                <h4 class="mt-2 mb-0 fw-bold">{{ $item->quantity*$item->price }} PLN</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <table class="table d-none d-md-block">
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
                                    @if($photo->product->name == $o->name)
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
                                    <div>{{$o->attributes_name}}</div>
                                    <div>{{$o->attributes_grind}}</div>
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
                                @php
                                $tot = $order->total - $company['price_ship'];
                                @endphp
                                @if($tot >= $company['free_ship'])
                                <div class="fw-bold">Wysyłka InPost darmowa</div>
                                @else
                                <div class="fw-bold">Wysyłka InPost + {{ $company['price_ship'] }} PLN</div>
                                @endif
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
                <div class="mt-2">
                    <a href="{{route('account.order.status', ['id'=>$order->id, 'slug'=>'0'])}}" class="btn btn-danger">Anuluj</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END RESUME-->
@endsection