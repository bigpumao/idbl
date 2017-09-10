@extends('dashboard')
@section('content')
{!!Form::model($sound , array('route' =>  array('tube.update' , $sound->id),  'method'    =>  'POST'))!!}
    @include('dashboard.youtube.formulario')
{!!Form::close()!!}
@stop