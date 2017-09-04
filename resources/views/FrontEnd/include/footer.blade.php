<style>
    .margin{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .marginContato{
        margin-top: 70px;
    }
    a:link 
    { 
        text-decoration:none; 
    } 
    .rslides {
        position: relative;
        list-style: none;
        overflow: hidden;
        width: 100%;
        padding: 0;
        margin: 0;
    }

    .rslides li {
        -webkit-backface-visibility: hidden;
        position: absolute;
        display: none;
        width: 100%;
        left: 0;
        top: 0;
    }

    .rslides li:first-child {
        position: relative;
        display: block;
        float: left;
    }

    .rslides img {
        display: block;
        height: auto;
        float: left;
        width: 100%;
        border: 0;
    }
    #aniversario{
        width: 316px;
        height: 230px;
    }

</style>

<footer class="site-footer margin">
    <div class="container">
        <div class="row"> 
            <!-- Start Footer Widgets -->
            <div class="col-md-4 col-sm-4 widget footer-widget">
                <h4 class="footer-widget-title">Pedido de Oração</h4>
                <img src="/imagem/frontEnd/oracao.jpg" alt="Logo">
                <div class="spacer-20"></div>
                <center><small>Tiago 5:16</small></center>
                <p> Confessai as vossas culpas uns aos outros, e orai uns pelos outros, para que sareis. A oração feita por um justo pode muito em seus efeitos.</p>
                <div class="row">
                    <div class="col-md-2 col-md-offset-3">
                        <button id="pedidoOracao" type="button" data-toggle="modal" data-target="#product_view" class="btn btn-default btn-lg">Clique aqui</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 widget footer-widget">
                <h4 class="footer-widget-title">Outras Igrejas de Deus</h4>
                <ul>
                    <li><a href="https://www.mcgi.org/pt/welcome/" target="_blank">Igreja de Deus Internacional</a></li>
                    <li><a href="http://igrejadedeus.org.br" target="_blank">Igreja de Deus Nacional</a></li>
                    <li><a href="http://idbocidental.com.br" target="_blank">Igreja de Deus Distrital</a></li>
                    <li><a href="http://www.igrejadedeusguara.com.br" target="_blank">Igreja de Deus no Guara DF</a></li>
                </ul>
                <div class="row marginContato">
                    <div>
                        <h4 class="footer-widget-title">Entre em contato com a gente</h4>

                        <button type="button" class="btn btn-default btn-lg"><a href="/contato/index">Contato</a></button>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 widget footer-widget">

                @if(empty($aniver))
                <h4 class="footer-widget-title">Nossa página na rede social</h4>
                <div class="fb-page" data-href="https://www.facebook.com/Igreja-de-Deus-em-Luzi&#xe2;nia-Goias-1930365473898071/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Igreja-de-Deus-em-Luzi&#xe2;nia-Goias-1930365473898071/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Igreja-de-Deus-em-Luzi&#xe2;nia-Goias-1930365473898071/">Igreja de Deus em Luziânia Goias</a></blockquote></div>
                @else
                <h4 class="footer-widget-title">Aniversariante do Dia</h4>

                <ul class="rslides">    

                    @foreach($aniver as $aniversario)
                    <li><img src="/imagem/igreja/membros/{{$aniversario->imagem}}" alt="">
                        <div>
                            <center><h5>{{$aniversario->nome}}</h5></center>
                        </div>


                    </li>
                    @endforeach
                    <li><img id="aniversario" src="/imagem/frontEnd/feliz-aniversario.jpg" alt="">
                </ul>
                @endif



            </div>
        </div>
    </div>
</footer>

@include('FrontEnd.modal.pedidoOracao')


<script>
    $(function () {
        $(".rslides").responsiveSlides({
            auto: true,
            speed: 500,

        });
    });
</script>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10&appId=176243222781930";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>