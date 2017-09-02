<div class="content">
    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('album.index')}}" data-toggle="tooltip" data-placement="top" title="Listas dos albuns"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
        </div>
    </div>
    <div class="row">
        @if(Session::has('msg'))
        <div id="msg" class="col-md-4 col-md-offset-4 alert alert-success">{{Session::get('msg')}}</div>
        @endif
    </div>
    
    <div class="row">

        <div class="col-md-6 col-md-offset-3">


            {!!Form::label('descricao','Descrição da Imagem')!!}
            {!!Form::text('descricao','',['class' =>  'form-control'])!!}
            <input type="file" name="imagem"/>

        </div>
    </div>    
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <button class="btn btn-primary pull-right">Salvar</button>
        </div>
    </div>

</div>
</div>
</div>