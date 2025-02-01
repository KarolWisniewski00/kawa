@extends('layout.coffee')
@section('SEO')
<title>{{$product->seo_title}} | Coffee Summit</title>
@if( $product->visibility_in_google == true )
<meta property="og:title" content="{{$product->seo_title}} | Coffee Summit" />
<meta name="twitter:title" content="{{$product->seo_title}} | Coffee Summit" />
<meta name="description" content="{{$product->seo_description}}">
<meta property="og:description" content="{{$product->seo_description}}" />
<meta name="twitter:description" content="{{$product->seo_description}}" />
@else
<meta name="robots" content="noindex, nofollow">
@endif
@endsection
@section('content')
<!--PRODUCT-->
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
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199823494_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">{{$product->name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('client.coffee.module.alert')
            </div>
            <div class="col-12 mb-4 text-end">
                <a href="{{route('shop')}}" class="btn btn-outline-primary"><i class="fa-solid fa-chevron-left"></i> Sklep - Wszystkie produkty</a>
            </div>
            <div class="col-12 col-lg-6">
                @if($product->photo_second != null)
                <button type="button" class="p-0 m-0 mb-3 border-0 d-flex align-items-center justify-content-center bg-transparent overflow-hidden" id="button-studio-photo-main" data-bs-toggle="modal" data-bs-target="#studio-photo-main">
                    @foreach($photos as $photo)
                    @if($photo->product_id == $product->id)
                    @if($photo->order == 1)
                    <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                    @endif
                    @endif
                    @endforeach
                </button>
                <button type="button" class="p-0 m-0 mb-3 border-0 d-flex align-items-center justify-content-center bg-transparent overflow-hidden" id="button-studio-photo-main" data-bs-toggle="modal" data-bs-target="#studio-photo-main">
                    <img src="{{ asset('photo/' . $product->photo_second) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                </button>
                @else
                <button type="button" class="p-0 m-0 mb-3 border-0 d-flex align-items-center justify-content-center bg-transparent overflow-hidden" id="button-studio-photo-main" data-bs-toggle="modal" data-bs-target="#studio-photo-main">
                    @foreach($photos as $photo)
                    @if($photo->product_id == $product->id)
                    @if($photo->order == 1)
                    <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                    @endif
                    @endif
                    @endforeach
                </button>
                @endif

                @if($product->description != '')
                <div class="col-12 text-center mb-4 d-none d-lg-block">
                    <div class="text-center mb-4">
                        <h1>Opis produktu</h1>
                    </div>
                    <p class="text-muted">{{$product->description}}</p>
                </div>
                @endif

                <div class="modal fade" id="studio-photo-main" tabindex="-1" aria-labelledby="studio-photo-main-label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border-0 rounded-0">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @foreach($photos as $photo)
                                @if($photo->product_id == $product->id)
                                @if($photo->order == 1)
                                <img src="{{ asset('photo/' . $photo->image_path) }}" alt="studio-photo-main" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                                @endif
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-column justify-content-start align-items-start">
                    <form method="POST" action="{{route('shop.cart.add', $product)}}">
                        <div class="row">
                            <div class="col-12">
                                <!-- Timeline Area-->
                                <div class="apland-timeline-area">
                                    <!-- Single Timeline Content-->
                                    <div class="single-timeline-area">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-timeline-content d-flex wow fadeInLeft mb-4" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                    <div class="timeline-text">
                                                        <div class="">
                                                            <h1>{{$product->name}}</h1>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center align-items-start my-2 ">
                                                            <div class="fs-1">
                                                                @php
                                                                $minPrice = null;
                                                                $maxPrice = null;
                                                                @endphp

                                                                @foreach($variants as $variant)
                                                                @if($variant->product_id == $product->id && $variant->size_id != null)
                                                                @php
                                                                // Sprawdź minimalną cenę
                                                                if ($minPrice === null || $variant->price < $minPrice) { $minPrice=$variant->price;
                                                                    }

                                                                    // Sprawdź maksymalną cenę
                                                                    if ($maxPrice === null || $variant->price > $maxPrice) {
                                                                    $maxPrice = $variant->price;
                                                                    }
                                                                    @endphp
                                                                    @endif
                                                                    @endforeach

                                                                    @if($minPrice !== null && $maxPrice !== null)
                                                                    <span class="price-show" id="price-show">{{$minPrice}} PLN - {{$maxPrice}} PLN</span>
                                                                    @elseif($product->price_simple)
                                                                    {{$product->price_simple}} PLN
                                                                    @else
                                                                    Brak dostępnych cen.
                                                                    @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Timeline Content-->
                                    <div class="single-timeline-area">
                                        <div id="step-1" class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                            <p class="text-center">Krok 1</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-timeline-content d-flex wow fadeInLeft mb-4" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                    <div class="timeline-text">
                                                        <h2 class="fw-bold mt-4">Jaki rozmiar kawy?</h2>
                                                        <p class="fw-bold mt-4">Wybierz rozmiar opakowania</p>
                                                        <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                                                            @php
                                                            $countSize = 0;
                                                            @endphp
                                                            @foreach($sizes as $size)
                                                            @foreach($variants as $variant)
                                                            @if($size->id == $variant->size_id)
                                                            @if($product->id == $variant->product_id)
                                                            @php
                                                            $countSize += 1;
                                                            $idSize = $size->id;
                                                            @endphp
                                                            <div class="m-2 gsap-2">
                                                                <input type="radio" class="btn-check" data-price-show="{{$variant->price}} PLN" name="size" value="{{$size->id}}" id="size-{{$size->id}}">
                                                                <label class="btn btn-outline-primary btn-1" for="size-{{$size->id}}">
                                                                    <div class="flex flex-column justify-content-center align-items-center">
                                                                        <div id="size-name">{{$size->name}}</div>
                                                                        <div id="size-price">{{$variant->price}} PLN</div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            @endif
                                                            @endif
                                                            @endforeach
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Timeline Content-->
                                    <div class="single-timeline-area">
                                        <div id="step-2" class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                            <p class="text-center">Krok 2</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-timeline-content d-flex wow fadeInLeft mb-4" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                    <div class="timeline-text">
                                                        <h2 class="fw-bold mt-4">Kawa mielona czy ziarnista?</h2>
                                                        <p class="fw-bold mt-4">Wybierz rodzaj mielenia</p>
                                                        <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                                                            @foreach($grindTypes as $grindType)
                                                            @foreach($variants as $variant)
                                                            @if($grindType->id == $variant->grinding_id)
                                                            @if($product->id == $variant->product_id)
                                                            @if($grindType->id == 1)
                                                            <div class="m-2 gsap-2">
                                                                <input type="radio" class="btn-check" name="grind" value="{{$grindType->name}}" id="grind-{{$grindType->id}}">
                                                                <label class="btn btn-outline-primary btn-2" for="grind-{{$grindType->id}}">
                                                                    <div class="flex flex-column justify-content-center align-items-center">
                                                                        <div>{{$grindType->name}}</div>
                                                                        <div>{{$grindType->usage_information}}</div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            @else
                                                            <div class="m-2 gsap-2">
                                                                <input type="radio" class="btn-check" name="grind" value="{{$grindType->name}}" id="grind-{{$grindType->id}}">
                                                                <label class="btn btn-outline-primary btn-2" for="grind-{{$grindType->id}}">
                                                                    <div class="flex flex-column justify-content-center align-items-center">
                                                                        <div>{{$grindType->name}}</div>
                                                                        <div>{{$grindType->usage_information}}</div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            @endif
                                                            @endif
                                                            @endif
                                                            @endforeach
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Timeline Content-->
                                    <div class="single-timeline-area">
                                        <div id="step-3" class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                            <p class="text-center">Krok 3</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-timeline-content d-flex wow fadeInLeft mb-4" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                    <div class="timeline-text">
                                                        <p class="fw-bold mt-4">Wybierz ilość opakowań.</p>
                                                        <style>
                                                            .w-60 {
                                                                width: 40px;
                                                            }

                                                            @media only screen and (min-width: 375px) {
                                                                .w-60 {
                                                                    width: 60px;
                                                                }
                                                            }
                                                        </style>
                                                        <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                                                            <button type="button" class="btn btn-outline-primary text-center w-60 p-0" id="quantity-decrease" style="height: 52px">-</button>
                                                            <input type="number" class="form-control mx-2" id="quantity" name="quantity" value="1" min="1" max="35" style="width: 75px; height: 52px">
                                                            <button type="button" class="btn btn-outline-primary text-center w-60 p-0" id="quantity-increase" style="height: 52px">+</button>
                                                        </div>
                                                        <p class="fw-bold mt-4">Jeśli chcesz większą ilość i lepszą cenę przejdź do <a href="{{route('collaboration')}}" class="text-info">Współpraca</a></p>
                                                        <div class="d-flex flex-row justify-content-between align-items-center mb-4 mt-2">
                                                            @csrf
                                                            <button type="submit" id="add-to-cart-button" class="btn btn-lg btn-primary w-fit h-100" disabled>
                                                                <div class="d-flex justify-content-start align-items-center">
                                                                    <div><i class="fa-solid fa-cart-shopping me-2"></i></div>
                                                                    <div>Dodaj do koszyka</div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                $(document).ready(function() {
                                                    $('#quantity-decrease').click(function() {
                                                        var quantity = parseInt($('#quantity').val());
                                                        if (quantity > 1) {
                                                            $('#quantity').val(quantity - 1);
                                                        }
                                                    });

                                                    $('#quantity-increase').click(function() {
                                                        var quantity = parseInt($('#quantity').val());
                                                        if (quantity < 35) {
                                                            $('#quantity').val(quantity + 1);
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!--END PRODUCT-->
        <!--PRODUCTS GRID-->
        <div class="row my-5">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h1>Podobne produkty</h1>
                </div>
            </div>
            @foreach($products as $p)
            <div class="col-12 col-md-4">
                <a href="{{route('shop.product.show', $p->id)}}" class="h-100 d-flex flex-column justify-content-start align-items-center text-decoration-none">

                    @foreach($photos as $photo)
                    @if($photo->product_id == $p->id)
                    @if($photo->order == 1)
                    <div class="d-flex flex-column justify-content-center align-items-center h-75 overflow-hidden">
                        <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                    </div>
                    @endif
                    @endif
                    @endforeach
                    <div class="d-flex flex-column justify-content-center align-items-center h-25">
                        <h4 class="font-custom mt-2 text-center">{{$p->name}}</h4>
                        <p>
                            @php
                            $minPrice = null;
                            $maxPrice = null;
                            @endphp

                            @foreach($variants as $variant)
                            @if($variant->product_id == $p->id && $variant->size_id != null)
                            @php
                            // Sprawdź minimalną cenę
                            if ($minPrice === null || $variant->price < $minPrice) { $minPrice=$variant->price;
                                }

                                // Sprawdź maksymalną cenę
                                if ($maxPrice === null || $variant->price > $maxPrice) {
                                $maxPrice = $variant->price;
                                }
                                @endphp
                                @endif
                                @endforeach

                                @if($minPrice !== null && $maxPrice !== null)
                                {{$minPrice}} PLN - {{$maxPrice}} PLN
                                @else
                                Brak dostępnych cen.
                                @endif
                        </p>
                    </div>

                </a>
            </div>
            @endforeach
        </div>
        <!--END PRODUCTS GRID-->
    </div>
</section>
<!--END PRODUCT-->
@endsection
@section('js')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    $(document).ready(function() {
        $("#customRange1").on("input", function() {
            var value = $(this).val();
            $(".form-label").text(value);
        });
    });
    $(document).ready(function() {
        // Funkcja sprawdzająca, czy rozmiar i rodzaj mielenia zostały wybrane
        function checkSelection() {
            var sizeSelected = $('input[name="size"]:checked').length > 0;
            var grindSelected = $('input[name="grind"]:checked').length > 0;

            // Włącz przycisk "Dodaj do koszyka" tylko wtedy, gdy oba elementy są wybrane
            $('#add-to-cart-button').prop('disabled', !(sizeSelected && grindSelected));
        }

        // Nasłuchuj zmian w wyborze rozmiaru i rodzaju mielenia
        $('input[name="size"], input[name="grind"]').change(checkSelection);
    });
    $(document).ready(function() {
        // Znajdź elementy suwaka i etykiety
        var $slider = $('#quantity');
        var $label = $('label[for="quantity"]');

        // Obsługa zdarzenia input (zmiany wartości suwaka)
        $slider.on('input', function() {
            // Pobierz wartość suwaka
            var value = $(this).val();

            // Aktualizuj tekst etykiety
            $label.text(value);
        });
    });
    $(document).ready(function() {
        $('#grind-1').prop('checked', true);
        $('#step-2').addClass('bg-success-c');

        var first = false;
        var second = true;

        @if($countSize == 1)
        price = $('#size-{{$idSize}}').data('price-show');
        $('#step-1').addClass('bg-success-c');
        $('#price-show').html(price);
        $('#size-name').html('Zestaw');
        first = true;
        $('#size-{{$idSize}}').prop('checked', true);
        @endif

        if (first === true && second === true) {
            $('#step-3').addClass('bg-success-c');
            Toastify({
                text: "Możesz dodać produkt do koszyka!",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#4bbf73",
            }).showToast();
            $('#add-to-cart-button').prop('disabled', !(first && second));
        }

        $('input[name="size"]').change(function() {
            price = $(this).data('price-show');
            $('#step-1').addClass('bg-success-c');
            $('#price-show').html(price);
            first = true;
            if (first === true && second === true) {
                $('#step-3').addClass('bg-success-c');
                Toastify({
                    text: "Możesz dodać produkt do koszyka!",
                    duration: 5000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    backgroundColor: "#4bbf73",
                }).showToast();
            } else {}
        });
        $('input[name="grind"]').change(function() {
            $('#step-2').addClass('bg-success-c');
            second = true;
            if (first === true && second === true) {
                $('#step-3').addClass('bg-success-c');
                Toastify({
                    text: "Możesz dodać produkt do koszyka!",
                    duration: 5000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    backgroundColor: "#4bbf73",
                }).showToast();
            } else {}
        });
    });
</script>
@if(Session::has('show-busket'))
<script>
    $(document).ready(function() {
        $('#shopping-cart-container').html('');
        $('#shopping-cart-window').show();
        addProducts();
        window = true;
    });
</script>
@endif
@endsection