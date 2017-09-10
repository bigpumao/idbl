@extends('dashboard')
@section('content')
{!!Form::model($sound , array('route' =>  array('sound.update' , $sound->id),  'method'    =>  'POST'))!!}
    @include('dashboard.soundCloud.formulario')
{!!Form::close()!!}
@stop