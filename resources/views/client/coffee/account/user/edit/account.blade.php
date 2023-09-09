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
                <div class="mb-3"><a href="{{route('account.user')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
                <div class="col-12">
                    <form class="form text-center my-4" action="{{route('account.user.update','account')}}" method="POST">
                        <!--TOKEN-->
                        @csrf
                        @method('PUT')

                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" required>
                            <label for="name">Imię</label>
                            <span class="text-danger">@error('name') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3">
                            <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email" required>
                            <label for="email">Email</label>
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
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