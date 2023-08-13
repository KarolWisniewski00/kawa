@extends('layout.coffee')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199823494_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white">{{$product->name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
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
                                <img src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}" alt="studio-photo-main" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-start align-items-start">
                    <h1>Nazwa</h1>
                    <p class="text-muted">{{$product->name}}</p>
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
                                {{$minPrice}} PLN - {{$maxPrice}} PLN
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
                            <input type="radio" class="btn-check" name="options" id="{{$size->id}}" autocomplete="off">
                            <label class="btn btn-outline-primary" for="{{$size->id}}">
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
                            <input type="radio" class="btn-check" name="options" id="{{$grindType->id}}" autocomplete="off">
                            <label class="btn btn-outline-primary" for="{{$grindType->id}}">
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
                        <label for="customRange1" class="form-label">1</label>
                        <input type="range" class="form-range" id="customRange1" value="1" min=1 max=10>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center mb-4 mt-2">
                        <form method="POST" action="{{route('account.busket.add', $product)}}">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-primary w-100 h-100">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div><i class="fa-solid fa-cart-shopping me-2"></i></div>
                                    <div>Dodaj do koszyka</div>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--END PRODUCT-->
        <!--PRODUCTS GRID-->
        <div class="row">
            <div class="col-12">
                <div class="text-center my-4">
                    <h1>Podobne produkty</h1>
                </div>
            </div>
            @foreach($products as $p)
            <div class="col-12 col-md-4">
                <a href="{{route('shop.product.show', $p->id)}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        @foreach($photos as $photo)
                        @if($photo->product_id == $p->id)
                        @if($photo->order == 1)
                        <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                        @endif
                        @endif
                        @endforeach
                        <h4 class="font-custom mt-2">{{$p->name}}</h4>
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
</script>
@endsection