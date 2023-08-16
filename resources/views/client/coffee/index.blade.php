@extends('layout.coffee')
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
        <video autoplay loop muted class="w-100">
            <source src="{{asset('video/video_11.mp4')}}">
        </video>
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="d-flex flex-column justify-content-center align-items-center text-center">
                <h1 class="font-custom text-white h2" style="min-width: 80vw;">Kawa wysokiej jakości z dostawą pod Twoje drzwi</h1>
                <a href="{{route('shop')}}" class="btn btn-outline-light">Kupuj teraz</a>
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
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">SKLEP</h3>
                    <h1 class="font-custom">Szerokie spektrum smaków i esencji</h1>
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
                            if ($minPrice === null || $variant->price < $minPrice) {
                                $minPrice=$variant->price;
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
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">O NAS</h3>
                    <h1 class="font-custom">Ponieważ kochamy kawę</h1>
                    <p class="w-75 lead">Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{route('about')}}" class="d-flex flex-column justify-content-center align-items-center">
                    <img class="img-fluid" alt="" src="{{asset('image/Depositphotos_86094158_DS.jpg')}}">
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{route('about')}}" class="d-flex flex-column justify-content-center align-items-center">
                    <img class="img-fluid" alt="" src="{{asset('image/Depositphotos_123317734_DS.jpg')}}">
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{route('about')}}" class="d-flex flex-column justify-content-center align-items-center">
                    <img class="img-fluid" alt="" src="{{asset('image/Depositphotos_199823784_DS.jpg')}}">
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
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">BLOG</h3>
                    <h1 class="font-custom">Najbardziej popularne wpisy</h1>
                </div>
            </div>
            @foreach($blogs as $blog)
            <div class="col-6 col-md-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <a href="{{route('blog.show','test')}}" class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('photo/'.$blog->photo)}}">
                            </a>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">{{$blog->created_at}}</h3>
                                <h1 class="font-custom">{{$blog->title}}</h1>
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
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">@nazwa</h3>
                    <h1 class="font-custom">Obserwuj na na Instagramie</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($instagrams as $ig)
            <div class="col-12 col-md-3 mx-auto">
                <a href="{{$ig->url}}" class="d-flex flex-column justify-content-center align-items-center p-2">
                    <img class="img-fluid" alt="" src="{{asset('photo/'.$ig->photo)}}">
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <a href="" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Obsrwuj nas</a>
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
            <div class="col-12 col-md-3 p-5" style="background-color: #F1FAC5;">
                <div class="d-flex flex-column justify-content-center align-items-center p-5">
                    <div class="text-primary text-center h1"><i class="fa-solid fa-box"></i></div>
                    <div class="text-primary text-center font-custom h4 my-2">Wysyłka gratis pod twoje drzwi</div>
                    <p class="text-primary text-center m-0 p-0 my-2">przy zamówieniu pożyżej 66 PLN</p>
                </div>
            </div>
            <div class="col-12 col-md-3 p-5" style="background-color: #F9CAAC;">
                <div class="d-flex flex-column justify-content-center align-items-center p-5">
                    <div class="text-primary text-center h1"><i class="fa-solid fa-heart"></i></div>
                    <div class="text-primary text-center font-custom h4 my-2">Wysyłka gratis pod twoje drzwi</div>
                    <p class="text-primary text-center m-0 p-0 my-2">przy zamówieniu pożyżej 66 PLN</p>
                </div>
            </div>
            <div class="col-12 col-md-3 p-5" style="background-color: #93F7FA;">
                <div class="d-flex flex-column justify-content-center align-items-center p-5">
                    <div class="text-primary text-center h1"><i class="fa-solid fa-leaf"></i></div>
                    <div class="text-primary text-center font-custom h4 my-2">Wysyłka gratis pod twoje drzwi</div>
                    <p class="text-primary text-center m-0 p-0 my-2">przy zamówieniu pożyżej 66 PLN</p>
                </div>
            </div>
            <div class="col-12 col-md-3 p-5" style="background-color: #D8A0FA;">
                <div class="d-flex flex-column justify-content-center align-items-center p-5">
                    <div class="text-primary text-center h1"><i class="fa-solid fa-handshake-angle"></i></div>
                    <div class="text-primary text-center font-custom h4 my-2">Wysyłka gratis pod twoje drzwi</div>
                    <p class="text-primary text-center m-0 p-0 my-2">przy zamówieniu pożyżej 66 PLN</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--INFO-->
@endsection