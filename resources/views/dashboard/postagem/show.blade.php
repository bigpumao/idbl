@extends('dashboard')
@section('content')
<style>
    .margin{
        margin-bottom: 50px;    
    }
    img{
        margin:  10px;
    }
</style>

<section class="content">

    <div class="row">
        <div class="col-md-2">
            <h2> <a href="{{route('listagem')}}"<i class="fa fa-television"></i></a></h2>
        </div>
        <div class="col-md-2">
            <small>Autor: {{$usuario->name}}</small>
        </div>
        <div class="col-md-2">
            @if($postagem->status == 1)
            <small>Status: Ativo</small>
            @else
            <small>Status: Inativo</small>
            @endif
        </div>
        <div class="col-md-3">
            <small>Data da publicação: {{date('d/m/Y', strtotime($postagem->created_at))}}</small>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-1">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        <img src="/uploads/postagem/{{$postagem->imagem}}" class="img-rounded" alt="Cinque Terre" width="800" height="400" style="margin-top: 15px;">
                    </div>
                </div>
            </div>
            <div class="row margin">
                <div class="col-md-4 col-md-offset-3">
                    <h2><b>{!!$postagem->titulo!!}</b></h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-md-offset-1">
            <div class="row">
                    <div class="col-md-10">
                        {!!$postagem->descricao!!} 
                    </div>
            </div>
        </div>

</section>
@endsection