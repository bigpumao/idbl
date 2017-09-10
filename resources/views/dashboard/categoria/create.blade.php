@extends('dashboard')
@section('content')
    {!! Form::open(array('route'    =>  'categoria.store' , 'method'    =>  'POST')) !!}
    @include('dashboard.categoria.formulario')
    {!! Form::close() !!}
@stop