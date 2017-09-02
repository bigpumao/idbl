@extends('FrontEnd.index')
@section('content')

<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li class="active">Eventos</li>
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
                <h1>Todos os Eventos</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header --> 
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <ul class="isotope-grid" data-sort-id="gallery">
                    @foreach($eventos as $evento)
                    <li class="col-md-6 col-sm-6 grid-item post format-image">
                        <div><h3>{{$evento->titulo}}</h3></div>
                        <div class="grid-item-inner"> <a href="{{url('eventos/'.$evento->id)}}" class="media-box"> <img src="/imagem/igreja/File/eventos/{{$evento->imagem}}" alt=""> </a> </div>

                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="text-align-center">
                <ul class="pagination">
                    {{$eventos->links()}}
                </ul>
            </div>
        </div>
    </div>
</div> 
@stop