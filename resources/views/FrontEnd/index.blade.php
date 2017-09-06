<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>{{$titulo or 'Igreja de Deus em Luziânia'}}</title>

        <!-- Mobile Specific Metas
          ================================================== -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        @yield('metatags')
        <!-- CSS
          ================================================== -->
        <link rel="shortcut icon" type="image/x-icon" href="http://idbocidental.com.br/site/wp-content/uploads/2012/03/logo.png">
        <link href="{{url('/')}}/FrontEnd/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/FrontEnd/plugins/mediaelement/mediaelementplayer.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/FrontEnd/css/style.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/FrontEnd/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie8.css" media="screen" /><![endif]-->
        <!-- Color Style -->
        <link class="alt" href="{{url('/')}}/FrontEnd/colors/color1.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/FrontEnd/style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/plugins/lightbox2-master/dist/css/lightbox.css">
        <link rel="stylesheet" href="{{url('/')}}/css/responsiveslides.css">
        <script src="{{url('/')}}/FrontEnd/js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 

        <!-- SCRIPTS
          ================================================== -->
        <script src="{{url('/')}}/FrontEnd/js/modernizr.js"></script><!-- Modernizr -->
        <style>
            .footerMargin{
                margin-top: 5px;
            }
            .oracaoMargin{
                margin-top: 10px;
            }
            .site-header .topbar {
                background-color: rgba(241, 234, 234, 0.28);
            }
           

        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
                <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <div class="body"> 
            <!-- HEADER -->
            @include('FrontEnd.include.header')
            <!-- FIM HEADER --> 

            <!-- Slider Show -->
            @if(Request::route()->getName() == 'front.index')
            @include('FrontEnd.include.slideShow' , $eventos)
            @endif
            <!-- Fim Slider Show --> 
            <!-- Mensagem de Pedido -->

            @if(Session::has('msg'))
            <div class="row oracaoMargin">
                <div class="col-md-6 col-sm-6 col-md-offset-3">
                    <div id="oracao" class="alert alert-success">{{Session::get('msg')}}</div>
                </div>
            </div>
            @endif


            <!-- Fim Mensagem de Pedido -->
            <!-- SideBar -->

            <!-- Fim SideBar -->
            <!-- Content -->
            @yield('content')
            <!--Fim Content-->

            <!-- Ultimas Noticias -->
            @if(Request::route()->getName() == 'front.index')
            <div class="row">

                @include('FrontEnd.include.ultimosEventos', $eventos)
                @if($eventoVideo != null)
                @include('FrontEnd.include.sidebar',$eventoVideo )
                @else
                @include('FrontEnd.include.sidebar' )
                @endif
            </div>
            @endif

            <!-- Fim Ultimas Noticias -->
            <!-- ULTIMAS ATUALIZAÇOES DOS ALBUNS -->
            @if(Request::route()->getName() == 'front.index')
            @include('FrontEnd.include.updateAlbum' ,$albuns)
            @endif
            <!-- FIM ALBUM --> 

            <!-- Start Footer -->
            @if(Request::route()->getName() != 'contato.index' )
            @if(isset($aniver))
            @include('FrontEnd.include.footer',$aniver)
            @endif
            @endif


            @if(isset($sound))
            @include('FrontEnd.include.soundCloud', $sound)
            @else
            @include('FrontEnd.include.soundCloud')
            @endif

            <footer class="site-footer-bottom footerMargin">
                <div class="container">
                    <div class="row">
                        <div class="copyrights-col-left col-md-10 col-sm-6">
                            <p>&copy; 2017. Igreja de Deus no Brasil em Luziânia. Todos os direitos reservados</p>
                            
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <a href="https://www.fb.com/natan.suporte" target="_black"><small class="fa fa-linux"> Developer Natan Melo</small></a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer --> 
            <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> 
        </div>

        <script src="{{url('/')}}/FrontEnd/plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin --> 
        <script src="{{url('/')}}/FrontEnd/js/helper-plugins.js"></script> <!-- Plugins --> 
        <script src="{{url('/')}}/FrontEnd/js/bootstrap.js"></script> <!-- UI --> 
        <script src="{{url('/')}}/FrontEnd/js/waypoints.js"></script> <!-- Waypoints --> 
        <script src="{{url('/')}}/FrontEnd/plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements --> 
        <script src="{{url('/')}}/FrontEnd/js/init.js"></script> <!-- All Scripts --> 
        <script src="{{url('/')}}/FrontEnd/plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
        <script src="{{url('/')}}/FrontEnd/plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer --> 
        <script src="{{url('/')}}/FrontEnd/style-switcher/js/jquery_cookie.js"></script> 
        <script src="{{url('/')}}/FrontEnd/style-switcher/js/script.js"></script> 
        <script src="{{url('/')}}/plugins/lightbox2-master/dist/js/lightbox.js"></script>
        <script src="{{url('/')}}/js/responsiveslides.min.js"></script>



        <!-- Style Switcher Start -->
        <script type="text/javascript">
$(document).ready(function () {
    setTimeout(function () {
        $('#oracao').fadeOut(1500);
    }, 15000);
});
        </script>
        @if(Request::route()->getName() != 'contato.index')
        @if(Session::has('errors'))
        <script>
            $(document).ready(function () {
                alert('Ops!! Alguns campos no seu formulário estão vazios. Vamos abrir novamente para que possamos corrigir. ;) ');
                $('#product_view').modal('show');
            });

        </script>
        @endif

        @endif
        <script type="text/javascript">
            $(document).ready(function () {
                $("#pedidoOracao").click(function () {
                    $('#product_view').modal('show');
                });
            });
        </script>
    </body>
</html>