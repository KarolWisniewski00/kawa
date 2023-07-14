@extends('layout.coffee')
@section('content')
<!--SHOP-->
<section>
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-12 py-4" style="background-image: url('{{ asset('image/Depositphotos_145612235_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center">
                    <h1 class="font-custom text-white">Sklep</h1>
                            {{ Breadcrumbs::render() }}
                </div>
            </div>
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
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                    <p>14,90 PLN - 50,10 PLN</p>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
            <div class="col-12 my-2">
                @include('client.coffee.module.pagination')
            </div>
        </div>
    </div>
</section>
@endsection