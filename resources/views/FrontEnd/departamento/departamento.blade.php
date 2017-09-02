@extends('FrontEnd.index')
@section('content')
<style>
    .margin{
        margin-top: 20px;
    }
    .img{
        width: 300px;
        height: 250px;
    }
    .marginDiv{
        margin-top: 10px;
    }
    
</style>
<div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li class="active">Artigos</li>
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
                <h4>Quantidade de Artigos {{$departamentos->count()}}</h4>
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
                <div class="col-md-12">
                    <ul class="grid-holder col-3 events-grid">


                        @foreach($departamentos as $departamento)
                        @foreach($departamento->postagems as $artigo)
                        <li class="grid-item format-standard">
                            <div class="grid-item-inner marginDiv"><img class="img" src="/uploads/postagem/{{$artigo->imagem}}" alt=""> 
                                <div class="grid-content">
                                    <h3><a href="single-event.html">{{$artigo->titulo}}</a></h3>
                                    
                                </div>
                                <ul class="info-table">
                                    <li><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($artigo->created_at)); ?></li>
                                    <li><i class="fa fa-info-circle"></i>{{$departamento->departamento}}</li>
                                    <li><i class="fa fa-user-circle-o"></i>{{$departamento->user->name}}</li>
                                    <div class="col-md-12 margin">
                                        <?php echo substr($artigo->descricao, 0, 200) . " ..."; ?>
                                    </div>
                                    <div class="col-md-12">
                                        <p><a href="{{url('blog/artigo/'.$artigo->id)}}" class="btn btn-primary">Continue lendo <i class="fa fa-long-arrow-right"></i></a></p>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        @endforeach
                        @endforeach
                    </ul>
                    <ul class="pager pull-right">
                        {{$departamentos->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop