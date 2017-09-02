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
                <h4 class="footer-widget-title">Igreja de Deus nas Redes Sociais</h4>
                <ul class="facebook">

                </ul>
            </div>
        </div>
    </div>
</footer>

@include('FrontEnd.modal.pedidoOracao')