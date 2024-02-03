@extends('layout.coffee')
@section('SEO')
<title>Kasa | Coffee Summit</title>
<meta property="og:title" content="Kasa | Coffee Summit" />
<meta name="twitter:title" content="Kasa | Coffee Summit" />
@endsection
@section('content')
<!--ORDER-->
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
                    <h1>Kasa</h1>
                </div>
                @include('client.coffee.module.alert')
            </div>
            <div class="col-12 col-md-6 order-1 order-md-1">
                <form class="form text-center my-4" action="{{route('account.order.store')}}" method="POST">
                    <!--TOKEN-->
                    @csrf
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="name" value="{{ old('name') ? old('name') : ''}}" name="name" required>
                        <label for="name">Imię i nazwisko</label>
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="email" value="{{ old('email') ? old('email') : ''}}" name="email" required>
                        <label for="email">Email</label>
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="company" value="{{ old('company') ? old('company') : ''}}" name="company">
                        <label for="company">Nazwa firmy (opcjonalne)</label>
                        <span class="text-danger">@error('company') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="nip" value="{{ old('nip') ? old('nip') : ''}}" name="nip">
                        <label for="nip">NIP (opcjonalnie)</label>
                        <span class="text-danger">@error('company') {{$message}} @enderror</span>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center text-center my-3 px-3 border border-2">
                        <div class="form-floating my-3 w-100">
                            <input type="text" class="form-control" id="post" value="{{ old('post') ? old('post') : ''}}" name="post" required>
                            <label for="post">Kod pocztowy</label>
                            <span class="text-danger">@error('post') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3 w-100">
                            <input type="text" class="form-control" id="street" value="{{ old('street') ? old('street') : ''}}" name="street" required>
                            <label for="street">Ulica</label>
                            <span class="text-danger">@error('street') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3 w-100">
                            <input type="text" class="form-control" id="street_extra" value="{{ old('street_extra') ? old('street_extra') : ''}}" name="street_extra">
                            <label for="street_extra">Ciąg dalszy adresu (opcjonalne)</label>
                            <span class="text-danger">@error('street_extra') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3 w-100">
                            <input type="text" class="form-control" id="city" value="{{ old('city') ? old('city') : ''}}" name="city" required>
                            <label for="city">Miasto</label>
                            <span class="text-danger">@error('city') {{$message}} @enderror</span>
                        </div>
                        <h6 class="align-self-start">Czy ten adres to?</h6>
                        <div class="form-check my-2 align-self-start">
                            <input class="form-check-input" type="radio" name="adres_type" value="carrier" id="adres_carrier" checked>
                            <label class="form-check-label text-start" for="adres_carrier">
                                Kurier
                            </label>
                        </div>
                        <div class="form-check my-2 align-self-start">
                            <input class="form-check-input" type="radio" name="adres_type" value="parcel_locker" id="adres_parcel_locker">
                            <label class="form-check-label text-start" for="adres_parcel_locker">
                                Paczkomat
                            </label>
                        </div>
                        <div class="form-check my-2 align-self-start">
                            <input class="form-check-input" type="radio" name="adres_type" value="adres_person" id="adres_person">
                            <label class="form-check-label text-start" for="adres_person">
                                Jestem z Piły i chcę dostawę osobistą przez Coffee Summit - <span class="text-success">Bezpłatna przesyłka</span>, rabat zostanie naliczony w następnym kroku
                            </label>
                        </div>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="phone" value="{{ old('phone') ? old('phone') : ''}}" name="phone" required>
                        <label for="phone">Numer telefonu</label>
                        <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="extra" value="{{ old('extra') ? old('extra') : ''}}" name="extra">
                        <label for="extra">Uwagi dotyczące zamówienia (opcjonalne)</label>
                        <span class="text-danger">@error('extra') {{$message}} @enderror</span>
                    </div>

                    <div class="form-check text-start">
                        <input class="form-check-input" type="checkbox" value="{{ old('rules') ? 'checked' : ''}}" id="rules" required>
                        <label class="form-check-label" for="rules">
                            Oświadczam, że zapoznałem/am się z treścią strony <a href="{{route('rule')}}">regulamin</a>
                        </label>
                    </div>
                    @php
                    $counter_price = intval($company['price_ship']);
                    @endphp

                    @foreach ($cartItems as $item)
                    @php
                    $counter_price += ($item->quantity*$item->price);
                    @endphp
                    @endforeach

                    <input type="hidden" name="total" value="{{$counter_price}}">
                    @foreach($elements as $e)
                    @if($e->type == 'order_bank_transfer')
                    @if($e->content == '1')
                    <input type="hidden" name="type_transfer"  id="type_transfer" value="true">
                    @else
                    <input type="hidden" name="type_transfer"  id="type_transfer" value="false">
                    @endif
                    @elseif($e->type == 'order_bank_transfer_24')
                    @if($e->content == '1')
                    <input type="hidden" name="type_transfer_24" id="type_transfer_24"  value="true">
                    @else
                    <input type="hidden" name="type_transfer_24" id="type_transfer_24"  value="false">
                    @endif
                    @endif
                    @endforeach
                    <button class="btn btn-success my-4" type="submit"><i class="fa-solid fa-credit-card me-2"></i>Kupuję i płacę</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger my-4"><i class="fa-solid fa-xmark me-2"></i>Anuluj</a>
                </form>
            </div>
            <div class="col-12 col-md-6 order-2 order-md-2" style="overflow:auto;">
                <table class="table">
                    <thead class="text-center">
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
                                    <div class="fw-bold">Atrybuty</div>
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
                                    <div class="fw-bold">Podsumowanie rekordu</div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($cartItems->isEmpty())
                        <tr>
                            <th colspan="8">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="row">
                                        <div class="col-12 offset-md-3 col-md-6">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <img class="img-fluid" alt="" src="{{asset('image/undraw_shopping_app_flsj.svg')}}">
                                                <div class="h4 m-0 p-0 my-3">Twój koszyk jest pusty!</div>
                                                <a href="{{route('shop')}}" class="btn btn-primary my-3 btn-lg"><i class="fa-solid fa-cart-shopping me-2"></i>Zrób zakupy</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        @else
                        @php
                        $k = 1;
                        @endphp
                        @foreach ($cartItems as $item)
                        <tr>
                            <th>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{$k}}</div>
                                    @php
                                    $k += 1;
                                    @endphp
                                </div>
                            </th>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    @foreach($photos as $photo)
                                    @if($photo->product_id == $item->associatedModel->id)
                                    @if($photo->order == 1)
                                    <div style="max-width:50px"><img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;"></div>
                                    @endif
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->name }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">@foreach($item->attributes as $attr) {{$attr}} @endforeach</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->price }} PLN</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->quantity }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->quantity*$item->price }} PLN</div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <h4>Podsumowanie koszyka</h4>
                <ul class="list-group ">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            @if($counter_price >= $company['free_ship'])
                            @php
                            $counter_price = $counter_price - $company['price_ship']
                            @endphp
                            <div class="fw-bold">Wysyłka InPost darmowa</div>
                            @else
                            <div class="fw-bold">Wysyłka InPost + {{ $company['price_ship'] }} PLN</div>
                            @endif
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Łącznie</div>
                            {{$counter_price}} PLN
                        </div>
                    </li>
                </ul>
                <div class="flex flex-column my-5">
                    @foreach($elements as $e)
                    @if($e->type == 'order_bank_transfer')
                    @if($e->content == '1')
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="bank_transfer" value="bank_transfer" id="bank_transfer" checked>
                        <label class="form-check-label" for="bank_transfer">
                            Płatność przelewem
                        </label>
                    </div>
                    @endif
                    @endif
                    @if($e->type == 'order_bank_transfer_24')
                    @if($e->content == '1')
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="bank_transfer" value="bank_transfer_24" id="bank_transfer_24" checked>
                        <label class="form-check-label" for="bank_transfer_24">
                            <div class="flex flex-row">
                                <span>Płatność on-line</span>
                                <img class="img-fluid ms-2" alt="logo-przelewy24" src="{{asset('image/p24.png')}}">
                            </div>
                        </label>
                    </div>
                    @endif
                    @endif
                    @endforeach
                </div>
            
                @foreach($elements as $e)
                @if($e->type == 'order_bank_transfer')
                @if($e->content == '1')
                <div id="bank-transfer-info" class="flex flex-column">
                    <h4 class="mt-4">Przelew bankowy</h4>
                    <p class="text-muted">Prosimy o wpłatę bezpośrednio na nasze konto bankowe.<span class="text-danger"> Proszę użyć numeru zamówienia jako tytuł płatności.</span> Twoje zamówienie zostanie zrealizowane po zaksięgowaniu wpłaty na naszym koncie.</p>
                    <p>Twoje dane osobowe zostaną wykorzystane do realizacji Twojego zamówienia oraz do innych celów opisanych w zakładce <a href="{{route('policy-priv')}}">polityka prywatności</a></p>
                    <h4 class="mt-4">Dane do przelewu</h4>
                    <div class="d-flex justify-content-between align-items-center text-center my-2">
                        <div class="text-muted">Numer konta: <span id="numer-konta">{{ $company['number_account_bank'] }}</span></div>
                        <button class="btn btn-primary" type="button" onclick="skopiujNumerKonta()"><i class="fa-solid fa-copy me-2"></i>Kopiuj</button>
                    </div>
                    <p class="text-danger fw-bold">Tytuł przelewu to numer zamówienia który zostanie wygenerowany po złożeniu zamówienia!</p>
                </div>
                @endif
                @endif
                @endforeach

                <script>
                    $(document).ready(function() {
                        // Ukryj początkowo div z id "bank-transfer-info"
                        @foreach($elements as $e)
                        @if($e->type == 'order_bank_transfer_24')
                        @if($e->content == '1')
                        $("#bank-transfer-info").hide();
                        $('#type_transfer').val('false');
                        $('#type_transfer_24').val('true');
                        @endif
                        @endif
                        @endforeach
                        // Obsłuż zdarzenie zmiany na radio input
                        $("input[type='radio']").on("change", function() {
                            // Sprawdź, czy wybrano "Płatność przelewem" (o ID "flexRadioDefault1")
                            if ($("#bank_transfer_24").is(":checked")) {
                                // Jeśli tak, ukryj div "bank-transfer-info"
                                $("#bank-transfer-info").hide();
                                $('#type_transfer').val('false');
                                $('#type_transfer_24').val('true');
                            } else {
                                // W przeciwnym razie (wybrano "Płatność on-line" lub inne), pokaż div "bank-transfer-info"
                                $("#bank-transfer-info").show();
                                $('#type_transfer').val('true');
                                $('#type_transfer_24').val('false');
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    </div>
</section>
<!--END ORDER-->
@endsection