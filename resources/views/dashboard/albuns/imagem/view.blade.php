@extends('dashboard')
@section('content')
<style>
    .album{
        width: 150px;
        height: 150px;
    }
</style>
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('album.index')}}" data-toggle="tooltip" data-placement="top" title="Listas dos Albuns"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            @if(Session::has('msg'))
            <div id="msg" class="alert-success">{{Session::get('msg')}}</div>
            @endif
        </div>
    </div>
    
    <div class="row">    
        @foreach ($album as $albuns)
           
            <div class="col-md-2">
               
                <a href="{{url('dashboard/album/imagem-destroy/'. $albuns->id  )}}"><li class="fa fa-trash-o pull-right"></li></a>
                <div>  
                    <a href="/imagem/album/imagens/{{$albuns->imagem}}" data-lightbox="image-1" data-title="{{$albuns->descricao}}">  <img class="img-bordered album" src="/imagem/album/imagens/{{$albuns->imagem}}"></a>
                </div>
            </div>
            
        @endforeach

    </div>
</div>
@stop