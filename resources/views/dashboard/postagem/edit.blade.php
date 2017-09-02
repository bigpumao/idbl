@extends('dashboard')

@section('content')
{!! Form::model($postagem , ['route'   =>  ['update', $postagem->id] ,'files' => true]) !!}
@include('dashboard.postagem.formulario')
{!!Form::close()!!}

@endsection

