<style>
    b{
        color: black;
    }


</style>
<div class="modal fade product_view" id="product_view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title"><center>Faça já seu pedido de oração. Teremos prazer em orar por você.</center></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img src="/imagem/frontEnd/pedidoDeOracao.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        <h4><b>Leia com Atenção</b> <span></span></h4>
                        <div class="rating">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            Como funciona o pedido de oração.
                        </div>
                        <p>
                            O pedido de oração, é enviado para os lideres da igreja. Existe <b>duas opções</b> :<br/>
                            <b>1.</b>	O seu pedido de oração pode ser <b>privado</b> onde, somente os Pastores poderam visualizar.<br/>
                            <b>2.</b>	O seu pedido de oração pode ser <b>publico</b> onde, os Pastores, o grupo de oração e todos que visualizam o site poderam visualizar e contribuir na oração.<br/><br/>
                            <b>OBS: Onde somente seu nome e o titulo do pedido de sua oração, ira aparecer no site.</b>
                        <hr>

                    </div>
                </div>
                <div class="row">
                    <h3><center>1˚ Tessalonicenses 1:2</center></h3>
                    <p>
                        <b>Sempre damos graças a Deus por vós todos, fazendo menção de vós em nossas orações,</b>

                    </p>
                </div>
                {!!Form::open(array('route'   =>  'front.pedidoOracao',   'method'    =>  'POST'))!!}
                <div class="col-md-12">
                    @if(Session::has('errors'))
                    <div class="alert alert-error">
                        
                        @foreach($errors->all() as $error)
                            {{$error}}<br>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-2">
                        {!!Form::label('secret','Tipo de privacidade',['class'   =>  'label-form'])!!}
                        {!!Form::select('secret' , [
                            'publico'   =>      'Publico',  'privado'   =>  'Privado',
                        ],null,['class' =>  'form-control'])!!}
                        
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        {!!Form::label('area','Área',['class'   =>  'label-form'])!!}
                        {!!Form::select('area' , [
                        'pessoal'           =>  'Pessoal',       'familia'       =>  'Familia',
                        'crecimento'        =>  'Crecimento',    'estudo'        =>  'Estudo',
                        'casaPropia'        =>  'Casa Propria',  'conversao'     =>  'Conversão',
                        'trabalho'          =>  'Trabalho',      'missoes'       =>  'Missões',
                        'viagem'            =>  'Viagem',        'saude'         =>  'Saúde',
                        'gravdez'           =>  'Gravidez',      'finanças'      =>  'Finanças',
                        'acoes de graça'    =>  'Ações de Graça','matrimonial'   =>  'Matrimonial',
                        'igreja'            =>  'Igreja',
                        
                        ],null,['class'    =>  'form-control'])!!}

                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        {!!Form::label('nome','Nome',['class'   =>  'label-form'])!!}
                        {!!Form::text('nome',null,['class'   =>  'form-control','id' =>  'nome'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        {!!Form::label('email','E-Mail',['class'   =>  'label-form'])!!}
                        {!!Form::text('email',null,['class'   =>  'form-control' , 'id' =>  'email'])!!}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        {!!Form::label('titulo','Titulo',['class'   =>  'label-form'])!!}
                        {!!Form::text('titulo',null,['class'   =>  'form-control','id' =>  'titulo'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        {!!Form::label('descricao','Descrição',['class'   =>  'label-form'])!!}
                        {!!Form::textarea('descricao',null,['class'   =>  'form-control','id' =>  'descricao'])!!}
                    </div>
                </div>
                <div class="space-ten"></div>
                <div class="btn-ground">
                    <button type="submit" class="btn btn-primary">Enviar Pedido</button>

                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
</div>
</div>