@extends('FrontEnd.index')
@section('content')

<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li class="active">Download</li>
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
                <h1>Baixar Arquivos</h1>
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
                <div class="col-md-9 posts-archive">
                    <div class="post">
                        @foreach($downloads as $download)
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <a href="#" class="album-cover">  

                                </a>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h3><p>{{$download->titulo}}</p></h3>
                                <p>{!!$download->descricao!!}</p>
                                <p><a href="/downloads/arquivos/{{$download->arquivo}}" class="btn btn-primary">Baixar <i class="fa fa-cloud-download"></i></a></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <ul class="pagination">
                        {{$downloads->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop