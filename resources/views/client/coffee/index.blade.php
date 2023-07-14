@extends('layout.coffee')
@section('content')
<!--VIDEO-->
<section>
    <div class="container-fluid px-0">
        <video autoplay loop muted class="w-100">
            <source src="{{asset('video/video_1.mp4')}}">
        </video>
    </div>
</section>
<!--VIDEO-->
<!--SHOP-->
<section>
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="text-primary mt-5 font-custom-2">SKLEP</h3>
                    <h1 class="font-custom">Szerokie spektrum smaków i esencji</h1>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    <h4 class="font-custom">Mexico Cafeco Bio</h4>
                    <p>14,90 PLN - 50,10 PLN</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <button type="button" class="btn btn-primary">Zobacz więcej</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--ABOUT-->
<section class="bg-primary bg-opacity-25">
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="text-primary mt-5 font-custom-2">O NAS</h3>
                    <h1 class="font-custom">Ponieważ kochamy kawę</h1>
                    <p class="w-75">Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--ABOUT-->
<!--BLOG-->
<section>
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="text-primary mt-5 font-custom-2">BLOG</h3>
                    <h1 class="font-custom">Najbardziej popularne wpisy</h1>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-5">
                            <div class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">1 marca 2022</h3>
                                <h1 class="font-custom">Jakie tu będą wpisy?</h1>
                                <p>
                                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                                </p>
                                <button type="button" class="btn btn-primary">
                                    Czytaj więcej
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-5">
                            <div class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">1 marca 2022</h3>
                                <h1 class="font-custom">Jakie tu będą wpisy?</h1>
                                <p>
                                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                                </p>
                                <button type="button" class="btn btn-primary">
                                    Czytaj więcej
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-5">
                            <div class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">1 marca 2022</h3>
                                <h1 class="font-custom">Jakie tu będą wpisy?</h1>
                                <p>
                                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                                </p>
                                <button type="button" class="btn btn-primary">
                                    Czytaj więcej
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--BLOG-->
<!--INSTAGRAM-->
<section>
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="text-primary mt-5 font-custom-2">@nazwa</h3>
                    <h1 class="font-custom">Obserwuj na na Instagramie</h1>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-flex flex-column justify-content-center align-items-center p-2">
                    <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-flex flex-column justify-content-center align-items-center p-2">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-flex flex-column justify-content-center align-items-center p-2">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-flex flex-column justify-content-center align-items-center p-2">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-flex flex-column justify-content-center align-items-center p-2">
                    <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-flex flex-column justify-content-center align-items-center p-2">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-flex flex-column justify-content-center align-items-center p-2">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-flex flex-column justify-content-center align-items-center p-2">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <button type="button" class="btn btn-primary">Obsrwuj nas</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--INSTAGRAM-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 bg-primary">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    cd
                </div>
            </div>
            <div class="col-3 bg-secondary">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    cd
                </div>
            </div>
            <div class="col-3 bg-dark">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    cd
                </div>
            </div>
            <div class="col-3 bg-white">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    cd
                </div>
            </div>
        </div>
    </div>
</section>
@endsection