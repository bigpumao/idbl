<style>
    .navigation{
        background:rgba(243, 241, 245, 0.33)!important;
    }
</style>   
<header class="site-header transparente">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-6 col-xs-8">
                    <h1 class="logo"> <a href="{{url('/')}}"><img src="{{url('/')}}/FrontEnd/images/logo_idb.png" alt="Logo"></a> </h1>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-4">
                    <ul class="top-navigation hidden-sm hidden-xs">
                        @if(Request::route()->getName() == 'front.index')
                        <li><a href="{{route('login')}}">Administrativo</a></li>
                        @endif
                    </ul>
                    <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navigation">
                        <ul class="sf-menu">
                            <li><a href="{{route('front.index')}}">Home</a></li>
                            <li><a href="#">Quem Somos</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('quemSomos.index')}}">Visão Geral</a></li>
                                    <li><a href="{{route('contato.index')}}">Contato</a></li>
                                </ul>
                            </li>
                            <li class="megamenu"><a href="#">Mapa do Site </a>
                                <ul class="dropdown">
                                    <li>
                                        <div class="megamenu-container container">
                                            <div class="row">
                                                <div class="col-md-4 hidden-sm hidden-xs"> <span class="megamenu-sub-title"><i></i><center>História da Igreja de Deus</center></span>
                                                    <iframe width="640" height="360" src="https://www.youtube.com/embed/TauvAvH87YI" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="col-md-4"> <span class="megamenu-sub-title"><i></i>Departamentos</span>
                                                    <ul class="sub-menu">
                                                        <li><a href="{{url('/departamento/search/jeans')}}">Jeans</a></li>
                                                        <li><a href="{{url('/departamento/search/louvor')}}">Ministério de Louvor</a></li>
                                                        <li><a href="{{url('/departamento/search/senhores e senhoras')}}">Ministério de Senhores e Senhoras</a></li>
                                                        <li><a href="{{url('/departamento/search/kids')}}">Ministério Kids </a></li>
                                                        <li><a href="{{url('/departamento/search/geral')}}">Geral</a></li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="col-md-4"> <span class="megamenu-sub-title"><i></i> Outros</span>
                                                    <ul class="sub-menu">    
                                                        <li><a href="{{route('contato.index')}}">Contato</a></li>
                                                        <li><a href="{{route('getall')}}">Download</a></li>

                                                        <li><a id="pedidoOracao"  onclick="oracaoPedido()" href="#pedidoOracao">Pedido de Oração</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Eventos</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('eventosfront.index')}}">Todos do Eventos</a></li>

                                </ul>
                            </li>
                            <li><a href="#">Vídeos & Sons</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('youtube.index')}}">Vídeos </a></li>
                                    <li><a href="{{route('sound.getall')}}">Sons </a></li>
                                </ul>
                            </li>
                            <li><a href="#">Galeria</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('front.albuns.index')}}">Departamentos</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('front.allArtigos')}}">Blog</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>