@extends('layout.coffee')
@section('SEO')
<title>Podsumowanie koszyka | Coffee Summit</title>
<meta property="og:title" content="Podsumowanie koszyka | Coffee Summit" />
<meta name="twitter:title" content="Podsumowanie koszyka | Coffee Summit" />
@endsection
@section('content')
@php
$counter_price = intval($company['price_ship']);
@endphp
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199493482_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">Koszyk</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Koszyk</h1>
                </div>
                @include('client.coffee.module.alert')
                <div class="col-12 mb-4">
                    <div style="overflow:auto;">
                        @if ($cartItems->isEmpty())
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img class="img-fluid" alt="" src="{{asset('image/undraw_shopping_app_flsj.svg')}}">
                            <div class="h4 m-0 p-0 my-3">Twój koszyk jest pusty!</div>
                            <a href="{{route('shop')}}" class="btn btn-primary my-3 btn-lg"><i class="fa-solid fa-cart-shopping me-2"></i>Zrób zakupy</a>
                        </div>
                        @else
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
                                            <div class="fw-bold">Atrybuty</div>
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
                                            <div class="fw-bold">Podsumowanie rekordu</div>
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
                                @php
                                $k = 1;
                                @endphp
                                @foreach ($cartItems as $item)
                                <tr>
                                    <th>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="fw-bold">{{$k}}</div>
                                            @php
                                            $k += 1;
                                            @endphp
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
                                            <div class="fw-bold">@foreach($item->attributes as $attr) {{$attr}} @endforeach</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center align-items-center">
                                            <div class="fw-bold">{{ $item->price }} PLN</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center align-items-center">
                                            <form method="POST" action="{{route('shop.cart.minus', $item->associatedModel)}}">
                                                @csrf
                                                @foreach($sizes as $size)
                                                @if(!empty($item->attributes))
                                                @if($size->name == $item->attributes[0])
                                                <input type="hidden" name="size" value="{{$size->id}}">
                                                @endif
                                                @else
                                                <input type="hidden" name="size" value="0">
                                                @endif
                                                @endforeach
                                                @if(!empty($item->attributes))
                                                <input type="hidden" name="grind" value="{{$item->attributes[1]}}">
                                                @endif
                                                <button type="submit" class="btn btn-sm btn-danger me-2" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                            </form>
                                            <div class="fw-bold">{{ $item->quantity }}</div>
                                            <form method="POST" action="{{route('shop.cart.add', $item->associatedModel)}}">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1">
                                                @foreach($sizes as $size)
                                                @if(!empty($item->attributes))
                                                @if($size->name == $item->attributes[0])
                                                <input type="hidden" name="size" value="{{$size->id}}">
                                                @endif
                                                @else
                                                <input type="hidden" name="size" value="0">
                                                @endif
                                                @endforeach
                                                @if(!empty($item->attributes))
                                                <input type="hidden" name="grind" value="{{$item->attributes[1]}}">
                                                @endif
                                                <button type="submit" class="btn btn-sm btn-success ms-2">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            @php
                                            $counter_price += ($item->quantity*$item->price);
                                            @endphp
                                            <div class="fw-bold">{{ $item->quantity*$item->price }} PLN</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <form method="POST" action="{{route('shop.cart.remove', $item->associatedModel)}}">
                                                @csrf
                                                @foreach($sizes as $size)
                                                @if(!empty($item->attributes))
                                                @if($size->name == $item->attributes[0])
                                                <input type="hidden" name="size" value="{{$size->id}}">
                                                @endif
                                                @else
                                                <input type="hidden" name="size" value="0">
                                                @endif
                                                @endforeach
                                                @if(!empty($item->attributes))
                                                <input type="hidden" name="grind" value="{{$item->attributes[1]}}">
                                                @endif
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');"><i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div>
                        <h1>Podsumowanie koszyka</h1>
                        <ul class="list-group ">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    @if($counter_price >= $company['free_ship'] + intval($company['price_ship']))
                                    @php
                                    $counter_price = $counter_price - $company['price_ship']
                                    @endphp
                                    <div class="fw-bold">Wysyłka InPost darmowa</div>
                                    @else
                                    <div class="fw-bold">Wysyłka InPost + {{ $company['price_ship'] }} PLN</div>
                                    @endif
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Łącznie</div>
                                    {{$counter_price}} PLN
                                </div>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-start align-items-center mt-4">
                            <a href="{{route('account.order.create')}}" class="me-2 btn btn-success fs-6">Przejdź do płatności</a>
                            <a href="{{route('shop')}}" class="btn btn-primary fs-6">Kup coś jeszcze</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection