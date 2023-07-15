@extends('layout.coffee')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_86094158_DS.jpg') }}'); background-size: cover; background-position: center;">
            <div class="d-flex justify-content-between align-items-center my-3 text-center">
                <h1 class="font-custom text-white">Blog</h1>
                {{ Breadcrumbs::render() }}
            </div>
        </div>
        <hr>
    </div>
    <div class="col-12 text-center">
        <div class="d-flex flex-column justify-content-center align-items-center p-5" style="background-image: url('{{ asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg') }}'); background-size: cover; background-position: center;">
            <h1 class="font-custom text-white my-4">Tytuł wpisu</h1>
            <div class="text-white text-start align-self-md-start my-1">Data wpisu: 23.05.2023</div>
        </div>
        <hr>
        <h2 class="font-custom fw-bold">Nagłówek</h2>
        <h3>Mniejszy nagłówek</h3>
        <p class="lead">Paragraf</p>
    </div>
</div>
@endsection