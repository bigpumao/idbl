@extends('dashboard')
@section('content')
<style>
    .margin{
        margin-bottom: 10px;
    }

</style>
<div class="container">

    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('user.index')}}" data-toggle="tooltip" data-placement="top" title="Listagem de Usuário"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
        </div>
    </div>
    <div class="row">
        {!! Form::model($user, ['route'  =>   ['user.update', $user->id] , 'method'    =>  'post']) !!}
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro do Sistema de Administração</div>
                <div class="panel-body">

                    <div class="row margin">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                {!!Form::text('name',null,['class'  =>  'form-control'])!!}
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Endereço E-Mail</label>

                            <div class="col-md-6">
                                {!!Form::text('email',null,['class' =>  'form-control'])!!}

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="row margin">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        {{!!Form::close()!!}}
    </div>
    <div lass="row">
        @if(Session::has('msg'))
        <div id="msg" class="alert-danger col-md-4 col-md-offset-4">{{Session::get('msg')}}</div>
        @endif
    </div>
</div>


@stop