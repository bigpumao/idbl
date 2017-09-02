@extends('dashboard')
@section('content')

{!!Form::model($album,   ['route'  =>   ['imagem.album.store', $album->id],   'method'    =>  'post', 'files' => 'true'])!!}

@include ('dashboard.albuns.imagem.formulario-imagem')
{!!Form::close()!!} 
@stop