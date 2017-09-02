@extends('FrontEnd.index')
@section('content')
<style>
    .quemsomos{
        width:  400px;
        height: 200px;
        
    }
    .margin{margin-top: 40px;}
</style>    
<div class="nav-backed-header parallax" style="background-image:url(images/slide2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li><a class="active" href="#">Quem Somos?</a></li>

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
                <h1>Igreja de Deus no Brasil em Luziânia</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header --> 
<div class="container margin">
    <div class="row">
        <div class="col-md-12">
            <p>  Mussum Ipsum, cacilds vidis litro abertis. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Casamentiss faiz malandris se pirulitá. Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.
                Mussum Ipsum, cacilds vidis litro abertis. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Casamentiss faiz malandris se pirulitá. Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.
                Mussum Ipsum, cacilds vidis litro abertis. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Casamentiss faiz malandris se pirulitá. Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.
                Mussum Ipsum, cacilds vidis litro abertis. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Casamentiss faiz malandris se pirulitá. Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.
            </p>
        </div>
    </div>
</div>
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="grid-item staff-item">
                        <div class="grid-item-inner">
                            <div class="media-box"> <img class="quemsomos" src="/imagem/frontEnd/pr.nativomelo.jpg"  alt=""> </div>
                            <div class="grid-content">
                                <h3>Bispo Nativo de Melo</h3>
              <!--                  <nav class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a></nav>-->
                                <p>
                                    Uma descricao do pr.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="grid-item staff-item">
                        <div class="grid-item-inner">
                            <div class="media-box"> <img class="quemsomos"  src="/imagem/frontEnd/cleber.espindola.jpg" alt=""> </div>
                            <div class="grid-content">
                                <h3>Cleber Espindola</h3>
              <!--                  <nav class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> </nav>-->
                                <p>
                                    Uma breve descricao do Cleber
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="grid-item staff-item">
                        <div class="grid-item-inner">
                            <div class="media-box"> <img class="quemsomos"  src="images/staff3.jpg" alt=""> </div>
                            <div class="grid-content">
                                <h3>Pr. Bebeto</h3>
              <!--                  <nav class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> </nav>-->
                                <p>
                                    Uma breve descricao do Pr. Bebeto
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop