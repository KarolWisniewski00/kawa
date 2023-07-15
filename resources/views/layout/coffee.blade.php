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
    <section id="nav" class="fixed-top bg-white" style="width: 100vw;">
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
                        <li class="nav-item text-white mx-1 me-5"><a href="" class="text-white" style="text-decoration: none;"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="nav-item text-white mx-1 me-5"><a href="" class="text-white" style="text-decoration: none;"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="nav-item text-white mx-1"><a href="" class="text-white" style="text-decoration: none;"><i class="fa-solid fa-magnifying-glass"></i></a></li>
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
                <ul class="nav col-md-3 justify-content-center align-items-center order-3">
                    <li><a href="{{route('blog')}}" class="nav-link px-2 link-primary">Blog</a></li>
                    <li><a href="{{route('collaboration')}}" class="nav-link px-2 link-primary">Współpraca</a></li>
                    <li><a href="{{route('contact')}}" class="nav-link px-2 link-primary">Kontakt</a></li>
                    <li>
                        <div class="dropdown text-end nav-link px-2 link-primary">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('image/undraw_drink_coffee_av1x.svg')}}" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small">
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-right-to-bracket me-2"></i>Logowanie</button></li>
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fa-solid fa-check me-2"></i>Rejestracja</button></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{route('account.user')}}"><i class="fa-solid fa-user me-2"></i>Konto</a></li>
                                <li><a class="dropdown-item" href="{{route('account.order')}}"><i class="fa-solid fa-tag me-2"></i>Zamówienia</a></li>
                                <li><a class="dropdown-item" href="{{route('account.busket')}}"><i class="fa-solid fa-cart-shopping me-2"></i>Koszyk</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-power-off me-2"></i>Wyloguj</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                    <h1 class="fw-bold mb-0 fs-2">Logowanie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Hasło</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Zaloguj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                    <h1 class="fw-bold mb-0 fs-2">Rejestracja</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Imię</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Nazwisko</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Hasło</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Powtórz hasło</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Zarejestruj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <div id="content">
        @yield('content')
    </div>
    <!--FOOTER-->
    <section class="bg-primary">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-5">
                <ul class="nav col-md-3 justify-content-center order-2 order-md-1 mx-auto my-2">
                    <li class="nav-item mx-0"><span class="nav-link px-2 text-white text-center">&copy; 2023 Desinged by Karol Wiśniewski</span></li>
                </ul>
                <a href="/" class="d-flex align-items-center justify-content-center col-12 col-md-auto order-1 order-md-2 mx-auto">
                    <img class="img-fluid" src="{{asset('logo/COFFEESUMMIT-LOGO-BIALE-przezroczyste-tlo.png')}}" style="height: 6em;">
                </a>

                <ul class="nav col-md-3 justify-content-center order-3 mx-auto">
                    <li class="nav-item mx-0"><a href="{{route('policy-priv')}}" class="nav-link px-2 text-white">Polityka prywatności</a></li>
                    <li class="nav-item mx-0"><a href="{{route('policy-cookies')}}" class="nav-link px-2 text-white">Polityka Cookies</a></li>
                    <li class="nav-item mx-0"><a href="{{route('rule')}}" class="nav-link px-2 text-white">Regulamin</a></li>
                    <li class="nav-item mx-0"><a href="{{route('info')}}" class="nav-link px-2 text-white">Informacje wysyłkowe</a></li>
                </ul>
            </footer>
        </div>
    </section>
    <!--END FOOTER-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateMargin() {
                var navHeight = $("#nav").height();
                $("#content").css("margin-top", navHeight);
            }

            updateMargin(); // Aktualizuj margines na początku

            $(window).resize(function() {
                updateMargin(); // Aktualizuj margines przy zmianie rozmiaru okna
            });
        });
    </script>
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>