@extends('dashboard')
@section('content')
<style>
    .img{
        width: 150px;
        height: 150px;
    } 
    .margin{
        margin-bottom: 10px;
    }
</style>
{!!Form::model($album,   ['route'  =>   ['album.update', $album->id],   'method'    =>  'post', 'files' => 'true'])!!}
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('album.index')}}" data-toggle="tooltip" data-placement="top" title="Listas dos albuns"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img class="img-bordered img pull-right" src="/imagem/album/capa_album/{{$album->imagem_capa}}">

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::file('imagem', ['class'   =>  'pull-right']) !!}
        </div>
    </div>
    <div class="row margin">
        
        <div class="col-md-6">
            {!! Form::select('status', [
            '0'=>   'Inativo',    '1'   =>  'Ativo',
            ],
            null, ['class'  =>  'form-control ']) 
            !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::select('departamento', [
            'null'=>   'Escolha um Departamento',    'jeans'   =>  'Jeans',
            'louvor'    =>  'Louvor',   'kids'    =>  'Kids',
            'senhores e senhoras' =>  'Senhore | Senhoras' , 'geral' =>  'Geral'
            ],
            null, ['class'  =>  'form-control']) 
            !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="nome" class="control-label">Nome do Album</label>
            {!!Form::text('nome', null,['class' =>  'form-control', 'id'    =>  'nome'])!!}
            {!!Form::label('descricao','Descrição da Imagem')!!}
            {!!Form::text('descricao',null,['class' =>  'form-control'])!!}

        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-5" style="margin-top: 10px;">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </div>
</div>


{!!Form::close()!!} 
@stop