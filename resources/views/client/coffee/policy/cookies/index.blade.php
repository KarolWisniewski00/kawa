@extends('layout.coffee')
@section('SEO')
<title>Polityka Cookies | Coffee Summit</title>
<meta property="og:title" content="Polityka Cookies | Coffee Summit" />
<meta name="twitter:title" content="Polityka Cookies | Coffee Summit" />
@endsection
@section('content')
<!--PRODUCT-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_190269434_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">Polityka Cookies</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($elements as $element)
                @switch($element->type)
                @case('title')
                <h2 class="font-custom fw-bold">{{$element->content}}</h2>
                @break

                @case('subtitle')
                <h3>{{$element->content}}</h3>
                @break

                @default
                <p class="lead">{{$element->content}}</p>
                @endswitch
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--END PRODUCT-->
@endsection