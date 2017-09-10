@extends('FrontEnd.index')


@section('content')
    <style>
        .margin {
            margin-top: 50px;
        }

        .avatar {
            width: 80px;
            height: 80px;

        }

        .imagemAvatar {
            margin-top: 20px;
        }

        div > .biografia {
            margin-top: 100px;
        }

    </style>
@section('metatags')
    @foreach($artigos as $post)
        <meta property="og:url" content="{{url('/')}}/blog/artigo/{{$post->id}}"/>
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="{{$post->titulo}}"/>
        <meta property="og:description" content="{{$post->descricao}}"/>
        <meta property="og:image" content="{{url('/')}}/uploads/postagem/{{$post->imagem}}"/>
    @endforeach
@endsection

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
<div class="main margin" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <header class="single-post-header clearfix">

                        @foreach($artigos  as $artigo)

                            <h2 class="post-title">
                                <center> {{$artigo->titulo}}</center>
                            </h2>
                    </header>
                    <article class="post-content"> 
                        <span class="post-meta meta-data">
                            <span><i class="fa fa-calendar"></i> Postada em: {{date('d/m/Y' , strtotime($artigo->created_at))}}</span> 
                            <span><i class="fa fa-archive"></i> Categoria: {{$artigo->departamento['departamento']}}</span>

                        </span>

                        <div class="featured-image"><img src="{{url('/')}}/uploads/postagem/{{$artigo->imagem}}" alt="">
                        </div>
                        <p>{!!$artigo->descricao!!}</p>

                    </article>
                    <div class="row biografia">
                        <div class="col-md-12">
                            <div class="row">
                                @if($artigo->departamento->user->biografia == null)
                                    <div class="col-md-4">
                                        <img id="element" onmouseover="pop()" data-container="body" data-html="true"
                                             data-toggle="popover" data-placement="right"
                                             data-content=" Nome: {{$artigo->departamento->user->name}} <br> Biografia nao cadastrada"
                                             class="img-thumbnail avatar"
                                             src="/uploads/avatars/{{$artigo->departamento->user->avatar}}" alt="">
                                    </div>
                                @else

                                    <div class="col-md-4">
                                        <img id="element" onmouseover="pop()" data-container="body" data-html="true"
                                             data-toggle="popover" data-placement="right"
                                             data-content=" Nome: {{$artigo->departamento->user->name}}  <br> Biografia: <br>{{$artigo->departamento->user->biografia->descricao}} "
                                             class="img-thumbnail avatar"
                                             src="/uploads/avatars/{{$artigo->departamento->user->avatar}}" alt="">
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                {{--SideBar--}}
                <div class="col-md-3 sidebar">
                    <div class="widget sidebar-widget">
                        <div class="sidebar-widget-title">
                            <h5>Outros Artigos do Autor</h5>
                        </div>
                        <ul>

                            @foreach($categorias as $relacion)
                                @foreach($relacion->postagens as $postagem)
                                    <li><a href="{{url('/')}}/blog/artigo/{{$postagem->id}}">{{$postagem->titulo}}</a>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>

                        {{$categorias->links()}}
                    </div>
                    <div class="widget sidebar-widget">
                        <div class="sidebar-widget-title">
                            <h3>Post Tags</h3>
                        </div>
                        <div class="tag-cloud"><a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a
                                    href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a
                                    href="#">Missions</a> <a href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a>
                            <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a
                                    href="#">Missions</a> <a href="#">Worship</a></div>
                    </div>
                    <div class="row">
                        {!! Form::select('categoria' , ['placeholder'  =>  'Selecione uma categoria']) !!}
                    </div>
                </div>
                {{--Fim SideBar--}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2" >
                <section class="post-comments">
                    @include('FrontEnd.scripts.facebook')
                </section>
                <?php $url['url'] = Request::url(); ?>
                @include('FrontEnd.scripts.scrptComments' , $url)
                <section class="post-comments" id="comments">
                    <h3><i class="fa fa-comment"></i> Comentários</h3>

                    @include('FrontEnd.scripts.comments' , $url)
                </section>
            </div>

        </div>


        @endforeach

    </div>
</div>


@stop
<script>
    function pop() {
        $('#element').popover('toggle')
    }
</script>