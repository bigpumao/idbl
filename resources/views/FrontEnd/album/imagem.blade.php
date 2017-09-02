@extends('FrontEnd.index')
@section('content')
<div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li class=""><a href="{{route('front.albuns.index')}}">Album</a></li>
                    <li class="active">Imagem</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Nav Backed Header --> 
<!-- Start Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($imagens as $album)
                <h1></h1>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <ul class="isotope-grid" data-sort-id="gallery">


                    @foreach($imagens as $img)


                    <li class="col-md-4 col-sm-3 grid-item post format-image">
                        <div class="col-md-12">
                            {{$img->descricao}}
                        </div>
                        <div>  
                            <a class="img-bordered" href="/imagem/album/imagens/{{$img->imagem}}" data-lightbox="image-1" data-title="{{$img->descricao}}">  <img class="img-polaroid " src="/imagem/album/imagens/{{$img->imagem}}"></a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div>
                {{$imagens->links()}}
            </div>
        </div>
    </div>
</div>
@stop
