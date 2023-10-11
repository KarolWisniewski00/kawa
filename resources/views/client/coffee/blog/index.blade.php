@extends('layout.coffee')
@section('SEO')
<title>Blog | Coffee Summit</title>
<meta property="og:title" content="Blog | Coffee Summit" />
<meta name="twitter:title" content="Blog | Coffee Summit" />
@endsection
@section('content')
<!--PRODUCT-->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-4 mb-4" style="background-image: url('{{ asset('image/Depositphotos_199823784_DS.jpg') }}'); background-size: cover; background-position: center;">
                <div class="d-flex justify-content-between align-items-center my-3 text-center container">
                    <h1 class="font-custom text-white m-0 p-0">Blog</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pb-5">
            @foreach($blogs as $blog)
            @if($blog->visibility_on_website)
            <div class="col-6 col-md-12">
                <div class="d-flex flex-column justify-content-center align-items-center my-2">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <a href="{{route('blog.show','test')}}" class="d-flex flex-column justify-content-center align-items-end">
                                <img class="img-fluid" alt="" src="{{asset('photo/'.$blog->photo)}}">
                            </a>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <h3 class="text-muted mt-5 font-custom-2">{{$blog->created_at}}</h3>
                                <h1 class="font-custom">{{$blog->title}}</h1>
                                <p class="d-none d-md-flex lead">{{$blog->start}}</p>
                                <a href="{{route('blog.show', $blog)}}" class="btn btn-primary">
                                    <i class="fa-solid fa-angles-right me-2"></i>Czytaj więcej
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            <div class="col-12 my-2">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</section>
<!--END PRODUCT-->
@endsection