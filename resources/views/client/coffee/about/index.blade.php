@extends('layout.coffee')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199493566_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white">O nas</h1>
                    {{ Breadcrumbs::render() }}
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
                            <source src="{{asset('video/video_8.mp4')}}">
                        </video>
                    </div>
                </section>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                        <h3 class="font-custom-2" style="color:#F9CAAC">FIRMA</h3>
                        <h1 class="font-custom">Szerokie spektrum smaków i esencji</h1>
                    </div>
                    <p class="lead text-center">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixin.</p>
                </div>
            </div>
        </div>
        <div class="row p-0 m-0 py-2">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC"><i class="fa-solid fa-mug-hot"></i></h3>
                    <h1 class="font-custom">Ponieważ kochamy kawę</h1>
                    <p class="w-75 lead">Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. </p>
                </div>
            </div>
        </div>
        <div class="row m-0" style="background-color:RGBA(249, 202, 172,0.25);">
            <div class="col-lg-4 col-md-12 mb-lg-0 p-0 m-0">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <img src="{{ asset('image/Depositphotos_86094158_DS.jpg') }}" class="w-100 h-100 img-hover" alt="" />

                    <img src="{{ asset('image/Depositphotos_123317734_DS.jpg') }}" class="w-100 h-100 img-hover" alt="" />
                </div>
            </div>

            <div class="col-lg-4 mb-lg-0 p-0 m-0">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <img src="{{ asset('image/Depositphotos_199823784_DS.jpg') }}" class="w-100 h-100 img-hover" alt="" />

                    <img src="{{ asset('image/tumblr_5d5bebe25ba9df290cf9fd5a291bdc3d_a17f76db_1280.jpg') }}" class="w-100 h-100 img-hover" alt="" />
                </div>
            </div>

            <div class="col-lg-4 mb-lg-0 p-0 m-0">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <img src="{{ asset('image/tumblr_5a3db442661468c1334abb97561f158d_2c5ba144_500.jpeg') }}" class="w-100 h-100 img-hover" alt="" />
                </div>
            </div>
        </div>
        <div class="row p-0 m-0 py-2">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC"><i class="fa-solid fa-mug-saucer"></i></h3>
                    <h1 class="font-custom">Ponieważ kochamy kawę</h1>
                    <p class="w-75 lead">Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker</p>
                </div>
            </div>
        </div>
        <div class="row p-0 m-0" style="background-color:RGBA(249, 202, 172,0.25)">
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center">
                        <h3 class="font-custom-2" style="color:#F9CAAC">SKLEP</h3>
                        <h1 class="font-custom">Szerokie spektrum</h1>
                    </div>
                    <p class="lead text-center">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system.</p>
                </div>
            </div>
            <div class="col-12 col-lg-6 p-0 m-0">
                <section>
                    <div class="container-fluid px-0 position-relative video-container overflow-hidden">
                        <video autoplay loop muted class="w-100 d-block mx-lg-auto img-fluid">
                            <source src="{{asset('video/video_4.mp4')}}">
                        </video>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<!--END PRODUCT-->
@endsection