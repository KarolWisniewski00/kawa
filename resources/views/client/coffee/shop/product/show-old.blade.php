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
            <div class="col-12 col-lg-6">
                <button type="button" class="p-0 m-0 mb-3 border-0 d-flex align-items-center justify-content-center bg-transparent overflow-hidden" id="button-studio-photo-main" data-bs-toggle="modal" data-bs-target="#studio-photo-main">
                    @foreach($photos as $photo)
                    @if($photo->product_id == $product->id)
                    @if($photo->order == 1)
                    <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                    @endif
                    @endif
                    @endforeach
                </button>
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
                        <h1>{{$product->name}}</h1>
                        <div class="d-flex flex-column justify-content-start align-items-start my-2">
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
                                    <span class="price-show">{{$minPrice}} PLN - {{$maxPrice}} PLN</span>
                                    @else
                                    Brak dostępnych cen.
                                    @endif
                            </div>
                        </div>
                        <p class="fw-bold mt-4">Wybierz rozmiar opakowania</p>
                        <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                            @foreach($sizes as $size)
                            @foreach($variants as $variant)
                            @if($size->id == $variant->size_id)
                            @if($product->id == $variant->product_id)
                            <div class="m-2">
                                <input type="radio" class="btn-check" name="size" value="{{$size->id}}" id="size-{{$size->id}}">
                                <label class="btn btn-outline-primary" for="size-{{$size->id}}">
                                    <div class="flex flex-column justify-content-center align-items-center">
                                        <div>{{$size->name}}</div>
                                        <div>{{$variant->price}} PLN</div>
                                    </div>
                                </label>
                            </div>
                            @endif
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                        <p class="fw-bold mt-4">Wybierz rodzaj mielenia</p>
                        <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                            @foreach($grindTypes as $grindType)
                            @foreach($variants as $variant)
                            @if($grindType->id == $variant->grinding_id)
                            @if($product->id == $variant->product_id)
                            <div class="m-2">
                                <input type="radio" class="btn-check" name="grind" value="{{$grindType->name}}" id="grind-{{$grindType->id}}">
                                <label class="btn btn-outline-primary" for="grind-{{$grindType->id}}">
                                    <div class="flex flex-column justify-content-center align-items-center">
                                        <div>{{$grindType->name}}</div>
                                        <div>{{$grindType->usage_information}}</div>
                                    </div>
                                </label>
                            </div>
                            @endif
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                        <p class="fw-bold mt-4">Ilość</p>
                        <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                            <label for="quantity" class="form-label">1</label>
                            <input type="range" class="form-range" id="quantity" name="quantity" value="1" min=1 max=35>
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center mb-4 mt-2">
                            @csrf
                            <button type="submit" id="add-to-cart-button" class="btn btn-lg btn-primary w-fit h-100" disabled>
                                <div class="d-flex justify-content-start align-items-center">
                                    <div><i class="fa-solid fa-cart-shopping me-2"></i></div>
                                    <div>Dodaj do koszyka</div>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 text-center my-4">
                <div class="text-center my-4">
                    <h1>Opis produktu</h1>
                </div>
                <p class="text-muted">{{$product->description}}</p>
            </div>
            <div class="col-12 text-center my-4">
                <div class="d-flex flex-xl-row flex-column justify-content-center align-items-center gap-4 mt-5 h-100">
                @if($product->id != 11)
                @if($product->height)
                <div class="d-flex flex-column justify-content-end align-items-center gap-2 h-100">
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2 p-4">
                            <img alt="" class="h-auto w-100"  src="{{asset('image/montain.svg')}}">
                        </div>
                        <p class="h5 my-3">Wysokość uprawy {{$product->height}} m n.p.m.</p>
                        </div>
                        @endif
                    <div class="d-flex flex-column justify-content-end align-items-center gap-2 h-100">
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2 p-4">
                        @for($i = 0; $i <= 3; $i++)
                            @if($product->coffee <= $i)
                            <img alt="" class="h-auto" style="width: 50px;" src="{{asset('image/coffee_bean_empty.svg')}}">
                            @else
                            <img alt="" class="h-auto" style="width: 50px;" src="{{asset('image/coffee_bean_fill.svg')}}">
                            @endif
                        @endfor
                        </div>
                        <p class="h5 my-3">Stopień wypalenia</p>
                        </div>
                    <div class="d-flex flex-column justify-content-end align-items-center gap-2 h-100">
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2 p-4">
                        @for($i = 0; $i <= 3; $i++)
                            @if($product->tool <= $i)
                            <img alt="" class="h-auto" style="width: 50px;" src="{{asset('image/tool_bean_empty.svg')}}">
                            @else
                            <img alt="" class="h-auto" style="width: 50px;" src="{{asset('image/tool_bean_fill.svg')}}">
                            @endif
                        @endfor
                        </div>
                        <p class="h5 my-3">Intensywność smaku</p>
                    </div>
                    <div class="d-flex flex-column justify-content-end align-items-center gap-2 h-100">
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2 p-4">
                        @for($i = 0; $i <= 3; $i++)
                            @if($product->lemon <= $i)
                            <img alt="" class="h-auto" style="width: 50px;" src="{{asset('image/lemon_bean_empty.svg')}}">
                            @else
                            <img alt="" class="h-auto" style="width: 50px;" src="{{asset('image/lemon_bean_fill.svg')}}">
                            @endif
                        @endfor
                        </div>
                        <p class="h5 my-3">kwasowość</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!--END PRODUCT-->
        <!--PRODUCTS GRID-->
        <div class="row my-5">
            <div class="col-12">
                <div class="text-center my-4">
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