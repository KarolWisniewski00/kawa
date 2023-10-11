@extends('layout.coffee')
@section('SEO')
<title>Wspólpraca | Coffee Summit</title>
<meta property="og:title" content="Wspólpraca | Coffee Summit" />
<meta name="twitter:title" content="Wspólpraca | Coffee Summit" />
@endsection
@section('content')
<!--PRODUCT-->
<section>
    @include('client.coffee.module.alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_190789690_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">Współpraca</h1>
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
                        <video autoplay="autoplay" loop="loop" muted="muted" preload="auto" playsinline class="w-100 d-block mx-lg-auto img-fluid">
                            <source src="{{asset('video/video_9.mp4')}}" type="video/mp4">
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
                    <form action="{{ route('contact.store') }}" method="POST" class="d-flex flex-column justify-content-center align-items-center my-3 text-center h-100">
                        @csrf
                        <h4 class="font-custom mb-4">{{ $company['contact_collaboration_page'] }}</h4>
                        <label class="lead mb-4">{{ $company['contact_collaboration_page_long'] }}</label>
                        <div class="row w-100">
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3 w-100 @error('name') has-danger @enderror">
                                    <input type="text" class="form-control w-100 @error('name') is-invalid @enderror" name="name" id="name">
                                    <label for="name">Imię</label>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating mb-3 w-100 @error('surname') has-danger @enderror">
                                    <input type="text" class="form-control w-100 @error('surname') is-invalid @enderror" name="surname" id="surname">
                                    <label for="surname">Nazwisko</label>
                                    @error('surname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3 w-100 @error('email') has-danger @enderror">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                            <label for="email">Email</label>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 w-100 @error('phone') has-danger @enderror">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                            <label for="phone">Numer telefonu</label>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 w-100 @error('message') has-danger @enderror">
                            <label for="message" class="form-label">Wiadomość</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3"></textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary mb-3 w-100" type="submit">Wyślij</button>
                    </form>
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