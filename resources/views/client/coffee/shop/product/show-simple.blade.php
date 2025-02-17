@extends('layout.coffee')
@section('SEO')
<title>{{$product->name}} | Coffee Summit</title>
<meta property="og:title" content="{{$product->name}} | Coffee Summit" />
<meta name="twitter:title" content="{{$product->name}} | Coffee Summit" />
<meta name="description" content="{{$product->description}}">
<meta property="og:description" content="{{$product->description}}" />
<meta name="twitter:description" content="{{$product->description}}" />
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

    @media only screen and (max-width: 992px) {
        .single-timeline-area {
            padding-left: 0px;
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
            padding: 0px;
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
                                                                <span class="price-show" id="price-show">{{$product->price_simple}} PLN</span>
                                                            </div>
                                                            <p class="text-muted">{!! $product->description !!}</p>
                                                        </div>
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
                                                            <button type="submit" id="add-to-cart-button" class="btn btn-lg btn-primary w-fit h-100" @if($product->price_simple == null) disabled @endif>
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
                <a href="{{route('shop.product.show', str_replace(' ', '-', $p->name))}}" class="h-100 d-flex flex-column justify-content-start align-items-center text-decoration-none">

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