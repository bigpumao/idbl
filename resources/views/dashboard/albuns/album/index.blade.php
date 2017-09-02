@extends('dashboard')
@section('content')
<style>
    .moldura   {
        float: left;
        margin: 0 10px;
        padding: 10px;
        border: 1px solid #ddd;
        width: 300px;


    }
    .img{
        float:left;
        width: 120px;
        margin-left: 11px;
        margin-right: 18px;
        margin-bottom: 25px;

    }
    a:hover img{
        transform: scale(1.3);
    }
    .h{
        margin-top: 2px;
    }
    .opcao{
        margin-bottom: 10px;
    }
</style>
<div class="content">
    <div class="row">
        <div class="col-md-6">
            @if(Session::has('msg'))
            <div id="msg" class="alert alert-success"><strong> <center>{{Session::get('msg')}}</center></strong></div>
            @endif
        </div>
    </div>
    <div class="row">

        <h2><a href="{{route('album.create')}}" data-toggle="tooltip" data-placement="top" title="Novo Album"><i class="fa fa-plus" aria-hidden="true"></i></a></h2> 

    </div>
    <div class="row">

        @foreach($relacionamento as $rel)
        <div class="col-md-4 moldura">  
            <div class="row">
                <div class="col-md-8">
                    <small>Depart.: {{$rel->departamento}}<br></small>
                </div>
                <div class="col-md-4 pull-right opcao" >
                    <a href="{{url('dashboard/album/destroy/'.$rel->id)}}"> <h4 class="h"><li class="pull-right fa fa-trash" data-toggle="tooltip" data-placement="top" title="Excluir Album"></h4></li></a>
                    <a href="{{url('dashboard/album/imagem-view/' . $rel->id)}}"> <h4 class="h"><li class="pull-right fa fa-eye" data-toggle="tooltip" data-placement="top" title="Visalizar Album"></h4></li></a>
                    <a href="{{url('dashboard/album/imagem-edit/' . $rel->id)}}"> <h4 class="h"><li class="pull-right fa fa-edit" data-toggle="tooltip" data-placement="top" title="Editar Album"></h4></li></a>
                </div>
            </div>

            <a href="{{url('dashboard/album/imagem-view/' . $rel->id)}}"> <img class="img-rounded img"  src="/imagem/album/capa_album/{{$rel->imagem_capa}}" ></a>
            <div>
                <strong>Nome do album:</strong> <br>

                <p id="text">{{$rel->nome}}<br></p>
                <strong>Criada em:</strong><br>
                {{ date("d F Y",strtotime($rel->created_at)) }}
            </div>

            <a href="{{url('dashboard/album/imagem-create/' . $rel->id)}}" class="btn btn-primary">Add Imagem ao Album</a>
            <strong>Quant img: </strong>


        </div>

        @endforeach
    </div>
</div>
@stop