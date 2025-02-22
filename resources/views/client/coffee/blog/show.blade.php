@extends('layout.coffee')
@section('SEO')
<title>{{$blog->title}} | Coffee Summit</title>
<meta property="og:title" content="{{$blog->title}} | Coffee Summit" />
<meta name="twitter:title" content="{{$blog->title}} | Coffee Summit" />
<meta name="description" content="{{$blog->description}}">
<meta property="og:description" content="{{$blog->description}}" />
<meta name="twitter:description" content="{{$blog->description}}" />
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_86094158_DS.jpg') }}'); background-size: cover; background-position: center;">
            <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                <h1 class="font-custom text-white m-0 p-0">Blog</h1>
            </div>
        </div>
        <hr>
    </div>
</div>
<section>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center p-5" style="background-image: url('{{ asset('photo/'. $blog->photo) }}'); background-size: cover; background-position: center;
        @if($blog->type == null)
        @else
        min-height:20em;
        @endif
        ">
            @if($blog->type == null)
            <h1 class="font-custom text-white my-4">{{$blog->title}}</h1>
            <div class="text-white text-start align-self-md-start my-1">Data wpisu: {{$blog->created_at}}</div>
            @else
            @endif
        </div>
        @if($blog->type == null)
        @else
        <div class="text-start align-self-md-start my-1">{{$blog->created_at}}</div>
        @endif
        <hr>
        <div class="row text-center">
            @if($blog->type == null)
            <div class="col-12">
                <p class="h4 fw-bold">{{$blog->start}}</p>
                <hr>
                <p>{{$blog->content}}</p>
                <hr>
                <p>{{$blog->end}}</p>
            </div>
            @elseif($blog->type == 'THIRD')
            <div class="col-12 text-start">
                <h1 class="h1 fw-bold">{{$blog->title}}</h1>
                <p class="fs-4">{{$blog->start}}</p>
                <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                    <img src="{{ asset('photo/'.$blog->content_photo_1) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                </div>
                <h2 class="h2 fw-bold">{{$blog->content_text_1}}</h2>
                <p class="fs-4">{{$blog->content_text_2}}</p>
            </div>
            @foreach($products as $product)
            @if($product->visibility_on_website == true)
            <div class="col-12 col-md-4">
                <a href="{{route('shop.product.show', str_replace(' ', '-', $product->name))}}" class="gsap h-100 d-flex flex-column justify-content-start align-items-center text-decoration-none">
                    @foreach($photos as $photo)
                    @if($photo->product_id == $product->id)
                    @if($photo->order == 1)
                    <div class="d-flex flex-column justify-content-center align-items-center h-75 overflow-hidden">
                        <img src="{{ asset('photo/' . $photo->image_path) }}" alt="{{$product->name}}" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                    </div>
                    @endif
                    @endif
                    @endforeach
                    <div class="d-flex flex-column justify-content-center align-items-center h-25">
                        <h4 class="font-custom mt-2 text-center">{{$product->name}}</h4>
                        <p>
                            @php
                            $minPrice = null;
                            $maxPrice = null;
                            @endphp

                            @foreach($variants as $variant)
                            @if($variant->product_id == $product->id && $variant->size_id != null)
                            @php
                            // Sprawdź minimalną cenę
                            if ($minPrice === null || $variant->price < $minPrice) { $minPrice=$variant->price;
                                }

                                // Sprawdź maksymalną cenę
                                if ($maxPrice === null || $variant->price > $maxPrice) {
                                $maxPrice = $variant->price;
                                }
                                @endphp
                                @endif
                                @endforeach

                                @if($minPrice !== null && $maxPrice !== null)
                                {{$minPrice}} PLN - {{$maxPrice}} PLN
                                @else
                                Brak dostępnych cen.
                                @endif
                        </p>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
            <div class="col-12 text-start mt-5">
                <h2 class="h2 fw-bold">{{$blog->content_text_3}}</h2>
                <p class="fs-4">{{$blog->content_text_4}}</p>
            </div>
            <div class="col-12 text-center mt-5 w-100">
                <h2 class="h2 fw-bold">{{$blog->content}}</h2>
                <div class="d-flex flex-column justify-content-center align-items-center mb-5 w-100">
                    <div class="d-flex flex-column justify-content-center align-items-center mb-5 w-100">
                        <button id="addPersonButton" class="btn btn-primary mt-5"><i class="fa-solid fa-plus me-2"></i>Dodaj osobę</button>
                        <div id="personsContainer" class="d-flex flex-row justify-content-start align-items-start flex-wrap w-100">
                            <!--SINGLE PERSON-->
                        </div>
                        <div class="btn-group mt-3" role="group" aria-label="Location">
                            <button type="button" class="btn btn-outline-primary" id="homeRadio">Dom</button>
                            <button type="button" class="btn btn-outline-primary" id="officeRadio">Biuro</button>
                        </div>
                        <button id="calculateButton" class="btn btn-success mt-3"><i class="fa-solid fa-calculator me-2"></i>Oblicz</button>
                        <div id="result" style="margin-top: 10px; font-size: 1.5rem;"></div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        // Klasa reprezentująca osobę
                        class Person {
                            constructor() {
                                this.element = this.createPersonElement();
                                this.setupButtons();
                            }

                            // Metoda tworząca element dla osoby
                            createPersonElement() {
                                const $personElement = $(`
                <div class="w-100 my-2 text-primary p-4 fs-3">
                    <div class="d-flex flex-row justify-content-center align-items-center mb-5 flex-wrap w-100">
                        <i class="fa-solid fa-user m-5" style="font-size: 4rem;"></i>
                        <div class="d-flex flex-column justify-content-start align-items-start mb-5">
                            <p>Częstotliwość pitej kawy dziennie</p>
                            <div class="d-flex flex-row justify-content-start align-items-start">
                                <div class="d-flex flex-row justify-content-center align-items-center w-50 px-2">
                                    Od
                                    <button class="btn btn-sm btn-success ms-2 plus fa-solid fa-plus" style="height: 40px"></button>
                                    <button class="btn btn-sm btn-primary count">0</button>
                                    <button class="btn btn-sm btn-danger minus fa-solid fa-minus" style="height: 40px"></button>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center w-50 px-2">
                                    Do
                                    <button class="btn btn-sm btn-success ms-2 plus fa-solid fa-plus" style="height: 40px"></button>
                                    <button class="btn btn-sm btn-primary count">1</button>
                                    <button class="btn btn-sm btn-danger minus fa-solid fa-minus" style="height: 40px"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);
                                return $personElement;
                            }

                            // Metoda ustawiająca obsługę przycisków plus i minus
                            setupButtons() {
                                const $countButtons = this.element.find('.count');
                                const $plusButtons = this.element.find('.plus');
                                const $minusButtons = this.element.find('.minus');

                                $plusButtons.on('click', () => {
                                    const $countButton = $(event.target).siblings('.count');
                                    let count = parseInt($countButton.text());
                                    count++;
                                    $countButton.text(count);
                                });

                                $minusButtons.on('click', () => {
                                    const $countButton = $(event.target).siblings('.count');
                                    let count = parseInt($countButton.text());
                                    if (count > 0) {
                                        count--;
                                        $countButton.text(count);
                                    }
                                });
                            }

                            // Metoda obliczająca średnią arytmetyczną dla zakresu od do
                            calculateAverage() {
                                const $counts = this.element.find('.count');
                                let sum = 0;
                                $counts.each(function() {
                                    sum += parseInt($(this).text());
                                });
                                return sum / $counts.length;
                            }
                        }

                        // Klasa zarządzająca osobami
                        class PersonsManager {
                            constructor() {
                                this.persons = [];
                                this.$container = $('#personsContainer');
                                $('#addPersonButton').on('click', () => this.addPerson());
                                $('#calculateButton').on('click', () => this.calculateAndDisplayResult());
                                // Dodajemy jedną osobę domyślnie
                                this.addPerson();
                            }

                            // Metoda dodająca nową osobę
                            addPerson() {
                                const person = new Person();
                                this.persons.push(person);
                                this.$container.append(person.element);
                            }

                            // Metoda obliczająca i wyświetlająca wynik
                            calculateAndDisplayResult() {
                                let totalAverage = 0;
                                const location = $('button.active').attr('id');
                                const multiplier = (location === 'officeRadio') ? 21 : 30;
                                this.persons.forEach(person => {
                                    totalAverage += person.calculateAverage();
                                });
                                const result = totalAverage * multiplier * 8;
                                $('#result').text(`Średnie miesięczne zużycie kawy: ${result}g`);
                            }
                        }

                        // Inicjalizacja zarządzania osobami
                        const personsManager = new PersonsManager();

                        // Obsługa zmiany wyboru lokalizacji
                        $('.btn-group .btn').on('click', function() {
                            $('.btn-group .btn').removeClass('active');
                            $(this).addClass('active');
                        });

                        // Domyślne zaznaczenie przycisku "Dom"
                        $('#homeRadio').addClass('active');
                    </script>

                </div>
                <div class="col-12 text-start my-5">
                    <h2 class="h4 text-danger">{{$blog->content_text_5}}</h2>
                    <h2 class="h2 fw-bold">{{$blog->content_text_6}}</h2>
                    <p class="fs-4">{{$blog->content_text_7}}</p>
                    <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                        <img src="{{ asset('photo/'.$blog->content_photo_2) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                    </div>
                    <p class="fs-4">{{$blog->end}}</p>
                </div>
                @elseif($blog->type =='SECOND')
                <div class="col-12 text-start">
                    <h1 class="h1 fw-bold">{{$blog->title}}</h1>
                    <p class="mb-5">{{$blog->start}}</p>
                    @if($blog->content_photo_1 != null)
                    <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                        <img src="{{ asset('photo/'.$blog->content_photo_1) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                    </div>
                    @endif
                    <h3>{{$blog->content_text_1}}</h3>
                    <p class="mb-5">{{$blog->content_text_2}}</p>

                    <h3>{{$blog->content_text_3}}</h3>
                    <p class="mb-5">{{$blog->content_text_4}}</p>
                    @if($blog->content_photo_2 != null)
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">
                        <div class="d-flex flex-column justify-content-center align-items-center w-100 w-md-50">
                            <img src="{{ asset('photo/'.$blog->content_photo_2) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                        </div>
                        <div class="w-100 w-md-50">
                            <h3>{{$blog->content_text_5}}</h3>
                            <p>{{$blog->content_text_6}}</p>
                        </div>
                    </div>
                    <hr>
                    @else
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">
                        <div class="w-100">
                            <h3>{{$blog->content_text_5}}</h3>
                            <p>{{$blog->content_text_6}}</p>
                        </div>
                    </div>
                    @endif
                    @if($blog->title == 'Dlaczego-kawa-jest-zdrowa?')
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">
                        <div class="w-100 w-md-50">
                            <h3>{{$blog->content_text_7}}</h3>
                            <p>{{$blog->content_text_8}}</p>
                        </div>
                        <div class="w-100 w-md-50">
                            <a href="{{route('shop.product.show', 'Brazylia-NEBLINA')}}" class="gsap h-100 d-flex flex-column justify-content-between align-items-center text-decoration-none">
                                <div class="d-flex flex-column justify-content-center align-items-center h-75 overflow-hidden">
                                    <img src="{{ asset('photo/169574317966.jpg') }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                                </div>

                                <div class="d-flex flex-column justify-content-center align-items-center h-25">
                                    <h4 class="font-custom mt-2 text-center">KRAFTOWA KAWA<br>BRAZYLIA NEBLINA</h4>
                                    <p>
                                        12.00 PLN - 99.00 PLN
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">
                        <div class="w-100">
                            <h3>{{$blog->content_text_7}}</h3>
                            <p>{{$blog->content_text_8}}</p>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <p>{{$blog->end}}</p>
                </div>
                <!--PRODUCTS GRID-->
                <div class="row my-5">
                    <div class="col-12">
                        <div class="text-center my-4">
                            <h1>Kraftowe kawy</h1>
                        </div>
                    </div>
                    @foreach($products as $p)
                    <div class="col-12 col-md-4">
                        <a href="{{route('shop.product.show', str_replace(' ', '-', $p->name))}}" class="h-100 d-flex flex-column justify-content-start align-items-center text-decoration-none">

                            @foreach($photos as $photo)
                            @if($photo->product_id == $p->id)
                            @if($photo->order == 1)
                            <div class="d-flex flex-column justify-content-center align-items-center h-75 overflow-hidden">
                                <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                            </div>
                            @endif
                            @endif
                            @endforeach
                            <div class="d-flex flex-column justify-content-center align-items-center h-25">
                                <h4 class="font-custom mt-2 text-center">{{$p->name}}</h4>
                                <p>
                                    @php
                                    $minPrice = null;
                                    $maxPrice = null;
                                    @endphp

                                    @foreach($variants as $variant)
                                    @if($variant->product_id == $p->id && $variant->size_id != null)
                                    @php
                                    // Sprawdź minimalną cenę
                                    if ($minPrice === null || $variant->price < $minPrice) { $minPrice=$variant->price;
                                        }

                                        // Sprawdź maksymalną cenę
                                        if ($maxPrice === null || $variant->price > $maxPrice) {
                                        $maxPrice = $variant->price;
                                        }
                                        @endphp
                                        @endif
                                        @endforeach

                                        @if($minPrice !== null && $maxPrice !== null)
                                        {{$minPrice}} PLN - {{$maxPrice}} PLN
                                        @else
                                        Brak dostępnych cen.
                                        @endif
                                </p>
                            </div>

                        </a>
                    </div>
                    @endforeach
                </div>
                <!--END PRODUCTS GRID-->
                @endif
            </div>
        </div>
</section>
@endsection