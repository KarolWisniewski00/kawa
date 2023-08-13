@extends('layout.coffee')
@section('content')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199493482_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white">Konto</h1>
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
                <div class="col-12">
                    <!--VIEW-->
                    <ul class="list-group ">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Imię</div>
                                Imie
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Nazwisko</div>
                                Nazwisko
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Email</div>
                                Email
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Hasło</div>
                                ********
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-start align-items-center my-4">
                        <a href="" class="me-2 btn btn-primary"><i class="fa-solid fa-pen-to-square me-2"></i>Edytuj konto</a>
                        <a href="" class="me-2 btn btn-dark"><i class="fa-solid fa-key me-2"></i>Edytuj hasło</a>
                        <a href="" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć to konto?');"><i class="fa-solid fa-trash me-2"></i>Usuń konto</a>
                    </div>
                    <!--END VIEW-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection