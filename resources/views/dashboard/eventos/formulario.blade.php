<div class="section">
    <style>
        .margin{
            margin-top:10px; 
        }
    </style>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <h2><a href="{{route('eventos.index')}}" data-toggle="tooltip" data-placement="top" title="Listagem de Eventos"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
            </div>
        </div>
        <div class="row">
            @if(Session::has('msg'))
            <div class="alert alert-success">{{Session::get('msg')}}</div>
            @elseif(Session::has('error'))
            <div class="alert alert-error">{{Session::get('error')}}</div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-5">
                @if(count($errors))
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach        
                        </ul>
                    </div>
                </div>    
                @endif
            </div>
        </div>    

        <div class="col-md-12">

            <div class="row">
                <div class="col-md-2">
                    {!!Form::label('checkbox','Slide Show',['class'    =>  'label-control'])!!}
                    {{ Form::select('checkbox',[false =>'Inativo',true =>  'Ativo'],null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-2">
                    {!!Form::label('dataInicio','Data de Inicio',['class'    =>  'label-control'])!!}
                    {!!Form::date('data_inicio', null, ['class'  =>  'form-control datepicker','id'    =>  'dataInicio',   'placeholder'   =>  'Click Data do Evento'])!!}
                </div>
                <div class="col-md-2">
                    {!!Form::label('dataFim','Data do Fim',['class'    =>  'label-control'])!!}
                    {!!Form::date('data_fim', null, ['class'  =>  'form-control datepicker','id'    =>  'dataFim',   'placeholder'   =>  'Click Data do Evento'])!!}
                </div>
                <div class="col-md-3">
                    {!!Form::label('categoria','Local',['class'    =>  'label-control'])!!}
                    {{ Form::text('categoria',null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-2">
                    {!!Form::label('status','Status',['class'    =>  'label-control'])!!}
                    {{ Form::select('status',['0'=>'Inativo','1' =>  'Ativo'],null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row">

                <div class="col-md-8">
                    @if(Request::is('*/create'))
                    {!!Form::label('imagem','Imagem do Evento',['class'    =>  'label-control'])!!}
                    <img  src="/imagem/igreja/File/eventos/eventos.jpg" width="950px;" height="500px;">
                    @else
                    {!!Form::label('imagem','Imagem do Evento',['class'    =>  'label-control'])!!}
                    <img  src="/imagem/igreja/File/eventos/{{$update->imagem}}" width="950px;" height="500px;">
                    @endif
                </div>
                <div class="col-md-4">
                    {!!Form::file('imagem',null,['class'  => 'pull-rigth btn-file'])!!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {!!Form::label('titulo','Titulo do Evento',['class'    =>  'label-control'])!!}
                    {!!Form::text('titulo',null,['class' =>  'form-control','id' => 'titulo'])!!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12  margin">
                    {!!Form::textarea('descricao',null, ['class' =>  'form-control','cols'   => '50','rows'=>'15','id'=>'editor1'])!!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-5">
                    <button class="button btn btn-default fa fa-floppy-o pull-right" type="submit"> Salvar</button>
                </div>
            </div>

        </div>
    </div>
</div>