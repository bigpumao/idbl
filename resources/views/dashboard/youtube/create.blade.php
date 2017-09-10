@extends('dashboard')
@section('content')
{!!Form::open(array('route' =>  'tube.store',  'method'    =>  'POST'))!!}
    @include('dashboard.youtube.formulario')
{!!Form::close()!!}
@stop