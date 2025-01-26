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
            <!--Liczenie kategorii-->
            @php
            $count = 0;
            @endphp
            @foreach($categories as $category)
            @php
            $count += 1;
            @endphp
            @endforeach
            <!--Liczenie kategorii-->

            @if($count == 0)
            @else
            <div class="col-12 col-md-3">
                <h2 class="font-custom h1 pb-4">Kategorie</h2>
                @foreach($categories as $category)
                @if($category->parent_id == null)

                <!--Liczenie produktów-->
                @php
                $count = 0;
                @endphp
                @foreach($products as $product)
                @foreach($product->categories as $category_product)
                @if($category_product->id == $category->id)
                @if($product->visibility_on_website == true)
                @php
                $count += 1;
                @endphp
                @endif
                @endif
                @endforeach
                @endforeach
                <!--Liczenie produktów-->

                <button type="button" class="pb-2 m-0 cat-btn nav-link link-primary" data-category-id="{{ $category->id }}">{{ $category->name }}<span>({{$count}})</span></button>
                @foreach($categories as $cat)
                @if($cat->parent_id == $category->id)

                <!--Liczenie produktów-->
                @php
                $count = 0;
                @endphp
                @foreach($products as $product)
                @foreach($product->categories as $category_product)
                @if($category_product->id == $cat->id)
                @if($product->visibility_on_website == true)
                @php
                $count += 1;
                @endphp
                @endif
                @endif
                @endforeach
                @endforeach
                <!--Liczenie produktów-->

                <button type="button" class="ms-4 pb-2 cat-btn nav-link link-primary" data-category-id="{{ $cat->id }}">{{ $cat->name }}<span>({{$count}})</span></button>
                @foreach($categories as $c)
                @if($c->parent_id == $cat->id)

                <!--Liczenie produktów-->
                @php
                $count = 0;
                @endphp
                @foreach($products as $product)
                @foreach($product->categories as $category_product)
                @if($category_product->id == $c->id)
                @if($product->visibility_on_website == true)
                @php
                $count += 1;
                @endphp
                @endif
                @endif
                @endforeach
                @endforeach
                <!--Liczenie produktów-->

                <button type="button" class="ms-4 ps-4 pb-2 cat-btn nav-link link-primary" data-category-id="{{ $c->id }}">{{ $c->name }}<span>({{$count}})</span></button>
                @endif
                @endforeach
                @endif
                @endforeach
                @endif
                @endforeach
            </div>
            @endif

            <!--Liczenie kategorii-->
            @php
            $count = 0;
            @endphp
            @foreach($categories as $category)
            @php
            $count += 1;
            @endphp
            @endforeach
            <!--Liczenie kategorii-->

            @if($count == 0)
            <div class="col-12">
                @else
                <div class="col-12 col-md-9">
                    @endif
                    <div id="sort-container" class="row">
                        @foreach($products as $product)
                        @if($product->visibility_on_website == true)
                        <div class="col-12 col-md-4 product-item" data-category-id="@foreach($product->categories as $pc){{ $pc->id }},@endforeach">
                            <a href="{{route('shop.product.show', $product->id)}}" class="h-100 d-flex flex-column justify-content-between align-items-center text-decoration-none">
                                @foreach($photos as $photo)
                                @if($photo->product_id == $product->id)
                                @if($photo->order == 1)
                                <div class="d-flex flex-column justify-content-center align-items-center h-75 overflow-hidden">
                                    <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                                </div>
                                @endif
                                @endif
                                @endforeach
                                <div class="d-flex flex-column justify-content-center align-items-center h-25">
                                    <h4 class="font-custom mt-2 text-center">{{$product->name}}</h4>
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
                                            @if($product->price_simple != null)
                                            {{$product->price_simple}} PLN
                                            @elseif($minPrice !== null && $maxPrice !== null)
                                            @if($minPrice == $maxPrice)
                                            {{$minPrice}} PLN
                                            @else
                                            {{$minPrice}} PLN - {{$maxPrice}} PLN
                                            @endif
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
                var priceA = parseFloat($(a).find("p").text().split(" - ")[0]) || parseFloat($(a).find("p").text());
                var priceB = parseFloat($(b).find("p").text().split(" - ")[0]) || parseFloat($(b).find("p").text());
                return priceA - priceB;
            });
            $("#sort-container").html(products);
        });

        // Funkcja do sortowania od najwyższej ceny
        $("#sort-highest-price").click(function() {
            var products = $(".col-12.col-md-4");
            products.sort(function(a, b) {
                var priceA = parseFloat($(a).find("p").text().split(" - ")[1]) || parseFloat($(a).find("p").text());
                var priceB = parseFloat($(b).find("p").text().split(" - ")[1]) || parseFloat($(b).find("p").text());
                return priceB - priceA;
            });
            $("#sort-container").html(products);
        });

        // Funkcja do filtrowania produktów według kategorii
        $(".cat-btn").click(function() {
            var categoryId = $(this).data("category-id"); // ID wybranej kategorii
            $(".cat-btn").css("font-weight", "normal"); // Resetuj styl przycisków
            $(this).css("font-weight", "bold"); // Wyróżnij wybrany przycisk

            var products = $(".product-item"); // Wszystkie produkty

            products.each(function() {
                var categoryIds = $(this).data("category-id").toString().split(","); // Pobierz listę kategorii produktu
                if (categoryIds.includes(categoryId.toString())) {
                    $(this).show(); // Pokaż produkt, jeśli ID kategorii pasuje
                } else {
                    $(this).hide(); // Ukryj w przeciwnym wypadku
                }
            });
        });
    });
</script>
@endsection