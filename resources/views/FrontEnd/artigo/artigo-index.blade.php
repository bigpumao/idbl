@extends('FrontEnd.index')
@section('content')

<style>
    .artigo{
        width: 300px;
        height: 200px;
    }
    #margin{
        margin-bottom: 50px;
    }
</style>
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row"> 
                <!-- Start Featured Blocks -->
                <div class="featured-blocks clearfix">

                    @foreach ($artigos as $artigo)

                    <div class="col-md-3 col-sm-3 featured-block " id="margin">
                        <div class="row" id="elemento">
                            <div class="col-md-12">
                                <a href="{{url('/blog/artigo/'.$artigo->id)}}" class="img-thumbnail">
                                    <img class="artigo" src="{{url('/')}}/uploads/postagem/{{$artigo->imagem}}" alt="staff" width="500" height="400"> 
                                    <strong>Se interessou</strong> 
                                    <span class="more">Leia mais</span>
                                </a> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel-body">
                                <ul class="info-table">
                                    <li><a href="" data-toggle="tooltip" data-placement="top" title="{{$artigo->departamento->user->name}}"><i class="fa fa-user-circle-o"></i></a> Autor: {{$artigo->departamento->user->name}} </li>
                                    <li><i class="fa fa-book"></i> Título:<center> {{$artigo->titulo}}</center> </li>
                                    <li><i class="fa fa-archive" ></i> Departamento: {{$artigo->departamento->departamento}} </li>
                                    <li><i class="fa fa-edit"></i> Descrição 
                                        <p>{!! substr( $artigo->descricao , 0 ,200) . " .."!!}</p>
                                    </li>
                                </ul>  
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    {{$artigos->links()}}
                </div>
                <!-- End Featured Blocks --> 
            </div>

        </div>
    </div>
</div>
@stop

