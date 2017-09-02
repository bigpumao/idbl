@extends('FrontEnd.index')
@section('content')
<style>
    .margin{
        margin-bottom: 20px;
    }
</style>
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li><a href="{{route('eventosfront.index')}}">Todos os Eventos</a></li>
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
            <div class="col-md-10 col-sm-10 col-xs-8">
                <h1>Evento : {{$evento->titulo}}</h1>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4"> <a href="{{route('eventosfront.index')}}" class="pull-right btn btn-primary">Todos os Eventos</a> </div>
        </div>
    </div>
</div>
<!-- End Page Header --> 
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <header class="single-post-header clearfix">
                        <nav class="btn-toolbar pull-right"> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Print" ><i class="fa fa-print"></i></a> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Contact us" ><i class="fa fa-envelope"></i></a> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Share event" ><i class="fa fa-location-arrow"></i></a> </nav>

                    </header>
                    <article class="post-content">
                        <div class="event-description"> <img src="/imagem/igreja/File/eventos/{{$evento->imagem}}" class="img-responsive">
                            <div class="spacer-20"></div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Detalhes do Evento</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="info-table">
                                                <li><i class="fa fa-calendar"></i> <strong>Data Início</strong> {{$evento->data_inicio}}</li>
                                                <li><i class="fa fa-calendar"></i> <strong>Data Fim</strong> {{$evento->data_fim}}</li>
                                                <li><i class="fa fa-map-marker"></i> {{$evento->categoria}}</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <p>{!!$evento->descricao!!}</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>           
</div>
@stop