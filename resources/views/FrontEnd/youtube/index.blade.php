@extends('FrontEnd.index')
@section('content')
    <style>
        .youtube{
            width:1000px;
            height:700px;
        }
    </style>
    <div class="nav-backed-header parallax" style="background-image:url(/FrontEnd/images/videos.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li class="active">Vídeos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Nav Backed Header -->
    <!-- Start Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Todos os Vídeos</h1>
                </div>
                {!! Form::open(array('route'  =>  'youtube.search' , 'method' =>  'POST')) !!}
                <div class="col-md-4">
                    <div class="input-group input-group-lg">

                        <input type="text" class="form-control" name="search" placeholder="Pesquisa pelo titulo">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search fa-lg  pull-right"></i></button>
                        </span>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 sermon-archive">
                        <!-- Sermons Listing -->
                        @foreach($youtube as $tube)
                        <article class="post sermon">
                            <header class="post-title">
                                <div class="row">
                                    <div class="col-md-9 col-sm-9">
                                        <h3><a href="single-sermon.html">{{$tube->titulo}}</a></h3>
                                        <span class="meta-data"><i class="fa fa-calendar"></i> Postado em {{date('d/m/Y' , strtotime($tube->created_at))}} </span> </div>
                                    <div class="col-md-3 col-sm-3 sermon-actions"> </div>
                                </div>
                            </header>
                            <div class="post-content">
                                <div class="row">

                                    <div class="col-md-12">

                                        {!! $tube->frame !!}
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        <ul class="pagination">
                            {{$youtube->links()}}
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>

@stop