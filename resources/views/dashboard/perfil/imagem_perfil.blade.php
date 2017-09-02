@extends('dashboard')	
@section('content')
<style>
    #marginButton{
        margin-top: 20px;
    }
</style>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <img src="/uploads/avatars/{{ $avatar->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{$avatar->name }}</h2>
        </div>

        <div class="col-md-10 pull-right	">
            <form enctype="multipart/form-data" action="/dashboard/perfil/update" method="POST">
                <label>Atualizar imagem do perfil</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>   

    </div>  
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            @if(Session::has('msg'))
            <div id="msg" class="alert alert-success"><strong> <center>{{Session::get('msg')}}</center></strong></div>
            @elseif(Session::has('error'))
            <div id="msg" class="alert alert-danger"><strong> <center>{{Session::get('error')}}</center></strong></div>
            @elseif(Session::has('info'))
            <div id="msg" class="alert alert-info"><strong> <center>{{Session::get('info')}}</center></strong></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::model($avatar , ['route'   =>  ['perfil.update', $avatar->id] , 'method'  =>  'post']) !!}
            <center> {!!Form::label('usuario' , 'Alterar nome de usuário e senha')!!}</center>
            <div class="row">
                <div class="col-md-12 form-grooup">
                    <label for="usuario">Nome do Usuário</label>
                    <input type="text" name="name" id="usuario" value="{{$avatar->name}}" class="form-control"> 
                    <label for="senha">Senha</label>
                    <input type="password" name="password" id="senha" class="form-control">
                    <label for="contraSenha">Repita a Senha</label>
                    <input type="password" name="contraSenha" id="contraSenha" class="form-control">
                </div>
            </div>
            <div class="row" style="margin-top:20px;">
                <div class="col-md-3 pull-right">
                    <button type="submit" class="btn btn-primary ">Salvar</button>
                </div>	
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">
            <div class="row" style="margin-top:20px;">
                 {!! Form::model($avatar , ['route'   =>  ['bio.update', $avatar->id] , 'method'  =>  'post']) !!}
                <center> {!!Form::label('descricao' , 'Biografia')!!}</center>
                {!!Form::textarea('descricao', null , ['class'  =>  'form-control' , 'placeholder'  =>  'Escreva sobre você para que as pessoas saibam mais quem é você.'])!!}
                {!!Form::submit('Salvar' , ['class' =>  'btn btn-primary pull-right' , 'id' =>  'marginButton'])!!}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</section>  
@endsection
