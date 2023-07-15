@extends('layout.coffee')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_177032298_XL.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center">
                    <h1 class="font-custom text-white">Informacje wysyłkowe</h1>
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
            <div class="col-12">
                <h2 class="font-custom fw-bold">Nagłówek</h2>
                <h3>Mniejszy nagłówek</h3>
                <p class="lead">Paragraf</p>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Upvotes</th>
                            <th>Downvotes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alice</td>
                            <td>10</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>Bob</td>
                            <td>4</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Charlie</td>
                            <td>7</td>
                            <td>9</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Totals</td>
                            <td>21</td>
                            <td>23</td>
                        </tr>
                    </tfoot>
                </table>
                <img alt="" src="{{ asset('image/tumblr_owdamrsE8J1rqafmyo1_500.jpeg') }}" class="img-fluid my-4">
            </div>
        </div>
    </div>

</section>
<!--END PRODUCT-->
@endsection