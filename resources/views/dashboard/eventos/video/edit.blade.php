@extends('dashboard')
@section('content')
{!!Form::model($video , array('route' =>  array('video.update' , $video->id),  'method'    =>  'POST'))!!}
    @include('dashboard.eventos.video.formulario')
{!!Form::close()!!}
@stop