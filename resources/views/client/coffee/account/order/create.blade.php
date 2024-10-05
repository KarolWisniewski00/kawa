@extends('layout.coffee')
@section('SEO')
<title>Kasa | Coffee Summit</title>
<meta property="og:title" content="Kasa | Coffee Summit" />
<meta name="twitter:title" content="Kasa | Coffee Summit" />
<meta http-equiv="x-ua-compatible" content="IE=11" />
<script>
    function isEmpty(val) {
        if (val !== '') {
            return true;
        } else {
            return false;
        }
    }

    function chceckStepFourth(email, name, phone) {
        if (email == true && name == true && phone == true) {
            $('#step-4').addClass('bg-success-c');
            return true;
        } else {
            $('#step-4').removeClass('bg-success-c');
            return false;
        }
    }

    function chceckStepFifth(post, street, city) {
        if (post == true && street == true && city == true) {
            $('#step-5').addClass('bg-success-c');
            return true;
        } else {
            $('#step-5').removeClass('bg-success-c');
            return false;
        }
    }

    function chceckSteps(fourth, fifth, sixth, seventh) {
        if (fourth == true && fifth == true && sixth == true && seventh == true) {
            $('#step-last').addClass('bg-success-c');
            Toastify({
                text: "Możesz wykonać ostatni krok!",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#4bbf73",
            }).showToast();
            $('html').animate({
                scrollTop: $('#step-last').offset().top - 130
            });
        } else {
            $('#step-last').removeClass('bg-success-c');
        }
    }
</script>
<link rel="stylesheet" href="https://geowidget.inpost.pl/inpost-geowidget.css" />
<script src='https://geowidget.inpost.pl/inpost-geowidget.js' defer></script>
<script>
    var fifth = false;
    var city = false;
    var street = false;
    var post = false;
    document.addEventListener('onpointselect', (event) => {
        console.log(event.detail);
        $('#selectedPoint').val(event.detail.name).addClass('show');
        $('#city').val(event.detail.address_details.city);
        $('#street').val(event.detail.address.line1);
        $('#street_extra').val(event.detail.location_description);
        $('#post').val(event.detail.address_details.post_code);
        $('#easypack-map').css('display', 'none');
        city = true;
        street = true;
        post = true;
        fifth = chceckStepFifth(true, true, true);
    });
