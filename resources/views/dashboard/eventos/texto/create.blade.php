@extends('dashboard')
@section('content')
 {!!Form::open(array('route'  =>  'eventos.store' , 'method'  =>  'post', 'files' =>  'true'))!!}
 @include('dashboard.eventos.texto.formulario')
 {!!Form::close()!!}
@stop