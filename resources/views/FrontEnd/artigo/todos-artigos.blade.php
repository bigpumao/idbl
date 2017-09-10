@extends('FrontEnd.index')
@section('content')
<style>
    .img{
        height: 300px;
        width:  600px;
    }
    .avatar{
        height: 50px;
        width: 50px;
    }
</style>
<div class="nav-backed-header parallax" style="background-image:url(/FrontEnd/images/biblia.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li class="active">Blog</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Todos os Artigos</h1>
            </div>
            {!! Form::open(array('route'    =>  'front.search' , 'method'    =>  'POST')) !!}
                <div class="col-md-4">
                    <div class="input-group input-group-lg">

                        <input type="text" class="form-control" name="search" placeholder="Pesquisa pelo titulo">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search fa-lg  pull-right"></i></button>
                        </span>

                    </div>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-12 posts-archive blog-full-width">
                    @if(isset($artigos))
                    @foreach($artigos as $artigo)
                    <article class="post"> 
                        <div class="row">
                            <div class="col-md-2">
                                <img class="avatar img-circle" src="/uploads/avatars/{{$artigo->departamento->user->avatar}}">
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-4 col-sm-4">
                                <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($artigo->created_at)); ?></span>
                                    <span><i class="fa fa-archive"></i>Departamento : {{$artigo->departamento->departamento}}</span>
                                    <span><i class="fa fa-user-circle-o"></i>Autor : {{$artigo->departamento->user->name}}</span></span>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h3><a href="#">{{$artigo->titulo}}</a></h3>
                                <a href="#"><img class="img" src="/uploads/postagem/{{$artigo->imagem}}"  alt="" class="img-thumbnail"></a>
                                <p><?php echo substr($artigo->descricao, 0, 600) . " ..."; ?></p>
                                <p><a href="{{url('blog/artigo/'.$artigo->id)}}" class="btn btn-primary">Continue lendo <i class="fa fa-long-arrow-right"></i></a></p>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    <ul class="pagination">
                        {!! $artigos->links()!!}
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
