@extends ('dashboard')
@section ('content')
<script   src="http://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
@if(Session::has('msg'))
<div class="row">
    <div class="col-md-6">
        <div class="alert alert-danger" id="msg">
            {{Session::get('msg')}}
        </div>
    </div>
</div>

@endif
{!! Form::model($membro, ['route'  =>   ['membro.update', $membro->id] , 'method'    =>  'post', 'files' =>  'true']) !!}
@include ('dashboard.cadastroMembros.formulario')
{!! Form::close() !!}

@stop