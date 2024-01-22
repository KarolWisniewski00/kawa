@extends('layout.coffee')
@section('SEO')
<title>Coffee Summit sklep z kawą</title>
<meta property="og:title" content="Coffee Summit sklep z kawą" />
<meta name="twitter:title" content="Coffee Summit sklep z kawą" />
<meta name="description" content="Jeśli jesteś miłośnikiem kawy sprawdź naszą ofertę. Sklep online z kawą i dostawą pod twoje drzwi">
<meta property="og:description" content="Jeśli jesteś miłośnikiem kawy sprawdź naszą ofertę. Sklep online z kawą i dostawą pod twoje drzwi" />
<meta name="twitter:description" content="Jeśli jesteś miłośnikiem kawy sprawdź naszą ofertę. Sklep online z kawą i dostawą pod twoje drzwi" />
<meta name="keywords" content="Coffee Summit, coffee summit, palarnia kawy piła, dobra kawa do ekspresu, najlepsza kawa ziarnista do ekspresu, kawa ziarnista 1kg promocja, kawa mielona do ekspresu, kawa do ekspresu ziarnista">
@endsection
@section('content')
<!--VIDEO-->
<style>
    @media (min-width: 768px) {
        .video-container {
            max-height: 100vh;
            /* Dostosuj maksymalną wysokość, aby zmieścić się na komputerze */
        }
    }
</style>
<section class="hero">
    <div class="container-fluid px-0 position-relative video-container overflow-hidden">
        <video autoplay="autoplay" loop="loop" muted="muted" preload="auto" playsinline class="v-size" id="vid">
            <source src="{{asset('video/video_11.mp4')}}" type="video/mp4">
        </video>
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="d-flex flex-column justify-content-center align-items-center text-center m-mt-5">
                <h1 class="font-custom text-white h2" style="min-width: 80vw; text-transform:none!important; font-size: calc(33.6px + 16.4 * ((100vw - 320px) / 880)); font-weight: 500; line-height: 1.1em;">{{ $company['hero_h1'] }}</h1>
                <a href="{{ $company['hero_link'] }}" class="btn btn-outline-light mt-2">{{ $company['hero_button'] }}</a>
            </div>
        </div>
    </div>
</section>
<!--VIDEO-->
<!--SHOP-->
<section>
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-12">
                <a href="{{route('shop')}}" class="d-flex flex-column justify-content-center align-items-center my-3 text-center text-decoration-none">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">{{ $company['shop_home_page'] }}</h3>
                    <h2 class="font-custom h1">{{ $company['shop_home_page_long'] }}</h2>
                </a>
            </div>
            @foreach($products as $product)
            @if($product->visibility_on_website == true)
            <div class="col-12 col-md-4">
                <a href="{{route('shop.product.show', $product->id)}}" class="gsap h-100 d-flex flex-column justify-content-start align-items-center text-decoration-none">
                    @foreach($photos as $photo)
                    @if($photo->product_id == $product->id)
                    @if($photo->order == 1)
                    <div class="d-flex flex-column justify-content-center align-items-center h-75 overflow-hidden">
                        <img src="{{ asset('photo/' . $photo->image_path) }}" alt="{{$product->name}}" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
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
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <a href="{{route('shop')}}" class="btn btn-primary"><i class="fa-solid fa-angles-right me-2"></i>Zobacz więcej</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--ABOUT-->
<section style="background-color:RGBA(249, 202, 172,0.25)">
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-12">
                <a href="{{route('about')}}" class="text-decoration-none d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <div class="mt-5 font-custom-2 h3" style="color:#F9CAAC">{{ $company['about_home_page'] }}</div>
                    <div class="font-custom h1">{{ $company['about_home_page_long'] }}</div>
                    <p class="w-75 lead">{{ $company['about_home_page_paragraf'] }}</p>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{route('about')}}" class="gsap d-flex flex-column justify-content-center align-items-center">
                    <img class="img-fluid" alt="" src="{{asset('photo/'.$company['photo_about_home_page_1'])}}" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{route('about')}}" class="gsap d-flex flex-column justify-content-center align-items-center">
                    <img class="img-fluid" alt="" src="{{asset('photo/'.$company['photo_about_home_page_2'])}}" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{route('about')}}" class="gsap d-flex flex-column justify-content-center align-items-center">
                    <img class="img-fluid" alt="" src="{{asset('photo/'.$company['photo_about_home_page_3'])}}" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                </a>
            </div>
        </div>
    </div>
