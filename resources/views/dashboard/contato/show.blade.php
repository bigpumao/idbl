@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-md-3">
        <h2><a href="{{route('contatodash.index')}}" data-toggle="tooltip" data-placement="top" title="Listagens dos Pedidos"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label class="label-inverse">Nome</label>
        {{$contato->nome}}
    </div>
    <div class="col-md-2">
        <label         class="label-inverse">Telefone</label>
        {{$contato->telefone}}
    </div>
    <div class="col-md-4">
        <label clas        s="label-inverse">email</label>
        {{$contato->email}}
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-md-6 col-md-offset-3">
        <textarea class="form-group" rows="20" cols="80">{{$contato->mensagem}}</textarea>
    </div>
</div>
@stop