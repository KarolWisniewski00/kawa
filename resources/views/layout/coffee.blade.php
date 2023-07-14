<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee Summit</title>
    <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/coffee.css')}}">
</head>

<body>
    <!--NAV + HEADER-->
    <section class="fixed-top bg-white">
        <nav class="py-1 bg-primary">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
                    <ul class="nav col-md-3 justify-content-center">
                        <li class="nav-item text-white px-1 text-end"> </li>
                    </ul>
                    <ul class="nav col-md-3 justify-content-center">
                        <li class="nav-item text-white px-1 text-center mx-0">Darmowa wysyłka powyżej 100 PLN</li>
                    </ul>
                    <ul class="nav col-md-3 justify-content-end">
                        <li class="nav-item text-white px-1"><a href="" class="text-white" style="text-decoration: none;"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="nav-item text-white px-1"><a href="" class="text-white" style="text-decoration: none;"><i class="fa-brands fa-facebook"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-2 mb-2">
                <ul class="nav col-md-3 justify-content-center order-2 order-md-1">
                    <li><a href="{{route('index')}}" class="nav-link px-2 link-primary">Home</a></li>
                    <li><a href="{{route('about')}}" class="nav-link px-2 link-primary">Firma</a></li>
                    <li><a href="{{route('shop')}}" class="nav-link px-2 link-primary">Sklep</a></li>
                </ul>
                <a href="/" class="d-flex align-items-center justify-content-center col-12 col-md-auto order-1 order-md-2">
                    <img class="img-fluid" src="{{asset('logo/COFFEESUMMIT-LOGO-przezroczyste-tlo.png')}}" style="height: 6em;">
                </a>
                <ul class="nav col-md-3 justify-content-center order-3">
                    <li><a href="{{route('blog')}}" class="nav-link px-2 link-primary">Blog</a></li>
                    <li><a href="{{route('collaboration')}}" class="nav-link px-2 link-primary">Współpraca</a></li>
                    <li><a href="{{route('contact')}}" class="nav-link px-2 link-primary">Kontakt</a></li>
                </ul>
            </header>
        </div>
    </section>
    <!--END NAV + HEADER-->
    <!--ALERT-->
    <div class="container">
        @if(Session::has('success'))
        <div>
            <div class="alert alert-success">{{Session::get('success')}}</div>
        </div>
        @endif

        @if(Session::has('fail'))
        <div>
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        </div>
        @endif
    </div>
    <!--END ALERT-->
    @yield('content')
    <!--FOOTER-->
    <section class="bg-primary">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-4">
                <ul class="nav col-md-3 justify-content-center order-2 order-md-1 mx-auto my-2">
                    <li class="nav-item"><span class="nav-link px-2 text-white">&copy; 2023 Desinged by Karol Wiśniewski</span></li>
                </ul>
                <a href="/" class="d-flex align-items-center justify-content-center col-12 col-md-auto order-1 order-md-2 mx-auto">
                    <img class="img-fluid" src="{{asset('logo/COFFEESUMMIT-LOGO-BIALE-przezroczyste-tlo.png')}}" style="height: 6em;">
                </a>

                <ul class="nav col-md-3 justify-content-center order-3 mx-auto">
                    <li class="nav-item"><a href="{{route('policy-priv')}}" class="nav-link px-2 text-white">Polityka prywatności</a></li>
                    <li class="nav-item"><a href="{{route('policy-cookies')}}" class="nav-link px-2 text-white">Polityka Cookies</a></li>
                    <li class="nav-item"><a href="{{route('info')}}" class="nav-link px-2 text-white">Informacje wysyłkowe</a></li>
                </ul>
            </footer>
        </div>
    </section>
    <!--END FOOTER-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>