</section>
<!--ABOUT-->
<!--BLOG-->
@if(count($blogs)>0)
<section>
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-12">
                <a href="{{route('blog')}}" class="text-decoration-none d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <div class="mt-5 font-custom-2 h3" style="color:#F9CAAC">{{ $company['blog_home_page'] }}</div>
                    <div class="font-custom h1">{{ $company['blog_home_page_long'] }}</div>
                </a>
            </div>
            @foreach($blogs as $blog)
            <div class="col-6 col-md-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <a href="{{route('blog.show',$blog)}}" class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="Zdjęcie główne wpisu bloga" src="{{asset('photo/'.$blog->photo)}}" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                            </a>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <div class="text-muted mt-5 font-custom-2 h3">{{$blog->created_at}}</div>
                                <div class="font-custom h1">{{$blog->title}}</div>
                                <p class="d-none d-md-flex lead">{{$blog->start}}</p>
                                <a href="{{route('blog.show',$blog)}}" class="btn btn-primary">
                                    <i class="fa-solid fa-angles-right me-2"></i>Czytaj więcej
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!--BLOG-->
<!--INSTAGRAM-->
@if(count($instagrams)>0)
<section>
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-12">
                <a href="{{ $company['ig_link'] }}" class="text-decoration-none d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <div class="mt-5 font-custom-2 h3" style="color:#F9CAAC">{{ $company['ig_home_page'] }}</div>
                    <div class="font-custom h1">{{ $company['ig_home_page_long'] }}</div>
                </a>
            </div>
        </div>
        <div class="row">
            @foreach($instagrams as $ig)
            <div class="col-12 col-md-3 mx-auto">
                <a href="{{$ig->url}}" class="d-flex flex-column justify-content-center align-items-center p-2">
                    <img class="img-fluid" alt="Zdjęcie instagrama" src="{{asset('photo/'.$ig->photo)}}" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <a href="{{ $company['ig_link'] }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Obsrwuj nas</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--INSTAGRAM-->
<!--INFO-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 p-5" style="background-color: #B79F72;">
                <div class="d-flex flex-column justify-content-center align-items-center p-5">
                    <div class="text-primary text-center h1"><i class="fa-solid fa-box"></i></div>
                    <div class="text-primary text-center font-custom h4 my-2">{{ $company['yellow_home_page'] }}</div>
                    <p class="text-primary text-center m-0 p-0 my-2">{{ $company['yellow_home_page_long'] }}</p>
                </div>
            </div>
            <div class="col-12 col-md-3 p-5" style="background-color: #CDAB9E;">
                <div class="d-flex flex-column justify-content-center align-items-center p-5">
                    <div class="text-primary text-center h1"><i class="fa-solid fa-heart"></i></div>
                    <div class="text-primary text-center font-custom h4 my-2">{{ $company['red_home_page'] }}</div>
                    <p class="text-primary text-center m-0 p-0 my-2">{{ $company['red_home_page_long'] }}</p>
                </div>
            </div>
            <div class="col-12 col-md-3 p-5" style="background-color: #B4AB98;">
                <div class="d-flex flex-column justify-content-center align-items-center p-5">
                    <div class="text-primary text-center h1"><i class="fa-solid fa-leaf"></i></div>
                    <div class="text-primary text-center font-custom h4 my-2">{{ $company['blue_home_page'] }}</div>
                    <p class="text-primary text-center m-0 p-0 my-2">{{ $company['blue_home_page_long'] }}</p>
                </div>
            </div>
            <div class="col-12 col-md-3 p-5" style="background-color: #2D6EA2;">
                <div class="d-flex flex-column justify-content-center align-items-center p-5">
                    <div class="text-primary text-center h1"><i class="fa-solid fa-handshake-angle"></i></div>
                    <div class="text-primary text-center font-custom h4 my-2">{{ $company['violet_home_page'] }}</div>
                    <p class="text-primary text-center m-0 p-0 my-2">{{ $company['violet_home_page_long'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--INFO-->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        //SIDEBAR
        var navHeight = $("#nav").height();
        $("#sidebar").css("margin-top", navHeight);
    });
</script>
@endsection