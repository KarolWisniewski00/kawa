@extends('layout.coffee')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199823784_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center">
                    <h1 class="font-custom text-white">Blog</h1>
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
            <div class="col-6 col-md-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-12 col-md-5">
                                <a href="{{route('blog.show','test')}}" class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('image/tumblr_1bd8c3de5a5dbeb95701cd89b83e5afe_0ed295b8_500.jpeg')}}">
                            </a>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">1 marca 2022</h3>
                                <h1 class="font-custom">Jakie tu będą wpisy?</h1>
                                <p class="d-none d-md-flex lead">
                                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                                </p>
                                <a href="{{route('blog.show','test')}}" class="btn btn-primary">
                                    <i class="fa-solid fa-angles-right me-2"></i>Czytaj więcej
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-12 col-md-5">
                                <a href="{{route('blog.show','test')}}" class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('image/tumblr_1bd8c3de5a5dbeb95701cd89b83e5afe_0ed295b8_500.jpeg')}}">
                            </a>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">1 marca 2022</h3>
                                <h1 class="font-custom">Jakie tu będą wpisy?</h1>
                                <p class="d-none d-md-flex lead">
                                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                                </p>
                                <a href="{{route('blog.show','test')}}" class="btn btn-primary">
                                    <i class="fa-solid fa-angles-right me-2"></i>Czytaj więcej
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-12 col-md-5">
                                <a href="{{route('blog.show','test')}}" class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('image/tumblr_1bd8c3de5a5dbeb95701cd89b83e5afe_0ed295b8_500.jpeg')}}">
                            </a>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">1 marca 2022</h3>
                                <h1 class="font-custom">Jakie tu będą wpisy?</h1>
                                <p class="d-none d-md-flex lead">
                                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                                </p>
                                <a href="{{route('blog.show','test')}}" class="btn btn-primary">
                                    <i class="fa-solid fa-angles-right me-2"></i>Czytaj więcej
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-12 col-md-5">
                                <a href="{{route('blog.show','test')}}" class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('image/tumblr_1bd8c3de5a5dbeb95701cd89b83e5afe_0ed295b8_500.jpeg')}}">
                            </a>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">1 marca 2022</h3>
                                <h1 class="font-custom">Jakie tu będą wpisy?</h1>
                                <p class="d-none d-md-flex lead">
                                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                                </p>
                                <a href="{{route('blog.show','test')}}" class="btn btn-primary">
                                    <i class="fa-solid fa-angles-right me-2"></i>Czytaj więcej
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-12 col-md-5">
                                <a href="{{route('blog.show','test')}}" class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('image/tumblr_1bd8c3de5a5dbeb95701cd89b83e5afe_0ed295b8_500.jpeg')}}">
                            </a>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">1 marca 2022</h3>
                                <h1 class="font-custom">Jakie tu będą wpisy?</h1>
                                <p class="d-none d-md-flex lead">
                                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                                </p>
                                <a href="{{route('blog.show','test')}}" class="btn btn-primary">
                                    <i class="fa-solid fa-angles-right me-2"></i>Czytaj więcej
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-12 col-md-5">
                                <a href="{{route('blog.show','test')}}" class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('image/tumblr_1bd8c3de5a5dbeb95701cd89b83e5afe_0ed295b8_500.jpeg')}}">
                            </a>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">1 marca 2022</h3>
                                <h1 class="font-custom">Jakie tu będą wpisy?</h1>
                                <p class="d-none d-md-flex lead">
                                    Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker
                                </p>
                                <a href="{{route('blog.show','test')}}" class="btn btn-primary">
                                    <i class="fa-solid fa-angles-right me-2"></i>Czytaj więcej
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-2">
                @include('client.coffee.module.pagination')
            </div>
        </div>
    </div>
</section>
<!--END PRODUCT-->
@endsection