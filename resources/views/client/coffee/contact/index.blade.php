@extends('layout.coffee')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_79160678_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white">Kontakt</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-0 my-5">
        <div class="row p-0 m-0 py-2">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center h-100">
                    <h4 class="font-custom mb-4">Kontakt</h4>
                    <label class="lead mb-4">Masz pytania?</label>
                    <div class="row w-100">
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3 w-100">
                                <input type="text" class="form-control w-100" id="floatingInput">
                                <label for="floatingInput">Imię</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3 w-100">
                                <input type="text" class="form-control w-100" id="floatingInput1">
                                <label for="floatingInput1">Nazwisko</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3 w-100 has-success">
                        <input type="email" class="form-control is-valid" id="floatingInput2">
                        <label for="floatingInput2">Email</label>
                        <div class="valid-feedback">Poprawnie przyjęte dane.</div>
                    </div>
                    <div class="form-floating mb-3 w-100 has-danger">
                        <input type="text" class="form-control is-invalid" id="floatingInput3">
                        <label for="floatingInput3">Numer telefonu</label>
                        <div class="invalid-feedback">Niepoprawne dane.</div>
                    </div>

                    <div class="form-group mb-3 w-100">
                        <label for="exampleTextarea" class="form-label">Wiadomość</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary mb-3 w-100" type="submit">Wyślij</button>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 h-100">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d156389.2073860372!2d20.896391502572982!3d52.23282319946841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecc669a869f01%3A0x72f0be2a88ead3fc!2sWarszawa!5e0!3m2!1spl!2spl!4v1689416360707!5m2!1spl!2spl" class="w-100" style="border:0; aspect-ratio:1/1" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-12 text-center my-5">
                <p class="text-primary h3 m-0 p-0 my-2"><i class="fa-solid fa-location-dot me-2"></i>Al. Jerozolimskie 1 00‑000 Warszawa</p>
                <p class="text-primary h3 m-0 p-0 my-2"><a href="tel:123123123" class="text-decoration-none"><i class="fa-solid fa-phone me-2"></i>123 123 123</a></p>
                <p class="text-primary h3 m-0 p-0 my-2"><a href="mailto:info@przykład.pl" class="text-decoration-none"><i class="fa-solid fa-envelope me-2"></i>info@przykład.pl</a></p>
            </div>
        </div>
    </div>
</section>
<!--END PRODUCT-->
@endsection