</script>
@endsection
@section('content')
<style>
    body {
        margin-top: 20px;
    }

    .timeline_area {
        position: relative;
        z-index: 1;
    }

    .single-timeline-area {
        position: relative;
        z-index: 1;
        padding-left: 120px;
    }

    @media only screen and (max-width: 575px) {
        .single-timeline-area {
            padding-left: 100px;
        }
    }

    .single-timeline-area .timeline-date {
        position: absolute;
        width: 120px;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -ms-grid-row-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
        padding-right: 60px;
    }

    @media only screen and (max-width: 575px) {
        .single-timeline-area .timeline-date {
            width: 100px;
        }
    }

    .single-timeline-area .timeline-date::after {
        position: absolute;
        width: 3px;
        height: 100%;
        content: "";
        background-color: #ebebeb;
        top: 0;
        right: 30px;
        z-index: 1;
    }

    .single-timeline-area .timeline-date::before {
        position: absolute;
        width: 21px;
        height: 21px;
        border-radius: 50%;
        background-color: var(--bs-danger);
        content: "";
        top: 50%;
        right: 21px;
        z-index: 5;
        margin-top: -5.5px;
    }

    .single-timeline-area .bg-success-c::before {
        background-color: var(--bs-success);
    }

    .single-timeline-area .timeline-date p {
        margin-bottom: 0;
        color: #020710;
        font-size: 13px;
        text-transform: uppercase;
        font-weight: 500;
    }

    .single-timeline-area .single-timeline-content {
        position: relative;
        z-index: 1;
    }

    @media only screen and (max-width: 575px) {
        .single-timeline-area .single-timeline-content {
            padding: 20px;
        }
    }

    .single-timeline-area .single-timeline-content .timeline-icon {
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        width: 30px;
        height: 30px;
        background-color: var(--bs-danger);
        -webkit-box-flex: 0;
        -ms-flex: 0 0 30px;
        flex: 0 0 30px;
        text-align: center;
        max-width: 30px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .single-timeline-area .single-timeline-content .timeline-icon i {
        color: #ffffff;
        line-height: 30px;
    }

    .single-timeline-area .single-timeline-content .timeline-text h6 {
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
    }

    .single-timeline-area .single-timeline-content .timeline-text p {
        font-size: 13px;
        margin-bottom: 0;
    }

    .single-timeline-area .single-timeline-content:hover .timeline-icon,
    .single-timeline-area .single-timeline-content:focus .timeline-icon {
        background-color: #020710;
    }

    .single-timeline-area .single-timeline-content:hover .timeline-text h6,
    .single-timeline-area .single-timeline-content:focus .timeline-text h6 {
        color: #3f43fd;
    }
</style>
<!--ORDER-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199493482_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">Nowe zamówienie</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="overflow: hidden;">
        <div class="row g-5">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>To już ostatnie kroki</h1>
                </div>
                @include('client.coffee.module.alert')
            </div>

            <div class="col-12 col-md-6 order-1 order-md-1">

                <form class="form text-center my-3" action="{{route('account.order.store')}}" method="POST">
                    <!--TOKEN-->
                    @csrf
                    <!-- Timeline Area-->
                    <div class="apland-timeline-area">
                        <!-- Single Timeline Content-->
                        <div class="single-timeline-area">
                            <div id="step-4" class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                <p class="text-center">Krok 4</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="single-timeline-content d-flex wow fadeInLeft my-4" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                        <div class="timeline-text text-start">
                                            <h2 class="fw-bold mt-4">Jaka osoba zamawiająca?</h2>
                                            <!--<p class="mt-4 fs-5">Jeśli jesteś zalogowany dane uzupełniają się automatycznie <a href="{{route('login')}}" class="text-info">Logowanie</a></p>-->
                                            <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="name" value="{{ old('name') ? old('name') : ''}}" placeholder="Wpisz imię i nazwisko" name="name" required>
                                                    <label for="name">Imię i nazwisko</label>
                                                    <span class="text-danger">@error('name') {{$message}} @enderror</span>
                                                </div>

                                                <div class="form-floating my-3 w-100">
                                                    <input type="email" class="form-control" id="email" value="{{ old('email') ? old('email') : ''}}" placeholder="Wpisz email na który otrzymasz potwierdzenie" name="email" required>
                                                    <label for="email">Email</label>
                                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                                </div>

                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="phone" value="{{ old('phone') ? old('phone') : ''}}" placeholder="Wpisz opcjonalnie numer telefonu" name="phone" required>
                                                    <label for="phone">Numer telefonu</label>
                                                    <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Timeline Content-->
                        <div class="single-timeline-area">
                            <div id="step-5" class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                <p class="text-center">Krok 5</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="single-timeline-content d-flex wow fadeInLeft my-4" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                        <div class="timeline-text text-start">
                                            <h2 class="fw-bold mt-4">Jaki jest adres dostawy?</h2>
                                            <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                                                <div class="form-check my-3 align-self-start w-100">
                                                    <input class="form-check-input" type="radio" name="adres_type" value="carrier" id="adres_carrier">
                                                    <label class="form-check-label text-start" for="adres_carrier">
                                                        Chcę zamówić kuriera
                                                    </label>
                                                </div>
                                                <div class="form-check my-3 align-self-start w-100">
                                                    <input class="form-check-input" type="radio" name="adres_type" value="parcel_locker" id="adres_parcel_locker" checked>
                                                    <label class="form-check-label text-start w-100" for="adres_parcel_locker">
                                                        <span class="">Chcę zamówić do paczkomatu</span>
                                                        <img class="img-fluid ms-2" style="height: 1.35em;" alt="inpost-logo.svg" src="{{asset('image/inpost-logo.svg')}}">
                                                    </label>
                                                </div>
                                                <inpost-geowidget id="easypack-map" onpoint="onpointselect" class="w-100" style="height:80vh" token='eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJzQlpXVzFNZzVlQnpDYU1XU3JvTlBjRWFveFpXcW9Ua2FuZVB3X291LWxvIn0.eyJleHAiOjIwMzkyODE2MjksImlhdCI6MTcyMzkyMTYyOSwianRpIjoiMmVjNWFmZTktODcwMC00MzY5LTg0M2YtYTY3YzM0MjEzODA1IiwiaXNzIjoiaHR0cHM6Ly9sb2dpbi5pbnBvc3QucGwvYXV0aC9yZWFsbXMvZXh0ZXJuYWwiLCJzdWIiOiJmOjEyNDc1MDUxLTFjMDMtNGU1OS1iYTBjLTJiNDU2OTVlZjUzNToyNzl1VzdDNW1FdnFfTHZLRVpudGJTXzJ5alVaZmMyWUtRUzlyNUdCVS1FIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoic2hpcHgiLCJzZXNzaW9uX3N0YXRlIjoiYzhmZDliODctM2QzOC00YzM1LWIxMzMtMmZhOWNjYTYxOTJiIiwic2NvcGUiOiJvcGVuaWQgYXBpOmFwaXBvaW50cyIsInNpZCI6ImM4ZmQ5Yjg3LTNkMzgtNGMzNS1iMTMzLTJmYTljY2E2MTkyYiIsImFsbG93ZWRfcmVmZXJyZXJzIjoid3d3LmNvZmZlZXN1bW1pdC5wbCIsInV1aWQiOiIxYzk1MGYyMS00ZDY5LTRmZGYtYmExYi1lNmI4MmQ5YmMzMDcifQ.S_Jc9B1qgk2TSkldPpB69o-riuP2JDa5w1vSJtFLhdH6N4gzocA_r9KyxrkaXY-6gyRH1ypC8HqTQebVjwMGASUK3UkqcXx61v16H-eS-OD2Ah7nkYWIwufTGUiCCVhgI31TOkXX-koDwJSvGT4sIMWUCu3nK69a05DDlkUcz7fox9m6nRh5rU0kj698-cZSrY1J4e2rHws_NnxMNmYppIK5ZGICAlVCK-yOuKtLyMPD1HQ1L8KtZ0YwxCWXFmTR8C1wRbjOJRxJF70QbBExGqFGOr3TmKjkIwiKgp7uGVMaIuaVIRvJZ95uGy6fPG_12cBk4UzGn9NZNrytJnQrpA' language='pl' config='parcelcollect'></inpost-geowidget>
                                                <div class="form-floating my-3 w-100" id="point-input-container">
                                                    <input type="text" class="form-control" id="selectedPoint" placeholder="Numer paczkomatu" name="point">
                                                    <label for="point">Numer paczkomatu</label>
                                                    <span class="text-danger">@error('point') {{$message}} @enderror</span>
                                                </div>
                                                <div class="form-check my-3 align-self-start w-100">
                                                    <input class="form-check-input" type="radio" name="adres_type" value="adres_person" id="adres_person">
                                                    <label class="form-check-label text-start" for="adres_person">
                                                        Jestem z Piły i chcę dostawę osobistą przez Coffee Summit - <span class="text-success">Bezpłatna przesyłka</span>
                                                    </label>
                                                </div>
                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="city" value="{{ old('city') ? old('city') : ''}}" placeholder="Wpisz nazwe miasta" name="city" required>
                                                    <label for="city">Miasto</label>
                                                    <span class="text-danger">@error('city') {{$message}} @enderror</span>
                                                </div>

                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="street" value="{{ old('street') ? old('street') : ''}}" placeholder="Wpisz nazwę ulicy" name="street" required>
                                                    <label for="street">Ulica</label>
                                                    <span class="text-danger">@error('street') {{$message}} @enderror</span>
                                                </div>

                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="street_extra" value="{{ old('street_extra') ? old('street_extra') : ''}}" placeholder="Wpisz uwagi dotyczące adresu" name="street_extra">
                                                    <label for="street_extra">Ciąg dalszy adresu</label>
                                                    <span class="text-danger">@error('street_extra') {{$message}} @enderror</span>
                                                </div>

                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="post" value="{{ old('post') ? old('post') : ''}}" placeholder="Wpisz kod pocztowy" name="post" required>
                                                    <label for="post">Kod pocztowy</label>
                                                    <span class="text-danger">@error('post') {{$message}} @enderror</span>
                                                </div>
                                                <div class="form-check my-3 align-self-start w-100">
                                                    <input class="form-check-input" type="checkbox" name="person_order_pickup" id="person_order_pickup">
                                                    <label class="form-check-label text-start" for="person_order_pickup" onclick="">
                                                        Chcę inną osobę odbierającą (opcjonalne)
                                                    </label>
                                                </div>
                                                <div id="person-order-pickup" class="w-100 d-flex flex-column justify-content-center align-items-center text-start my-3 px-3 border border-2">
                                                    <h2 class="my-3">Osoba odbierająca</h2>
                                                    <div class="form-floating my-3 w-100">
                                                        <input type="text" class="form-control" id="nam-recive" value="{{ old('name-recive') ? old('name-recive') : ''}}" placeholder="Wpisz imię i nazwisko osoby odbierającej" name="name_recive">
                                                        <label for="name-recive">Imię i nazwisko</label>
                                                        <span class="text-danger">@error('name-recive') {{$message}} @enderror</span>
                                                    </div>

                                                    <div class="form-floating my-3 w-100">
                                                        <input type="email" class="form-control" id="email-recive" value="{{ old('email-recive') ? old('email-recive') : ''}}" placeholder="Wpisz email osoby odbierającej" name="email_recive">
                                                        <label for="email-recive">Email</label>
                                                        <span class="text-danger">@error('email-recive') {{$message}} @enderror</span>
                                                    </div>

                                                    <div class="form-floating my-3 w-100">
                                                        <input type="text" class="form-control" id="phone-recive" value="{{ old('phone-recive') ? old('phone-recive') : ''}}" placeholder="Wpisz numer telefonu osoby odbierającej" name="phone_recive">
                                                        <label for="phone-recive">Numer telefonu</label>
                                                        <span class="text-danger">@error('phone-recive') {{$message}} @enderror</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Timeline Content-->
                        <div class="single-timeline-area">
                            <div id="step-6" class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                <p class="text-center">Krok 6</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="single-timeline-content d-flex wow fadeInLeft my-4" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                        <div class="timeline-text text-start">
                                            <h2 class="fw-bold mt-4">Czy chcesz Fakturę VAT?</h2>
                                            <div class="form-check my-3 align-self-start w-100">
                                                <input class="form-check-input" type="checkbox" name="invoice_step" id="invoice_step">
                                                <label class="form-check-label text-start" for="invoice_step" onclick="">
                                                    Chcę Fakturę VAT (opcjonalne)
                                                </label>
                                            </div>
                                            <div id="invoice-step" class="w-100 d-flex flex-column justify-content-center align-items-center text-start my-3 px-3 border border-2">
                                                <h2 class="my-3">Dane do faktury</h2>
                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="company" value="{{ old('company') ? old('company') : ''}}" name="company">
                                                    <label for="company">Nazwa firmy</label>
                                                    <span class="text-danger">@error('company') {{$message}} @enderror</span>
                                                </div>
                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="nip" value="{{ old('nip') ? old('nip') : ''}}" name="nip">
                                                    <label for="nip">NIP</label>
                                                    <span class="text-danger">@error('company') {{$message}} @enderror</span>
                                                </div>
                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="city-invoice" value="{{ old('city-invoice') ? old('city-invoice') : ''}}" name="city_invoice">
                                                    <label for="city-invoice">Miasto</label>
                                                    <span class="text-danger">@error('city-invoice') {{$message}} @enderror</span>
                                                </div>

                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="street-invoice" value="{{ old('street-invoice') ? old('street-invoice') : ''}}" name="street_invoice">
                                                    <label for="street-invoice">Ulica</label>
                                                    <span class="text-danger">@error('street-invoice') {{$message}} @enderror</span>
                                                </div>

                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="street_extra-invoice" value="{{ old('street_extra-invoice') ? old('street_extra-invoice') : ''}}" name="street_extra_invoice">
                                                    <label for="street_extra-invoice">Ciąg dalszy adresu</label>
                                                    <span class="text-danger">@error('street_extra-invoice') {{$message}} @enderror</span>
                                                </div>

                                                <div class="form-floating my-3 w-100">
                                                    <input type="text" class="form-control" id="post-invoice" value="{{ old('post-invoice') ? old('post-invoice') : ''}}" name="post_invoice">
                                                    <label for="post-invoice">Kod pocztowy</label>
                                                    <span class="text-danger">@error('post-invoice') {{$message}} @enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Timeline Content-->
                        <div class="single-timeline-area">
                            <div id="step-7" class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                <p class="text-center">Krok 7</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="single-timeline-content d-flex wow fadeInLeft my-4" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                        <div class="timeline-text text-start">
                                            <h2 class="fw-bold mt-4">Regulamin i uwagi do zamówienia</h2>
                                            <div class="form-floating my-3">
                                                <textarea class="form-control" id="extra" value="{{ old('extra') ? old('extra') : ''}}" placeholder="Wpisz uwagi do zamówienia np. numer paczkomatu" name="extra"></textarea>
                                                <label for="extra">Notatka</label>
                                                <span class="text-danger">@error('extra') {{$message}} @enderror</span>
                                            </div>

                                            <div class="form-check text-start">
                                                <input class="form-check-input" type="checkbox" value="{{ old('rules') ? 'checked' : ''}}" id="rules" required>
                                                <label class="form-check-label" for="rules">
                                                    Oświadczam, że zapoznałem/am się z treścią strony <a href="{{route('rule')}}">regulamin</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Timeline Content-->
                        <div class="single-timeline-area">
                            <div id="step-last" class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                <p class="text-center">Krok 8</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="single-timeline-content d-flex wow fadeInLeft my-4" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                        <div class="timeline-text text-start w-100">
                                            <button class="w-100 btn btn-success my-4" type="submit"><i class="fa-solid fa-credit-card me-2"></i>Kupuję i płacę</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $counter_price = intval($company['price_ship']);
                    @endphp

                    @foreach ($cartItems as $item)
                    @php
                    $counter_price += ($item->quantity*$item->price);
                    @endphp
                    @endforeach

                    <input type="hidden" name="total" value="{{$counter_price}}" id="total-input">
                    @foreach($elements as $e)
                    @if($e->type == 'order_bank_transfer')
                    @if($e->content == '1')
                    <input type="hidden" name="type_transfer" id="type_transfer" value="true">
                    @else
                    <input type="hidden" name="type_transfer" id="type_transfer" value="false">
                    @endif
                    @elseif($e->type == 'order_bank_transfer_24')
                    @if($e->content == '1')
                    <input type="hidden" name="type_transfer_24" id="type_transfer_24" value="true">
                    @else
                    <input type="hidden" name="type_transfer_24" id="type_transfer_24" value="false">
                    @endif
                    @endif
                    @endforeach
                    <input type="hidden" name="discount" id="discount-form">
                </form>
            </div>
            <div class="col-12 col-md-6 order-2 order-md-2">
                <div class="position-sticky p-2" style="top:10rem; overflow:auto;">
                    <table class="table text-center d-none d-md-block">
                        <thead class="">
                            <tr>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Ilość</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Zdjęcie</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Kawa</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Rozmiar</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Cena</div>
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
                                        <div class="fw-bold">{{ $item->quantity }} x</div>
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
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">{{ $item->quantity*$item->price }} PLN</div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="list-group mb-5 d-block d-md-none">
                        @if ($cartItems->isEmpty())
                        <div class="list-group-item list-group-item-action flex-column align-items-start p-3 gap-3">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img class="img-fluid" alt="" src="{{asset('image/undraw_shopping_app_flsj.svg')}}">
                                <div class="h4 m-0 p-0 my-3">Twój koszyk jest pusty!</div>
                                <a href="{{route('shop')}}" class="btn btn-primary my-3 btn-lg"><i class="fa-solid fa-cart-shopping me-2"></i>Zrób zakupy</a>
                            </div>
                        </div>
                        @else
                        @php
                        $k = 1;
                        @endphp
                        @foreach ($cartItems as $item)
                        <div class="list-group-item list-group-item-action flex-column align-items-start p-3 gap-3">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                @foreach($photos as $photo)
                                @if($photo->product_id == $item->associatedModel->id)
                                @if($photo->order == 1)
                                <div><img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;"></div>
                                @endif
                                @endif
                                @endforeach
                            </div>
                            <div class="d-flex w-100 justify-content-between pt-3">
                                <div class="d-fled flex-col">
                                    <h4>{{ $item->name }}</h4>
                                    <small class="text-muted fw-bold">@foreach($item->attributes as $attr) {{$attr}} @endforeach</small>
                                </div>
                                <div class="d-fled flex-col text-end">
                                    <small class="text-muted">{{ $item->quantity }} x</small>
                                    <h4 class="mt-2 mb-0 fw-bold">{{ $item->quantity*$item->price }} PLN</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <h4 class="text-center">Podsumowanie koszyka</h4>
                    <ul class="list-group ">
                        <li class="list-group-item d-flex justify-content-between align-items-start p-3">
                            <div class="w-100">
                                <div class="d-flex flex-column align-items-start">
                                    <!-- Input na kod rabatowy -->
                                    <div class="form-floating w-100">
                                        <input type="text" class="form-control" id="discount-code" placeholder="Kod rabatowy">
                                        <label for="discount-code">Wpisz kod rabatowy</label>
                                        <span class="text-danger d-none" id="discount-error"></span>
                                    </div>

                                    <!-- Przycisk sprawdzający kod -->
                                    <button class="btn btn-primary ms-0 mt-3" id="check-discount" type="button">
                                        <i class="fa-solid fa-check me-2"></i>Sprawdź kod
                                    </button>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                @if($counter_price >= $company['free_ship'])
                                @php
                                $counter_price = $counter_price - $company['price_ship']
                                @endphp
                                <div id="ship-info" class="fw-bold">Wysyłka InPost darmowa</div>
                                @else
                                <div id="ship-info" class="fw-bold">Wysyłka InPost + {{ $company['price_ship'] }} PLN</div>
                                @endif
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Łącznie</div>
                                <span id="all">{{$counter_price}}</span> PLN
                            </div>
                        </li>

                        <!-- AJAX Script -->
                        <script>
                            document.getElementById('check-discount').addEventListener('click', function() {
                                // Pobierz wartość kodu rabatowego z inputa
                                var discountCode = document.getElementById('discount-code').value;

                                // Wyczyść poprzednie błędy
                                var discountInput = document.getElementById('discount-code');
                                var errorMessage = document.getElementById('discount-error');
                                var checkButton = document.getElementById('check-discount');
                                discountInput.classList.remove('is-invalid', 'is-valid');
                                errorMessage.classList.add('d-none');

                                // AJAX
                                fetch('{{ route("check.discount") }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Wysyłanie CSRF tokena
                                        },
                                        body: JSON.stringify({
                                            discount_code: discountCode,
                                            price: document.getElementById('all').innerText
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            // Kod poprawny - zaznacz na zielono, zaktualizuj cenę i zablokuj input oraz przycisk
                                            discountInput.classList.add('is-valid');
                                            checkButton.classList.remove('btn-primary');
                                            checkButton.classList.add('btn-success');
                                            checkButton.disabled = true;
                                            discountInput.disabled = true; // Zablokuj pole tekstowe
                                            document.getElementById('all').innerText = data.newPrice;
                                            document.getElementById('total-input').value = data.newPrice;
                                            document.getElementById('price-printed').value = data.newPrice;
                                            document.getElementById('discount-form').value = discountCode;
                                        } else {
                                            // Kod niepoprawny - zaznacz na czerwono
                                            discountInput.classList.add('is-invalid');
                                            errorMessage.innerText = data.message;
                                            errorMessage.classList.remove('d-none');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Błąd:', error);
                                        discountInput.classList.add('is-invalid');
                                        errorMessage.innerText = 'Błąd: ' + error;
                                        errorMessage.classList.remove('d-none');
                                    });
                            });
                        </script>

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
                            @if($e-> type == 'order_bank_transfer_24')
                            @if($e-> content == '1')
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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<input type="hidden" id="price-ship" value="{{ $company['price_ship'] }}">
<input type="hidden" id="price-printed" value="{{$counter_price}}">
<script>
    $(document).ready(function() {
        $('#person-order-pickup').addClass('d-none');
        $("#person_order_pickup").on("change", function() {
            if ($("#person_order_pickup").is(":checked")) {
                $("#person-order-pickup").removeClass('d-none');
            } else {
                $("#person-order-pickup").addClass('d-none');
            }
        });
        $('#invoice-step').addClass('d-none');
        $("#invoice_step").on("change", function() {
            if ($("#invoice_step").is(":checked")) {
                $("#invoice-step").removeClass('d-none');
            } else {
                $("#invoice-step").addClass('d-none');
            }
        });
        $("input[name='adres_type']").on("change", function() {
            if ($(this).val() === 'parcel_locker') {
                $('#point-input-container').removeClass('d-none');
                $('#easypack-map').removeClass('d-none');
            } else {
                $('#point-input-container').addClass('d-none');
                $('#easypack-map').addClass('d-none');
            }
        });
    });
    $(document).ready(function() {
        var fourth = false;
        var name = false;
        var phone = false;
        var email = false;
        var sixth = true;
        $('#step-6').addClass('bg-success-c');
        var seventh = false;
        //4
        //name
        $('#name').on('input', function() {
            var nameValue = $(this).val();
            name = isEmpty(nameValue);
            fourth = chceckStepFourth(email, name, phone);
            chceckSteps(fourth, fifth, sixth, seventh);
        });
        //email
        $('#email').on('input', function() {
            var emailValue = $(this).val();
            email = isEmpty(emailValue);
            fourth = chceckStepFourth(email, name, phone);
            chceckSteps(fourth, fifth, sixth, seventh);
        });
        //phone
        $('#phone').on('input', function() {
            var phoneValue = $(this).val();
            phone = isEmpty(phoneValue);
            fourth = chceckStepFourth(email, name, phone);
            chceckSteps(fourth, fifth, sixth, seventh);
        });
        //5
        //city
        $('#city').on('input', function() {
            var cityValue = $(this).val();
            city = isEmpty(cityValue);
            fifth = chceckStepFifth(post, street, city);
            chceckSteps(fourth, fifth, sixth, seventh);
        });
        //street
        $('#street').on('input', function() {
            var streetValue = $(this).val();
            street = isEmpty(streetValue);
            fifth = chceckStepFifth(post, street, city);
            chceckSteps(fourth, fifth, sixth, seventh);
        });
        //post
        $('#post').on('input', function() {
            var postValue = $(this).val();
            post = isEmpty(postValue);
            fifth = chceckStepFifth(post, street, city);
            chceckSteps(fourth, fifth, sixth, seventh);
        });
        //7
        //rule
        $('#rules').change(function() {
            if ($(this).is(':checked')) {
                $('#step-7').addClass('bg-success-c');
                seventh = true;
                chceckSteps(fourth, fifth, sixth, seventh);
            } else {
                $('#step-7').removeClass('bg-success-c');
                seventh = false;
                chceckSteps(fourth, fifth, sixth, seventh);
            }
        });
        $("input[name='adres_type']").on("change", function() {
            var price = $('#price-ship').val();
            var pricePrinted = $('#price-printed').val();
            if ($(this).val() === 'adres_person') {
                $('#ship-info').html('Wysyłka InPost darmowa');
                $('#all').html(pricePrinted - price);
            } else {
                $('#ship-info').html('Wysyłka InPost + ' + price + ' PLN');
                $('#all').html(pricePrinted);
            }
        });
    });
</script>
@endsection