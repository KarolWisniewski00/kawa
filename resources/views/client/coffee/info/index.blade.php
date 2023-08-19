@extends('layout.coffee')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_177032298_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">Informacje wysyłkowe</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($elements as $element)
                @switch($element->type)
                @case('title')
                <h2 class="font-custom fw-bold">{{$element->content}}</h2>
                @break

                @case('subtitle')
                <h3>{{$element->content}}</h3>
                @break

                @default
                <p class="lead">{{$element->content}}</p>
                @endswitch
                @endforeach
            </div>
        </div>
    </div>

</section>
<!--END PRODUCT-->
@endsection