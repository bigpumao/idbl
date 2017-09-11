<style>
    .margin{
        margin-bottom: 10px;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
        </div>     
    </div>
    <div class="row">
        <div class="col-md-3">
            <h3>
                <a href="{{route('listagem')}}" data-toggle="tooltip" data-placement="top" title="Voltar a Listagem"><i class="fa fa-television"></i></a>
            </h3>
        </div>
        <div class="col-md-3">
            <small>Autor: {{$avatar->name}}</small>            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row margin ">
                <div class="col-md-3">


                    {!! Form::label('departamento','Departamento', array('class'    =>  'control-label')) !!}
                    {!! Form::select('departamento',$departamento,null,['class'  => 'form-control']) !!}
                </div>  
                <div class="col-md-3">
                    {!! Form::label('categoria','Categoria', array('class'    =>  'control-label')) !!}
                    {!! Form::select('categoria',$categoria,null,['class'  => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::label('status','Status', array('class'    =>  'control-label')) !!}
                    {!! Form::select('status',[
                    'null'  =>  'Escolha uma Opção',
                    '0'     =>  'Inativo', '1'   =>  'Ativo',
                    ],null,['class'  => 'form-control']) !!}
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {!! Form::label('titulo','Titulo do Artigo', array('class'    =>  'control-label')) !!}
                    {!! Form::text('titulo',null, array('class' =>  'col-md-4 form-control', 'id'    =>   'titulo')) !!} 
                </div>  
            </div>
            <div class="row">
                <div class="col-md-12">
                    <b>  {!! Form::label('imagem','Imagem', array('class'    =>  'control-label')) !!}</b>
                </div>
            </div>
            @if(Request::route()->getName() == 'edit')
                <div class="row">
                    <div class="col-md-12 col-md-offset-1 margin">
                        <img src="/uploads/postagem/{{$postagem->imagem}}" class="img-rounded" width="800px" height="400px" style="margin-top: 10px;" id="imagem">
                    </div>
                </div>
            @else
            <div class="row">
                <div class="col-md-12 col-md-offset-1 margin">
                    <img src="/uploads/postagem/postagem.jpg" class="img-rounded" width="800px" height="400px" style="margin-top: 10px;" id="imagem">
                </div>
            </div>
            @endif
            <div class="row margin">
                <div class="col-md-4 col-md-offset-2">
                    <small>Selecione a imagem no botão ao lado -></small> 
                </div>
                <div class="col-md-3">
                    {!! Form::file('imagem', array('class'   => 'pull-left'))!!}
                </div>
            </div>

            <div class="col-md-12 margin">
                {!!Form::textarea('descricao',null,['class' => 'form-control',  'id'    =>   'editor1' ])!!}

            </div>
            <div class="row">
                <div class="col-md-11">
                    <button class="pull-right">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</section>