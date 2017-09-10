@extends('dashboard')
@section('content')
    {!! Form::open(array('route'    =>  'departamento.store' , 'method'    =>  'POST')) !!}
    @include('dashboard.departamento.formulario')
    {!! Form::close() !!}
@stop