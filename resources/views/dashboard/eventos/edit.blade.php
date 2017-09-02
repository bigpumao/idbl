@extends('dashboard')
@section('content')
 {!!Form::model($update , array('route'  =>  ['eventos.update', $update->id] , 'method'  =>  'post', 'files' =>  'true'))!!}
 @include('dashboard.eventos.formulario')
 {!!Form::close()!!}
@stop