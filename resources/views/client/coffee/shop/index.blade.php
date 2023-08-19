@extends('layout.coffee')
@section('content')
<!--SHOP-->
<section>
    <div class="container-fluid">
        <div class="row my-5">
            <div class="col-12 py-4" style="background-image: url('{{ asset('image/Depositphotos_145612235_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">Sklep</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pb-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center my-3 text-center">
                    <div class="text-primary">
                        Wszystkie produkty <span>7</span>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sortowanie
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Od cen najniższych</a></li>
                            <li><a class="dropdown-item" href="#">Od cen najwyższych</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @foreach($products as $product)
            <div class="col-12 col-md-4">
                <a href="{{route('shop.product.show', $product->id)}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        @foreach($photos as $photo)
                        @if($photo->product_id == $product->id)
                        @if($photo->order == 1)
                        <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                        @endif
                        @endif
                        @endforeach
                        <h4 class="font-custom mt-2">{{$product->name}}</h4>
                        <p>
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
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-12 my-2">
                <div class="px-4 py-2">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection