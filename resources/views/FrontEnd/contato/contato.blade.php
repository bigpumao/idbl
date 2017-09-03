@extends('FrontEnd.index')
@section('content')
<style>
    .margin{margin-top: 60px; }
</style>

<div class="nav-backed-header parallax margin"  style="background-image:url(/FrontEnd/images/contato.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li class="active">Contato</li>
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
            <div class="col-md-12">
                <h1>Contato</h1>
            </div>
        </div>
    </div>
</div>


@if(Session::has('sucesso'))
<div class="row oracaoMargin">
    <div id="msg" class="col-md-6 col-sm-6 col-md-offset-3">
        <div id="contato" class="alert alert-success">{{Session::get('sucesso')}}</div>
    </div>
</div>
@endif

<!-- End Page Header --> 
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
            <div class="row">
                @if(Session::has('errors'))
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}}<br/>
                    @endforeach
                </div>
                @endif
            </div>
                <div class="col-md-9">
                    <header class="single-post-header clearfix">
                        <h5 class="post-title">Igreja de Deus em Luziânia</h5>
                    </header>
                    <div class="post-content">
                        <div id="gmap">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d795.4782909314299!2d-47.9229453574898!3d-16.258163944538072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93599820565e1501%3A0x311b502163682522!2sAv.+Contorno%2C+50+-+Parque+Estrela+Dalva+I%2C+Luzi%C3%A2nia+-+GO%2C+72804-020!5e1!3m2!1spt-BR!2sbr!4v1503953087881" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="row">
                            {!!Form::open(array('route'  =>  'contato.store' , 'method'  =>  'POST'))!!}
                            <div class="col-md-6 margin-15">
                                <div class="form-group">
                                    {!!Form::text('nome' , null, ['class'   =>   'form-control input-lg', 'placeholder' =>  'Nome *'])!!}
                                   
                                </div>
                                <div class="form-group">
                                    {!!Form::text('email' , null, ['class'   =>   'form-control input-lg', 'placeholder' =>  'E-Mail *'])!!}
                                </div>
                                <div class="form-group">
                                    {!!Form::text('telefone' , null, ['class'   =>   'form-control input-lg', 'placeholder' =>  'Telefone *'])!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!!Form::textarea('mensagem' , null, ['class'   =>   'form-control input-lg', 'placeholder' =>  'Escreva sua mensagem *'])!!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Enviar">
                            </div>
                            {!!Form::close()!!}
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div id="message"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $('#contato').fadeOut(1500);
        }, 10000);
    });
</script>