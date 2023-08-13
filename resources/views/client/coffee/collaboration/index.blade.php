@extends('layout.coffee')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_190789690_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white">Wspólpraca</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="row p-0 m-0" style="background-color:RGBA(249, 202, 172,0.25)">
            <div class="col-12 col-lg-6 p-0 m-0">
                <style>
                    @media (min-width: 768px) {
                        .video-container {
                            max-height: 40em;
                            /* Dostosuj maksymalną wysokość, aby zmieścić się na komputerze */
                        }
                    }
                </style>
                <section>
                    <div class="container-fluid px-0 position-relative video-container overflow-hidden">
                        <video autoplay loop muted class="w-100 d-block mx-lg-auto img-fluid">
                            <source src="{{asset('video/video_9.mp4')}}">
                        </video>
                    </div>
                </section>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                        <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">WSPÓŁPRACA</h3>
                        <h1 class="font-custom">Oferta dla firm</h1>
                    </div>
                    <p class="lead text-center">Najlepsza kawa w Twojej restauracji, kawiarni, cukierni, biurze, hotelu. Jesteśmy sprawdzonym i rzetelnym partnerem biznesu.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center h-100">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">Dlaczego my?</h3>
                    <h1 class="font-custom">Najwyższa jakość kawy dla twoich gości</h1>
                    <p class="w-75 lead">Własna palarnia kawy, najlepszy sprzęt i wyjątkowy zespół, kawa wypalana przez Vice Mistrza Polski Coffee Roasting 2018. Zauważalna różnica jakości, którą gwarantujemy wyróżni twój biznes w oczach gości i pracowników.</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 h-100">
                    <img alt="" src="{{asset('image/undraw_barista_at0v.svg')}}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 order-1 order-md-2">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center h-100">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">Dlaczego my?</h3>
                    <h1 class="font-custom">Najwyższa jakość kawy dla twoich gości</h1>
                    <p class="w-75 lead">Własna palarnia kawy, najlepszy sprzęt i wyjątkowy zespół, kawa wypalana przez Vice Mistrza Polski Coffee Roasting 2018. Zauważalna różnica jakości, którą gwarantujemy wyróżni twój biznes w oczach gości i pracowników.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 order-2 order-md-1">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 h-100">
                    <img alt="" src="{{asset('image/undraw_coffee_with_friends_3cbj.svg')}}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="px-0 my-5">
            <div class="row p-0 m-0 py-2">
                <div class="col-12 col-md-6">
                    <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center h-100">
                        <h4 class="font-custom mb-4">Porozmawiajmy o współpracy</h4>
                        <label class="lead mb-4">Masz pytania? Chcesz jak najszybciej wystartować? Prześlij nam swoje dane kontaktowe. Odpiszemy / oddzwonimy w ciągu jednego dnia.</label>
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
                        <img alt="" src="{{asset('image/undraw_at_work_re_qotl.svg')}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
</section>
<!--END PRODUCT-->
@endsection