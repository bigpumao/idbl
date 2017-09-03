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
    .margin{
        margin-bottom: 10px;
    }
</style>
<div class="nav-backed-header parallax" style="background-image:url(/FrontEnd/images/todos-artgos-departamento.jpg);">
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
            <div class="col-md-7">
                <h1>Todos os Artigos</h1>
            </div>
            <div class="col-md-3">
                {!!Form::open(array('route' =>  'buscaDepartamento', 'method'    =>  'post'))!!}

                {!!Form::select('departamento' , [
                'jeans'   =>  'Jeans',
                'senhores e senhoras'  =>  'Senhores & Senhoras',
                'geral'  =>  'Geral' ,
                'louvor' => 'Grupo de Louvor',
                'kids'  =>  'Kids',
                ]
                ,null,['class'  =>  'form-control'])!!}
            </div>
            <div class="col-md-2">
                {!!Form::submit('buscar', ['class'  =>  'btn btn-primary'])!!}
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



                    @foreach($join as $artigo)
                    <article class="post"> 
                        <div class="row">
                            <div class="col-md-2">
                                <img class="avatar img-circle" src="/uploads/avatars/{{$artigo->avatar}}">
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-4 col-sm-4">
                                <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i><?php echo date('d/m/Y', strtotime($artigo->created_at)); ?></span>
                                    <span><i class="fa fa-archive"></i>Departamento : {{$artigo->departamento}} </span>
                                    <span><i class="fa fa-user-circle-o"></i>Autor : {{$artigo->name}} </span></span>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h3><a href="#">{{$artigo->titulo}}</a></h3>
                                <a href="#"><img class="img" src="/uploads/postagem/{{$artigo->imagem}}"  alt="" class="img-thumbnail"></a>
                                <p><?php echo substr($artigo->descricao, 0, 600) . "..."; ?></p>
                                <p><a href="{{url('blog/artigo/'.$artigo->id)}}" class="btn btn-primary">Continue lendo <i class="fa fa-long-arrow-right"></i></a></p>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    <ul class="pagination">
                        {!! $join->links()!!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
