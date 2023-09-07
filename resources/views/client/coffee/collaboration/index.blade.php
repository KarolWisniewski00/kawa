@extends('layout.coffee')
@section('SEO')
<title>Wspólpraca | Coffee Summit</title>
<meta property="og:title" content="Wspólpraca | Coffee Summit" />
<meta name="twitter:title" content="Wspólpraca | Coffee Summit" />
@endsection
@section('content')
<!--PRODUCT-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_190789690_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">Wspólpraca</h1>
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
                        <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">{{ $company['collaboration_page'] }}</h3>
                        <h1 class="font-custom">{{ $company['collaboration_page_long'] }}</h1>
                    </div>
                    <p class="lead text-center">{{ $company['collaboration_page_paragraf'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center h-100">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">{{ $company['why_collaboration_page'] }}</h3>
                    <h1 class="font-custom">{{ $company['why_collaboration_page_long'] }}</h1>
                    <p class="w-75 lead">{{ $company['why_collaboration_page_paragraf pod filmikiem'] }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 h-100">
                    <img alt="" src="{{asset('photo/'.$company['photo_collaboration_page_1'])}}" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 order-1 order-md-2">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center h-100">
                    <h3 class="mt-5 font-custom-2" style="color:#F9CAAC">{{ $company['over_collaboration_page'] }}</h3>
                    <h1 class="font-custom">{{ $company['over_collaboration_page_long'] }}</h1>
                    <p class="w-75 lead">{{ $company['over_collaboration_page_paragraf'] }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6 order-2 order-md-1">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 h-100">
                    <img alt="" src="{{asset('photo/'.$company['photo_collaboration_page_2'])}}" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                </div>
            </div>
        </div>
        <div class="px-0 my-5">
            <div class="row p-0 m-0 py-2">
                <div class="col-12 col-md-6">
                    <div class="d-flex flex-column justify-content-center align-items-center my-3 text-center h-100">
                        <h4 class="font-custom mb-4">{{ $company['contact_collaboration_page'] }}</h4>
                        <label class="lead mb-4">{{ $company['contact_collaboration_page_long'] }}</label>
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
                        <img alt="" src="{{asset('photo/'.$company['photo_collaboration_page_3'])}}" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                    </div>
                </div>
            </div>
        </div>
</section>
<!--END PRODUCT-->
@endsection