@extends('dashboard')
@section('content')
<section>
    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('acl.index')}}" data-toggle="tooltip" data-placement="top" title="Lista de Usuários"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
        </div>
    </div>
     @can('acl-permission' , $user)
    <div class="row">
       
        <div class="col-md-3 form-group">
            {!!Form::model($user ,array('route'  =>  ['acl.update', $user->id] , 'method'  =>  'POST'))!!}
            {!!Form::label('admin','Premição')!!}
            {!!Form::select('admin',[false   =>  'Usuário',true  =>  'Admin'],null,['class' =>  'form-control'])!!}
            {!!Form::label('name','Nome do Usuário')!!}
            {!!Form::text('name' , $user->name ,['class'    =>  'form-control'] )!!}

        </div>

        <div class="row">
            {!!Form::submit('Salvar' , ['class' =>  'btn btn-default-lg'])!!}
        </div>
        {!!Form::close()!!}
    </div>
     @endcan
</section>
@stop