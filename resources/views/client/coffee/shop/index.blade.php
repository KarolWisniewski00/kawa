@extends('layout.coffee')
@section('SEO')
<title>Sklep | Coffee Summit</title>
<meta property="og:title" content="Sklep | Coffee Summit" />
<meta name="twitter:title" content="Sklep | Coffee Summit" />
<meta name="keywords" content="kawa, kawa bezkofeinowa, kawa rozpuszczalna, kawa ziarnista, kawę, sklep kawa, kawa ziarnista 1 kg, kawa zbożowa, kawa na prezent, kawa mielona, kawa latte">
@endsection
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
                        @php
                        $count = 0;
                        @endphp
                        @foreach($products as $product)
                        @if($product->visibility_on_website == true)
                        @php
                        $count += 1;
                        @endphp
                        @endif
                        @endforeach
                        Wszystkie produkty <span>{{ $count }}</span>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sortowanie
                        </button>
                        <ul class="dropdown-menu">
                            <li><button id="sort-lowest-price" class="dropdown-item" href="#">Od cen najniższych</button></li>
                            <li><button id="sort-highest-price" class="dropdown-item" href="#">Od cen najwyższych</button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="sort-container" class="row">
                @foreach($products as $product)
                @if($product->visibility_on_website == true)
                <div class="col-12 col-md-4">
                    <a href="{{route('shop.product.show', $product->id)}}" class="h-100 d-flex flex-column justify-content-start align-items-center text-decoration-none">
                        @foreach($photos as $photo)
                        @if($photo->product_id == $product->id)
                        @if($photo->order == 1)
                        <div class="d-flex flex-column justify-content-center align-items-center h-100">
                            <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                        </div>
                        @endif
                        @endif
                        @endforeach
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <h4 class="font-custom mt-2 text-center" style="word-break: break-all;">{{$product->name}}</h4>
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
                @endif
                @endforeach
            </div>
            <div class="col-12 my-2">
                <div class="px-4 py-2">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        // Funkcja do sortowania od najniższej ceny
        $("#sort-lowest-price").click(function() {
            var products = $(".col-12.col-md-4");
            products.sort(function(a, b) {
                var priceA = parseFloat($(a).find("p").text().split(" - ")[0]);
                var priceB = parseFloat($(b).find("p").text().split(" - ")[0]);
                return priceA - priceB;
            });
            $("#sort-container").html(products);
        });

        // Funkcja do sortowania od najwyższej ceny
        $("#sort-highest-price").click(function() {
            var products = $(".col-12.col-md-4");
            products.sort(function(a, b) {
                var priceA = parseFloat($(a).find("p").text().split(" - ")[1]);
                var priceB = parseFloat($(b).find("p").text().split(" - ")[1]);
                return priceB - priceA;
            });
            $("#sort-container").html(products);
        });
    });
</script>

@endsection