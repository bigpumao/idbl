@extends('FrontEnd.index')
@section('content')
<div class="nav-backed-header parallax" style="background-image:url(/FrontEnd/images/biblia.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li class="active">Album</li>
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
            <div class="col-md-7">
                <h1>Galeria de Imagem</h1>
            </div>
            <div class="col-md-3">
                {!!Form::open(['route'  =>  'front.albuns.departamento', 'method'   =>  'post'])!!}
                {!!Form::select('departamento' , [
                'jeans' => 'Jeans' , 'kids'   =>  'Kids',
                'louvor'   =>  'Louvor',
                'senhores e senhoras'   =>  'Senhores e Senhoras',
                ] ,null, ['class'    =>  'form-control'])!!}
            </div>
            <div class="col-md-2">
                {!!Form::submit('buscar' , ['class' =>  'btn btn-primary'])!!}
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <ul class="isotope-grid" data-sort-id="gallery">

                    @foreach($albuns as $album)


                    <li class="col-md-3 col-sm-3 grid-item post format-image">
                        <div class="col-md-12">
                            {{$album->nome}}
                        </div>
                        <div class="grid-item-inner"> <a href="{{url('albuns/imagem/'.$album->id)}}" > <img src="/imagem/album/capa_album/{{$album->imagem_capa}}" alt=""> </a> </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="text-align-center">
                {{$albuns->links()}}
            </div>
        </div>
    </div>
</div>
@stop