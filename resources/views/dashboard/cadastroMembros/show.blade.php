@extends('dashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <h3>
                <a href="{{route('membro.index')}}" data-toggle="tooltip" data-placement="top" title="Voltar a Listagem"><i class="fa fa-television"></i></a>
            </h3>
            <hr>
        </div>

        <div class="col-md-offset-2 col-md-8">
            <div class="row">
                <div class="col-md-3 pull-right">
                    
                    @if($membro->imagem == "avatar.jpg")
                    <a href="/imagem/igreja/membros/avatar.jpg" data-lightbox="image-1" data-title="{{$membro->nome}}"><img src="/imagem/igreja/membros/avatar.jpg" width="200" height="200"></a>
                    @else
                    <a href="/imagem/igreja/membros/{{$membro->imagem}}" data-lightbox="image-1" data-title="{{$membro->nome}}"><img src="/imagem/igreja/membros/{{$membro->imagem}}" width="200" height="200"></a>
                     @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {!!Form::label('nome','Nome do Membro',['class' =>  'label-control']) !!}
                    {!!Form::text('nome',$membro->nome,['class'  =>  'form-control']) !!}
                </div>
                <div class="col-md-6">
                    {!!Form::label('endereco','Endereço',['class' =>  'label-control']) !!}
                    {!!Form::text('nome',$membro->endereco,['class'  =>  'form-control']) !!}
                </div>
            </div>
            <div class='row'>
                <div class="col-md-4">
                    {!!Form::label('bairro','Bairro',['class' =>  'label-control']) !!}
                    {!!Form::text('nome',$membro->bairro,['class'  =>  'form-control']) !!}
                </div>
                <div class="col-md-4">
                    {!!Form::label('cidade','Cidade',['class' =>  'label-control']) !!}
                    {!!Form::text('nome',$membro->cidade,['class'  =>  'form-control']) !!}
                </div>
                <div class="col-md-4">
                    {!!Form::label('telefone','Telefone',['class' =>  'label-control']) !!}
                    {!!Form::text('nome',$membro->fone,['class'  =>  'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    {!!Form::label('dataNasc','Data de Nascimento',['class' =>  'label-control']) !!}
                    {!!Form::text('dataNasc',$membro->dataNasc,['class'  =>  'form-control datepicker']) !!}
                </div>
                <div class="col-md-4">
                    {!!Form::label('estadoCivil','Estado Civil',['class' =>  'label-control']) !!}
                    {!!Form::text('dataNasc',$membro->estadoCivil,['class'  =>  'form-control']) !!}
                </div>
                <div class="col-md-4">
                    {!!Form::label('filiacao','Filiação',['class' =>  'label-control']) !!}
                    {!!Form::text('filiacao',$membro->filiacao,['class'  =>  'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!!Form::label('historico','Historico',['class' =>  'label-control']) !!}
                    {!!Form::textarea('historico',$membro->historico,['class'   =>  'form-control', 'rows'  =>  '15','cols' =>  '50'])!!}
                </div>
            </div>

        </div>
    </div>
</div>


@stop
