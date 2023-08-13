@extends('layout.coffee')
@section('content')
<!--ORDER-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199493482_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white">Zamówienia</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <form class="form text-center my-4" action="{{route('account.order.store')}}" method="POST">
                    <!--TOKEN-->
                    @csrf
                    <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                        <h1>Kasa</h1>
                    </div>
                    @include('client.coffee.module.nav-acc')
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="name" value="{{ old('name') ? old('name') : $user->name}}" name="name" required>
                        <label for="name">Imię i nazwisko</label>
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="email" value="{{ old('email') ? old('email') : $user->email}}" name="email" required>
                        <label for="email">Email</label>
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="company" value="{{ old('company') ? old('company') : ''}}" name="company">
                        <label for="company">Nazwa firmy (opcjonalne)</label>
                        <span class="text-danger">@error('company') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="nip" value="{{ old('nip') ? old('nip') : ''}}" name="nip">
                        <label for="nip">NIP (opcjonalnie)</label>
                        <span class="text-danger">@error('company') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="post" value="{{ old('post') ? old('post') : ''}}" name="post" required>
                        <label for="post">Kod pocztowy</label>
                        <span class="text-danger">@error('post') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="street" value="{{ old('street') ? old('street') : ''}}" name="street" required>
                        <label for="street">Ulica</label>
                        <span class="text-danger">@error('street') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="street_extra" value="{{ old('street_extra') ? old('street_extra') : ''}}" name="street_extra">
                        <label for="street_extra">Ciąg dalszy adresu (opcjonalne)</label>
                        <span class="text-danger">@error('street_extra') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="city" value="{{ old('city') ? old('city') : ''}}" name="city" required>
                        <label for="city">Miasto</label>
                        <span class="text-danger">@error('city') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="phone" value="{{ old('phone') ? old('phone') : ''}}" name="phone" required>
                        <label for="phone">Numer telefonu</label>
                        <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="extra" value="{{ old('extra') ? old('extra') : ''}}" name="extra">
                        <label for="extra">Uwagi dotyczące zamówienia (opcjonalne)</label>
                        <span class="text-danger">@error('extra') {{$message}} @enderror</span>
                    </div>

                    <div class="form-check text-start">
                        <input class="form-check-input" type="checkbox" value="{{ old('rules') ? 'checked' : ''}}" id="rules" required>
                        <label class="form-check-label" for="rules">
                            Oświadczam, że zapoznałem/am się z treścią strony <a href="">regulamin</a>
                        </label>
                    </div>
                    <input type="hidden" name="total" value="">
                    <button class="btn btn-primary my-4" type="submit"><i class="fa-solid fa-credit-card me-2"></i>Kupuję i płacę</button>
                    <a href="{{route('account.busket')}}" class="btn btn-danger my-4" type="button"><i class="fa-solid fa-xmark me-2"></i>Anuluj</a>
                </form>
            </div>
            <div class="col-12 col-md-6" style="overflow:auto;">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Twoje zamówienie</h1>
                </div>
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
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->price }} PLN</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->quantity }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{ $item->quantity*$item->price }} PLN</div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <h4>Podsumowanie koszyka</h4>
                <ul class="list-group ">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Wysyłka PDP + 16 PLN</div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Łącznie</div>
                            16 PLN
                        </div>
                    </li>
                </ul>
                <h4 class="mt-4">Przelew bankowy</h4>
                <p class="text-muted">Prosimy o wpłatę bezpośrednio na nasze konto bankowe.<span class="text-danger"> Proszę użyć numeru zamówienia jako tytuł płatności.</span> Twoje zamówienie zostanie zrealizowane po zaksięgowaniu wpłaty na naszym koncie.</p>
                <p>Twoje dane osobowe zostaną wykorzystane do realizacji Twojego zamówienia oraz do innych celów opisanych w zakładce <a href="">polityka prywatności</a></p>
            </div>
        </div>
    </div>
</section>
<!--END ORDER-->
@endsection