@extends('layout.coffee')
@section('SEO')
<title>{{$blog->seo_title}} | Coffee Summit</title>
@if( $blog->visibility_in_google == true )
<meta property="og:title" content="{{$blog->seo_title}} | Coffee Summit" />
<meta name="twitter:title" content="{{$blog->seo_title}} | Coffee Summit" />
<meta name="description" content="{{$blog->seo_description}}">
<meta property="og:description" content="{{$blog->seo_description}}" />
<meta name="twitter:description" content="{{$blog->seo_description}}" />
@else
<meta name="robots" content="noindex, nofollow">
@endif
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_86094158_DS.jpg') }}'); background-size: cover; background-position: center;">
            <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                <h1 class="font-custom text-white m-0 p-0">Blog</h1>
            </div>
        </div>
        <hr>
    </div>
</div>
<section>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center p-5" style="background-image: url('{{ asset('photo/'. $blog->photo) }}'); background-size: cover; background-position: center;
        @if($blog->type == null)
        @else
        min-height:20em;
        @endif
        ">
            @if($blog->type == null)
            <h1 class="font-custom text-white my-4">{{$blog->title}}</h1>
            <div class="text-white text-start align-self-md-start my-1">Data wpisu: {{$blog->created_at}}</div>
            @else
            @endif
        </div>
        @if($blog->type == null)
        @else
        <div class="text-start align-self-md-start my-1">{{$blog->created_at}}</div>
        @endif
        <hr>
        <div class="row text-center">
            @if($blog->type == null)
            <div class="col-12">
                <p class="h4 fw-bold">{{$blog->start}}</p>
                <hr>
                <p>{{$blog->content}}</p>
                <hr>
                <p>{{$blog->end}}</p>
            </div>
            @else
            <div class="col-12 text-start">
                <h1 class="h1 fw-bold">{{$blog->title}}</h1>
                <p class="mb-5">{{$blog->start}}</p>

                <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                    <img src="{{ asset('photo/'.$blog->content_photo_1) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                </div>
                <h3>{{$blog->content_text_1}}</h3>
                <p class="mb-5">{{$blog->content_text_2}}</p>

                <h3>{{$blog->content_text_3}}</h3>
                <p class="mb-5">{{$blog->content_text_4}}</p>

                <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100 w-md-50">
                        <img src="{{ asset('photo/'.$blog->content_photo_2) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                    </div>
                    <div class="w-100 w-md-50">
                        <h3>{{$blog->content_text_5}}</h3>
                        <p>{{$blog->content_text_6}}</p>
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">
                    <div class="w-100 w-md-50">
                        <h3>{{$blog->content_text_7}}</h3>
                        <p>{{$blog->content_text_8}}</p>
                    </div>
                    <div class="w-100 w-md-50">
                        <a href="{{route('shop.product.show', 12)}}" class="gsap h-100 d-flex flex-column justify-content-between align-items-center text-decoration-none">
                            <div class="d-flex flex-column justify-content-center align-items-center h-75 overflow-hidden">
                                <img src="{{ asset('photo/169574317966.jpg') }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center h-25">
                                <h4 class="font-custom mt-2 text-center">KRAFTOWA KAWA<br>BRAZYLIA NEBLINA</h4>
                                <p>
                                    12.00 PLN - 99.00 PLN
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <hr>
                <p>{{$blog->end}}</p>
            </div>
            <!--PRODUCTS GRID-->
            <div class="row my-5">
                <div class="col-12">
                    <div class="text-center my-4">
                        <h1>Kraftowe kawy</h1>
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
            @endif
        </div>
    </div>
</section>
@endsection