@extends('layout.coffee')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199493482_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center">
                    <h1 class="font-custom text-white">Zamówienia</h1>
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Zamówienia</h1>
                </div>
                <nav class="py-2 mb-2">
                    <div class="container d-flex flex-wrap">
                        <ul class="nav mx-auto">
                            <li class="nav-item"><a href="{{route('account.user')}}" class="nav-link link-dark px-2"><i class="fa-solid fa-user me-2"></i>Konto</a></li>
                            <li class="nav-item"><a href="{{route('account.order')}}" class="nav-link link-dark px-2"><i class="fa-solid fa-tag me-2"></i>Zamówienia</a></li>
                            <li class="nav-item"><a href="{{route('account.busket')}}" class="nav-link link-dark px-2"><i class="fa-solid fa-cart-shopping me-2"></i>Koszyk</a></li>
                            <li class="nav-item"><a href="" class="nav-link link-dark px-2" onclick="return confirm('Czy na pewno chcesz się wylogować?');"><i class="fa-solid fa-right-from-bracket me-2"></i>Wyloguj</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="col-12" style="overflow:auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">#</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Numer zamówienia</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Cena</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Status</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Data</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Podgląd</div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="6">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="row">
                                            <div class="col-12 offset-md-3 col-md-6">
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                    <img class="img-fluid" alt="" src="{{asset('image/undraw_order_delivered_re_v4ab.svg')}}">
                                                    <div class="h4 m-0 p-0 my-3">Nie znaleziono zamówień!</div>
                                                    <a href="{{route('shop')}}" class="btn btn-primary my-3 btn-lg"><i class="fa-solid fa-cart-shopping me-2"></i>Zrób zakupy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">1</div>
                                    </div>
                                </th>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">123-123</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">100 PLN</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold text-danger">Oczekujące na płatność</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <div class="fw-bold">Data</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div><a href="" class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i></a></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection