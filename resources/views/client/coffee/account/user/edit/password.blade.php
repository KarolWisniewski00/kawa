@extends('layout.coffee')
@section('content')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199493482_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <div class="font-custom text-white m-0 p-0 h1">Konto</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Konto</h1>
                </div>
                @include('client.coffee.module.nav-acc')
                @include('client.coffee.module.alert')
                <div>
                    <div class="alert alert-warning">Uwaga, przy zmianie hasła następuje wylogowanie.</div>
                </div>
                <div class="mb-3"><a href="{{route('account.user')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
                <div class="col-12">
                    <form class="form text-center my-4" action="{{route('account.user.update','password')}}" method="POST">
                        <!--TOKEN-->
                        @csrf
                        @method('PUT')
                        <div class="form-floating my-3">
                            <input type="password" class="form-control" id="password_old" name="password_old">
                            <label for="password_old">Aktualne hasło</label>
                            <span class="text-danger">@error('password_old') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3">
                            <input type="password" class="form-control" id="password" name="password">
                            <label for="password">Nowe hasło</label>
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3">
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                            <label for="password_confirm">Powtórz nowe hasło</label>
                            <span class="text-danger">@error('password_confirm') {{$message}} @enderror</span>
                        </div>

                        <div class="d-flex justify-content-start align-items-center mt-4">
                            <button class="btn btn-primary me-2" type="submit"><i class="fa-solid fa-floppy-disk me-2"></i>Zapisz</button>
                            <a href="{{route('account.user')}}" class="btn btn-danger"><i class="fa-solid fa-xmark me-2"></i>Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection