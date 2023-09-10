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
        <div class="d-flex flex-column justify-content-center align-items-center p-5" style="background-image: url('{{ asset('photo/'. $blog->photo) }}'); background-size: cover; background-position: center;">
            <h1 class="font-custom text-white my-4">{{$blog->title}}</h1>
            <div class="text-white text-start align-self-md-start my-1">Data wpisu: {{$blog->created_at}}</div>
        </div>
        <hr>
        <div class="row text-center">
            <div class="col-12">
                <p class="h4 fw-bold">{{$blog->start}}</p>
                <hr>
                <p>{{$blog->content}}</p>
                <hr>
                <p>{{$blog->end}}</p>
            </div>
        </div>
    </div>
</section>
@endsection