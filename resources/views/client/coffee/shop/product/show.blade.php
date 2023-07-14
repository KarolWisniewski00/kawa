@extends('layout.coffee')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199823494_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center">
                    <h1 class="font-custom text-white">Nazwa</h1>
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <button type="button" class="p-0 m-0 mb-3 border-0 d-flex align-items-center justify-content-center bg-transparent overflow-hidden" id="button-studio-photo-main" data-bs-toggle="modal" data-bs-target="#studio-photo-main">
                    <img src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}" alt="studio-photo-main" id="img-studio-photo-main" class="img-fluid">
                </button>
                <div class="modal fade" id="studio-photo-main" tabindex="-1" aria-labelledby="studio-photo-main-label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border-0 rounded-0">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}" alt="studio-photo-main" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-start align-items-start">
                    <h1>Nazwa</h1>
                    <p class="text-muted">opis</p>
                    <div class="d-flex flex-column justify-content-start align-items-start my-2">
                        <div class="fs-1">100 PLN</div>
                    </div>
                    <p class="fw-bold mt-4">Wybierz rozmiar opakowania</p>
                    <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                        <button type="button" class="btn btn-secondary">rozmiar</button>
                    </div>
                    <p class="fw-bold mt-4">Wybierz rozmiar</p>
                    <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                        <button type="button" class="btn btn-secondary">rozmiar</button>
                    </div>
                    <p class="fw-bold mt-4">Ilość</p>
                    <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                        <label for="customRange1" class="form-label">0</label>
                        <input type="range" class="form-range" id="customRange1" value="0">
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center mb-4 mt-2">
                        <form method="POST" action="">
                            @csrf
                            <input type="hidden" name="product_id" value="">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-lg btn-primary w-100 h-100">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div><i class="fa-solid fa-cart-shopping me-2"></i></div>
                                    <div>Dodaj do koszyka</div>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--END PRODUCT-->
        <!--PRODUCTS GRID-->
        <div class="row">
            <div class="col-12">
                <div class="text-center my-4">
                    <h1>Podobne produkty</h1>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('shop.product.show', 'test')}}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img class="img-fluid" alt="" src="{{asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg')}}">
                        <h4 class="font-custom mt-2">Mexico Cafeco Bio</h4>
                        <p>14,90 PLN - 50,10 PLN</p>
                    </div>
                </a>
            </div>
        </div>
        <!--END PRODUCTS GRID-->
    </div>
</section>
<!--END PRODUCT-->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("#customRange1").on("input", function() {
            var value = $(this).val();
            $(".form-label").text(value);
        });
    });
</script>
@endsection