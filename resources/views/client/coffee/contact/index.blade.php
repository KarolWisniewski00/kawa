@extends('layout.coffee')
@section('SEO')
<title>Kontakt | Coffee Summit</title>
<meta property="og:title" content="Kontakt | Coffee Summit" />
<meta name="twitter:title" content="Kontakt | Coffee Summit" />
@endsection
@section('content')
<!--PRODUCT-->
<section>
    @include('client.coffee.module.alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_79160678_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-primary m-0 p-0">Kontakt</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-0 my-5">
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22766.27267953126!2d16.717247742978092!3d53.14592516507979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4703e5d9fad63455%3A0x5f07006f0c2a56ec!2sWarsztatowa%208%2C%2064-920%20Pi%C5%82a!5e0!3m2!1spl!2spl!4v1695311454663!5m2!1spl!2spl" class="w-100" style="border:0; aspect-ratio:1/1" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-12 text-center my-5">
                <p class="text-primary h3 m-0 p-0 my-2"><i class="fa-solid fa-location-dot me-2"></i>{{ $company['adres_contact_page'] }}</p>
                <p class="text-primary h3 m-0 p-0 my-2"><a href="tel:{{ $company['phone_contact_page'] }}" class="text-decoration-none"><i class="fa-solid fa-phone me-2"></i>{{ $company['phone_contact_page'] }}</a></p>
                <p class="text-primary h3 m-0 p-0 my-2"><a href="mailto:{{ $company['email_contact_page'] }}" class="text-decoration-none"><i class="fa-solid fa-envelope me-2"></i>{{ $company['email_contact_page'] }}</a></p>
            </div>
        </div>
    </div>
</section>
<!--END PRODUCT-->
@endsection