@extends('layout.coffee')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199493482_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center">
                    <h1 class="font-custom text-white">Koszyk</h1>
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Koszyk</h1>
                </div>
                @include('client.coffee.module.nav-acc')
                <div class="col-12 mb-4" style="overflow:auto;">
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
                                        <div class="fw-bold">Zdjęcie</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Nazwa</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">SKU</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Cena</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Ilość</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Łącznie</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Usuń</div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cartItems->isEmpty())
                            <tr>
                                <th colspan="8">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="row">
                                            <div class="col-12 offset-md-3 col-md-6">
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                    <img class="img-fluid" alt="" src="{{asset('image/undraw_shopping_app_flsj.svg')}}">
                                                    <div class="h4 m-0 p-0 my-3">Twój koszyk jest pusty!</div>
                                                    <a href="{{route('shop')}}" class="btn btn-primary my-3 btn-lg"><i class="fa-solid fa-cart-shopping me-2"></i>Zrób zakupy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            @else
                            @foreach ($cartItems as $item)
                            <tr>
                            <th>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">1</div>
                                </div>
                            </th>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    @foreach($photos as $photo)
                                    @if($photo->product_id == $item->associatedModel->id)
                                    @if($photo->order == 1)
                                    <div style="max-width:50px"><img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;"></div>
                                    @endif
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->name }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">SKU</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->price }} PLN</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <form method="POST" action="{{route('account.busket.minus', $item->associatedModel)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger me-2" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </form>
                                    <div class="fw-bold">{{ $item->quantity }}</div>
                                    <form method="POST" action="{{route('account.busket.add', $item->associatedModel)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success ms-2">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->quantity*$item->price }} PLN</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <form method="POST" action="{{route('account.busket.remove', $item->associatedModel)}}">
                                        @csrf
                                        <button href="" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');"><i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div>
                        <h1>Podsumowanie koszyka</h1>
                        <ul class="list-group ">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Wysyłka PDP + 16 PLN</div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Łącznie</div>
                                    200 PLN
                                </div>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-start align-items-center mt-4">
                            <a href="{{route('account.order.create')}}" class="me-2 btn btn-primary"><i class="fa-solid fa-forward me-2"></i>Przejdź do płatności</a>
                            <a href="{{route('shop')}}" class="btn btn-dark"><i class="fa-solid fa-cart-shopping me-2"></i>Kup coś jeszcze</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection