@extends('dashboard')
@section('content')
{!!Form::open(array('route' =>  'sound.store',  'method'    =>  'POST'))!!}
    @include('dashboard.soundCloud.formulario')
{!!Form::close()!!}
@stop