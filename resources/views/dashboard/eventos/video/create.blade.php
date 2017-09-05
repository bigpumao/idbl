@extends('dashboard')
@section('content')
{!!Form::open(array('route' =>  'video.store',  'method'    =>  'POST'))!!}
    @include('dashboard.eventos.video.formulario')
{!!Form::close()!!}
@stop