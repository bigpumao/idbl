@extends('dashboard')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <h2><a href="{{route('album.index')}}" data-toggle="tooltip" data-placement="top" title="Listagens dos Albuns"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
            </div>
            <div class="col-md-3">
                <strong>Criando um Novo Album</strong>
            </div>
        </div>
    </div>
    @if(Session::has('errors'))
        @if(count('errors'))
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
    @endif
    {!! Form::open(array('route'    =>  'album.store',  'method'    =>  'post', 'files' =>  'true'))!!}

      <input name="categoria" type="hidden" value="album">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::select('departamento', [
            'null'=>   'Escolha um Departamento',    'jeans'   =>  'Jeans',
            'louvor'    =>  'Louvor',   'kids'    =>  'Kids',
            'senhores e senhoras' =>  'Senhore | Senhoras' , 'geral' =>  'Geral'  ],
            null, ['class'  =>  'form-control']) 
            !!}
        </div>

    </div>
    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <label for="nome" class="control-label">Nome do Album</label>
            {!!Form::text('nome', null,['class' =>  'form-control', 'id'    =>  'nome'])!!}
            {!!Form::label('descricao','Descrição')!!}
            {!!Form::text('descricao',null , ['class'  =>  'form-control', 'id'    =>    'descricao'])!!}
            {!! Form::label('CapaImagem' , 'Capa da Album') !!}
            {!!Form::file('imagem_capa',['class'  =>  'pull-right btn btn-file '])!!}

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-9">
            <button class="btn btn-primary  pull-right"><li class="fa fa-save"> Criar</li></button>    
        </div>
    </div>
    {!!Form::close()!!}


</div>

@stop