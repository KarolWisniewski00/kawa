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
                    <h1>Twoje zamówienia</h1>
                </div>
                @include('client.coffee.module.alert')
                <div class="my-4">
                    <h3 class="my-4">Dziękujemy, otrzymaliśmy Twoje zamówienie</h3>
                    <p class="text-muted fw-bold">Status: {{$order->status}}</p>
                    <p class="text-muted fw-bold">Numer zmaówienia: {{$order->number}}</p>
                    <p class="text-muted">Data: {{$order->created_at}}</p>
                    <p class="text-muted">Łącznie: {{$order->total}} PLN</p>
                    @if ($order->payment)
                    <dd class="text-lg font-semibold">Metoda płatności: Płatność online</dd>
                    @else
                    <dd class="text-lg font-semibold">Metoda płatności: Przelew bankowy</dd>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 my-4">
                <h3 class="my-4">Dane klienta</h3>
                <p class="text-muted">Imię i nazwisko: {{$order->name}}</p>
                <p class="text-muted">Email: {{$order->email}}</p>
                <p class="text-muted">Numer telefonu: {{$order->phone}}</p>
                @if ($order->company != null)
                <p class="text-muted">Nazwa firmy: {{$order->company}}</p>
                @endif
                @if ($order->nip != null)
                <p class="text-muted">NIP: {{$order->nip}}</p>
                @endif
                <p class="text-muted">Ulica: {{$order->adres}}</p>
                @if ($order->street_extra != null)
                <p class="text-muted">Ciąg dalsy adresu: {{$order->adres_extra}}</p>
                @endif
                <p class="text-muted">Miasto: {{$order->city}}</p>
                @if($order->extra != null)
                <p class="text-muted">Uwagi dotyczące zamówienia: {{$order->extra}}</p>
                @endif
            </div>
            @if ($order->payment)
            @else
            <div class="col-12 col-md-6 my-4">
                <h3 class="my-4">Nasze dane firmowe</h3>
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
                                    <div class="fw-bold">Atrybut 1</div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">Atrybut 2</div>
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
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{$o->attributes_name}}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{$o->attributes_grind}}</div>
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
                                @if($order->total >= $company['free_ship'])
                                <div class="fw-bold">Wysyłka PDP darmowa</div>
                                @else
                                <div class="fw-bold">Wysyłka PDP + {{ $company['price_ship'] }} PLN</div>
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
            </div>
        </div>
    </div>
</section>
<!--END RESUME-->
@endsection