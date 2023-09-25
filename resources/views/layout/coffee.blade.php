<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Karol Wiśniewski">
    <meta name="robots" content="index, follow, max-image-preview:large" />
    <meta property="og:locale" content="pl_PL" />
    <link rel="icon" href="{{asset('logo/COFFEESUMMIT-LOGO-przezroczyste-tlo.png')}}" type="image/png">
    <link rel="apple-touch-icon" href="{{asset('logo/COFFEESUMMIT-LOGO-przezroczyste-tlo.png')}}">
    <meta name="base-url" content="https://coffeesummit.pl/">
    <link rel="canonical" href="https://coffeesummit.pl/">
    <meta property="og:url" content="https://coffeesummit.pl/">
    <meta property="og:site_name" content="Coffee Summit" />
    <meta property="og:type" content="article" />
    <meta name="twitter:card" content="summary" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee Summit</title>
    <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/coffee.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--SEO-->
    @yield('SEO')
</head>

<body>
    <!--NAV + HEADER-->
    <section id="nav" class="fixed-top bg-secondary bg-trans" style="width: 100vw;">
        <header class="py-1 bg-primary">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
                    <ul class="nav col-md-3 justify-content-center">
                        <li class="nav-item text-white px-1 text-end"> </li>
                    </ul>
                    <ul class="nav col-md-4 justify-content-center">
                        <li class="nav-item text-white px-1 text-center mx-0 font-custom-1 ws">{{ $company['info_top_website'] }}</li>
                    </ul>
                    <ul class="nav col-md-3 justify-content-end">
                        <li class="nav-item text-white mx-1 me-5"><a href="{{ $company['ig_link'] }}" class="text-white" style="text-decoration: none;"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="nav-item text-white mx-1"><a href="{{ $company['fb_link'] }}" class="text-white" style="text-decoration: none;"><i class="fa-brands fa-facebook"></i></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="container-fluid position-relative" style="padding-left: 6em; padding-right: 6em;">
            <nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-xl-between py-2 mb-2">
                <ul class="nav d-flex d-xl-none position-absolute top-0 end-0">
                    <li>
                        <button class="nav-link link-primary link-change" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </li>
                </ul>
                <div class="collapse order-5" id="collapseExample">
                    <ul class="nav col-xl-12 justify-content-center bg-secondary">
                        <li><a href="{{route('about')}}" class="nav-link px-2 link-primary text-black" style="font-family: 'Montserrat', sans-serif !important;">O nas</a></li>
                        <li><a href="{{route('blog')}}" class="nav-link px-2 link-primary text-black" style="font-family: 'Montserrat', sans-serif !important;">Blog</a></li>
                        <li><a href="{{route('shop')}}" class="nav-link px-2 link-primary text-black" style="font-family: 'Montserrat', sans-serif !important;">Sklep</a></li>
                    </ul>
                    <ul class="nav col-xl-12 justify-content-center align-items-center bg-secondary">
                        <li><a href="{{route('collaboration')}}" class="nav-link px-2 link-primary text-black" style="font-family: 'Montserrat', sans-serif !important;">Współpraca</a></li>
                        <li><a href="{{route('contact')}}" class="nav-link px-2 link-primary text-black" style="font-family: 'Montserrat', sans-serif !important;">Kontakt</a></li>
                        <li>
                            <div class="dropdown text-center nav-link px-2 link-primary bg-secondary">
                                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('image/undraw_drink_coffee_av1x.svg')}}" alt="logo coffee summit" width="32" height="32" class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu text-small">
                                    @auth
                                    <li><a class="dropdown-item" href="{{route('account.user')}}"><i class="fa-solid fa-user me-2"></i>Konto</a></li>
                                    <li><a class="dropdown-item" href="{{route('account.order')}}"><i class="fa-solid fa-tag me-2"></i>Zamówienia</a></li>
                                    <li><a class="dropdown-item" href="{{route('account.busket')}}"><i class="fa-solid fa-cart-shopping me-2"></i>Koszyk</a></li>
                                    <form method="POST" action="{{ route('logout') }}" x-data>@csrf<li><button type="submit" class="dropdown-item"><i class="fa-solid fa-power-off me-2"></i>Wyloguj</button></li>
                                    </form>
                                    @can('admin dashboard')
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('dashboard')}}"><i class="fa-solid fa-toolbox me-2"></i>Panel Admina</a></li>
                                    @endcan
                                    @else
                                    <li><a href="{{route('login')}}" class="dropdown-item"><i class="fa-solid fa-right-to-bracket me-2"></i>Logowanie</a></li>
                                    <li><a href="{{route('register')}}" class="dropdown-item"><i class="fa-solid fa-check me-2"></i>Rejestracja</a></li>
                                    @endauth
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="nav col-xl-5 justify-content-center order-2 order-xl-1 d-none d-xl-flex">
                    <li class="mx-3"><a href="{{route('about')}}" class="nav-link px-0 link-primary font-custom-1">O nas</a></li>
                    <li class="mx-3"><a href="{{route('blog')}}" class="nav-link px-0 link-primary font-custom-1">Blog</a></li>
                    <li class="mx-3"><a href="{{route('shop')}}" class="nav-link px-0 link-primary font-custom-1">Sklep</a></li>
                </ul>
                <a href="{{route('index')}}" class="d-flex align-items-center justify-content-center col-12 col-xl-auto order-1 order-xl-2">
                    <img id="logo" class="img-fluid l-size" src="{{asset('logo/COFFEESUMMIT-LOGO-przezroczyste-tlo.png')}}">
                </a>
                <ul class="nav col-xl-5 justify-content-center align-items-center order-3 d-none d-xl-flex flex-nowrap">
                    <li class="mx-3"><a href="{{route('collaboration')}}" class="nav-link px-0 link-primary font-custom-1">Współpraca</a></li>
                    <li class="mx-3"><a href="{{route('contact')}}" class="nav-link px-0 link-primary font-custom-1">Kontakt</a></li>
                    <li class="mx-3">
                        <div class="dropdown text-end nav-link px-0 link-primary">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('image/coffee-beans.png')}}" alt="logo coffee summit" width="32" height="32" class="rounded-circle d-inline">
                            </a>
                            <ul class="dropdown-menu text-small">
                                @auth
                                <li><a class="dropdown-item" href="{{route('account.user')}}"><i class="fa-solid fa-user me-2"></i>Konto</a></li>
                                <li><a class="dropdown-item" href="{{route('account.order')}}"><i class="fa-solid fa-tag me-2"></i>Zamówienia</a></li>
                                <li><a class="dropdown-item" href="{{route('account.busket')}}"><i class="fa-solid fa-cart-shopping me-2"></i>Koszyk</a></li>
                                <form method="POST" action="{{ route('logout') }}" x-data>@csrf<li><button type="submit" class="dropdown-item" onclick="return confirm('Czy na pewno chcesz się wylogować?');"><i class="fa-solid fa-power-off me-2"></i>Wyloguj</button></li>
                                </form>
                                @can('admin dashboard')
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{route('dashboard')}}"><i class="fa-solid fa-toolbox me-2"></i>Panel Admina</a></li>
                                @endcan
                                @else
                                <li><a href="{{route('login')}}" class="dropdown-item"><i class="fa-solid fa-right-to-bracket me-2"></i>Logowanie</a></li>
                                <li><a href="{{route('register')}}" class="dropdown-item"><i class="fa-solid fa-check me-2"></i>Rejestracja</a></li>
                                @endauth
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!--END ALERT-->
    <div id="content">
        @yield('content')
    </div>
    <!--FOOTER-->
    <section class="bg-primary">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-5">
                <ul class="nav col-md-3 justify-content-center order-2 order-md-1 mx-auto my-2">
                    <li class="nav-item mx-0"><span class="nav-link px-2 text-secondary text-center">&copy; 2023 Desinged by Karol Wiśniewski</span></li>
                </ul>
                <a href="/" class="d-flex align-items-center justify-content-center col-12 col-md-auto order-1 order-md-2 mx-auto">
                    <img class="img-fluid" src="{{asset('logo/COFFEESUMMIT-LOGO-BIALE-przezroczyste-tlo.png')}}" alt="logo coffee summit" style="height: 6em;">
                </a>

                <ul class="nav col-md-3 justify-content-center order-3 mx-auto">
                    <li class="nav-item mx-0"><a href="{{route('policy-priv')}}" class="nav-link px-2 text-secondary">Polityka prywatności</a></li>
                    <li class="nav-item mx-0"><a href="{{route('policy-cookies')}}" class="nav-link px-2 text-secondary">Polityka Cookies</a></li>
                    <li class="nav-item mx-0"><a href="{{route('rule')}}" class="nav-link px-2 text-secondary">Regulamin</a></li>
                    <li class="nav-item mx-0"><a href="{{route('info')}}" class="nav-link px-2 text-secondary">Informacje wysyłkowe</a></li>
                </ul>
            </footer>
        </div>
    </section>
    <input type="hidden" name="white" id="white" value="{{asset('logo/COFFEESUMMIT-LOGO-BIALE-przezroczyste-tlo.png')}}">
    <input type="hidden" name="black" id="black" value="{{asset('logo/COFFEESUMMIT-LOGO-przezroczyste-tlo.png')}}">
    <!--END FOOTER-->
    <script>
        // Funkcja do sprawdzania na scrollu
        function checkIfOnElement() {
            try {
                // Sprawdź pozycję paska nawigacyjnego
                var navBar = $("#nav");
                var navBarTop = navBar.offset().top;
                var navBarHeight = navBar.outerHeight();

                // Sprawdź pozycję wideo w hero
                var heroVideo = $(".hero");
                var heroTop = heroVideo.offset().top;
                var heroHeight = heroVideo.outerHeight() - navBar.outerHeight();
            } catch (error) {
                return 1
            }
            // Sprawdź pozycję paska nawigacyjnego
            var navBar = $("#nav");
            var navBarTop = navBar.offset().top;
            var navBarHeight = navBar.outerHeight();

            // Sprawdź pozycję wideo w hero
            var heroVideo = $(".hero");
            var heroTop = heroVideo.offset().top;
            var heroHeight = heroVideo.outerHeight() - navBar.outerHeight();

            // Sprawdź, czy pasek nawigacyjny jest na wideo w hero
            if (navBarTop + navBarHeight > heroTop && navBarTop < heroTop + heroHeight) {
                var link = $("#nav .link-primary");
                navBar.addClass("bg-transparent");
                navBar.removeClass("bg-secondary");
                link.addClass("link-secondary");
                link.removeClass("link-primary");
                $("#logo").attr("src", $("#white").val());

            } else {
                var link = $("#nav .link-secondary");
                navBar.addClass("bg-secondary");
                navBar.removeClass("bg-transparent");
                link.addClass("link-primary");
                link.removeClass("link-secondary");
                $("#logo").attr("src", $("#black").val());
            }
        }

        function navBarMarginToContant() {
            var navHeight = $("#nav").height();
            $("#content").css("margin-top", navHeight);
            console.log($("#nav").height())
        }

        // Po załadowaniu strony i na scrollu
        $(document).ready(function() {
            var r = checkIfOnElement();
            if (r == 1) {
                navBarMarginToContant()
            };
            // Nasłuchuj zdarzenia scroll i sprawdzaj na każdym przewinięciu
            $(window).scroll(function() {
                checkIfOnElement();
            });
        });

        function skopiujNumerKonta() {
            // Znajdź element z numerem konta
            var numerKonta = document.getElementById("numer-konta");

            // Tworzenie tymczasowego elementu input
            var input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("value", numerKonta.textContent);
            document.body.appendChild(input);

            // Zaznacz i skopiuj tekst z input
            input.select();
            document.execCommand("copy");

            // Usunięcie tymczasowego elementu input
            document.body.removeChild(input);

            // Wyświetlenie komunikatu
            alert("Numer konta bankowego został skopiowany: " + numerKonta.textContent);
        }
    </script>
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>