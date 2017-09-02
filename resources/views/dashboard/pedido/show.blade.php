@extends('dashboard')
@section('content')
<style>
    .margin{
        margin: 20px;
    }
</style>
<section class="content">

    <div class="row">
        <div class="col-md-2">
            <h2> <a href="{{route('pedido.index')}}"<i class="fa fa-television"></i></a></h2>
        </div>
        <div class="col-md-6">
            <h5>Nome da pessoa em que iremos orar: {{$pedido->nome}}</h5>
        </div>
        <div class="col-md-4">
            <h5>Email: {{$pedido->email}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
            <center>  Titulo do Pedido de Oração:<br>
                <h4>  <strong>{{$pedido->titulo}}</strong> </h4></center>
        </div>
        <div class="col-md-3">
            <center>  Esta oração é na área da/de/do <br>
                <h4>  <strong>{{$pedido->area}}</strong> </h4></center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-5 ">
            <label class="margin label-info">Descrição do pedido de Oração</label>
        </div>
        <div class="col-md-9 col-md-offset-2">
             
            <textarea class="form-control" cols="70" rows="15">{{$pedido->descricao}}</textarea>
        </div>
    </div>
</section>
@endsection