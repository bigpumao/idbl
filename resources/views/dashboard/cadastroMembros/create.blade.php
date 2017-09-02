@extends ('dashboard')
@section ('content')

{!! Form::open(array('route'    =>  'membro.store', 'method'    =>  'post', 'files'  =>  'true')) !!}
    @include ('dashboard.cadastroMembros.formulario')
{!! Form::close() !!}
    
@stop