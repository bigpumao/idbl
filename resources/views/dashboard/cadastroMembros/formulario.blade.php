<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-3">
            <h3>
                <a href="{{route('membro.index')}}" data-toggle="tooltip" data-placement="top" title="Voltar a Listagem"><i class="fa fa-television"></i></a>
            </h3>
            <hr>
        </div>
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
    
    <div class="row">
        <div class="col-md-2">
            <img src="/imagem/igreja/logo/logo_idb1.png"  alt="" width="100px" heigth="100px">
        </div>
        <div class="col-md-3">
            <h3 style="color:red;"><center>IGREJA DE DEUS NO BRASIL</center></h3>
        </div>
        <div class="col-md-3">
            @if(Request::route()->getName() == 'membro.create')
            <b> Ficha de numero {{$ficha += 1}}</b>
            @else
            <b> Ficha de numero {{$numFicha->id}}</b>
            @endif
        </div>
        <div class="col-md-4">
            @if(Request::route()->getName()== "membro.create")
            <img src="/imagem/igreja/membros/avatar.jpg" name="imagem" alt="" width="100px" heigth="100px">
            @else
            <img src="/imagem/igreja/membros/{{$membro->imagem}}" name="imagem" alt="" width="100px" heigth="100px">   
            @endif     
            {!! Form::label('imagem', 'Imagem', ['class'    =>  'control-label']) !!} 
            {!! Form::file('imagem', ['class'   =>  'file form-control']) !!}
        </div>
    </div>

    <div class="row" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('nome', 'Nome ', ['class'    =>  'control-label']) !!}
                    {!! Form::text('nome', null, ['class'    =>  'form-control', 'id'    =>    'nome']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('cep', 'CEP ', ['class'    =>  'control-label']) !!}
                    {!! Form::text('cep', null, ['class'    =>  'form-control', 'id'    =>    'cep']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('rua', 'Rua ', ['class'    =>  'control-label']) !!}
                    {!! Form::text('endereco', null, ['class'    =>  'form-control', 'id'    =>    'rua']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('bairro', 'Bairro ', ['class'    =>  'control-label']) !!}
                    {!! Form::text('bairro', null, ['class'    =>  'form-control', 'id'    =>    'bairro']) !!}
                </div>
            </div>
            <div class="col-md-3">
                {!! Form::label('cidade', 'Cidade ', ['class'    =>  'control-label']) !!}
                {!! Form::text('cidade', null, ['class'    =>  'form-control', 'id'    =>    'cidade']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('uf', 'Estado ', ['class'    =>  'control-label']) !!}
                {!! Form::text('estado', null, ['class'    =>  'form-control', 'id'    =>    'uf']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('fone', 'telefone ', ['class'    =>  'control-label']) !!}
                {!! Form::text('fone', null, ['class'    =>  'form-control', 'id'    =>    'fone']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="fone">Data do Nacimento</label>
                <div class="input-group bfh-datepicker-toggle " data-toggle="bfh-datepicker">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                    {!! Form::date('dataNasc', null, ['class'   =>  'form-control datepicker',  'placeholder'   =>  'Click aqui']) !!}
                </div>
            </div>
            <div class="col-md-4">
                {!! Form::label('naturalidade', 'Naturalidade', ['class'    =>  'control-label']) !!}
                {!! Form::text('naturalidade', null, ['class'    =>  'form-control', 'id'    =>    'naturalidade']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::label('nacionalidade', 'Nacionalidade', ['class'    =>  'control-label']) !!}
                {!! Form::text('nacionalidade', null, ['class'    =>  'form-control', 'id'    =>    'nacionalidade']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                {!! Form::label('filiacao', 'Ficiação', ['class'    =>  'control-label']) !!}
                {!! Form::text('filiacao', null, ['class'    =>  'form-control', 'id'    =>    'filiacao']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::label('rg', 'Registro Geral ', ['class'    =>  'control-label']) !!}
                {!! Form::text('rg', null, ['class'    =>  'form-control', 'id'    =>    'rg']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::label('cpf', 'Cadastro de Pessoa Fisica (CPF)', ['class'    =>  'control-label']) !!}
                {!! Form::text('cpf', null, ['class'    =>  'form-control', 'id'    =>    'cpf']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                {!! Form::label('tituloEleitoral', 'Titulo Eleitoral', ['class'    =>  'control-label']) !!}
                {!! Form::text('tituloEleitoral', null, ['class'    =>  'form-control', 'id'    =>    'tituloEleitoral']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('escolaridade', 'Escolaridade', ['class'    =>  'control-label']) !!}
                {!! Form::text('escolaridade', null, ['class'    =>  'form-control', 'id'    =>    'escolaridade']) !!}
            </div>
            <div class="col-md-3">

                {!! Form::label('estadoCivil', 'Estado Civil', ['class' =>  'control-label']) !!}


                {!! Form::select('estadoCivil', [
                '0'=>   'Escolha uma opção',    'solteiro'   =>  'Solteiro',
                'casado'    =>  'Casado',   'divorciado'    =>  'divorciado',
                'viuvo' =>  'viúvo'   ],
                null, ['class'  =>  'form-control']) 
                !!}

            </div>
            <div class="col-md-3">
                {!! Form::label('nomeConjuge', 'Nome do Cônjuge', ['class'    =>  'control-label']) !!}
                {!! Form::text('nomeConjuge', null, ['class'    =>  'form-control', 'id'    =>    'nomeConjuge']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                {!! Form::label('quantFilhos', 'Quantidade de Filhos', ['class'    =>  'control-label']) !!}
                {!! Form::selectRange('quantFilhos', 0,7, null,['class'  =>  'form-control',    'id'    =>  'quantFilhos'])  !!}
            </div>
            <div class="col-md-4">
                {!! Form::label('sexFilho', 'Sexo do Filho', ['class'   =>  'control-label']) !!}<br>

                {{--  {{ Form::radio('example', 1, true, ['class' => 'field']) }}  --}}
                Homem  {{ Form::radio('sexFilho', 'H', null ,['class'    =>  'radio-inline']) }}
                Mulher {{ Form::radio('sexFilho', 'M', null ,['class'    =>  'radio-inline']) }}
                Nenhum {{ Form::radio('sexFilho', 'N', null ,['class'    =>  'radio-inline']) }}
            </div>
            <div class="col-md-3">
                <label for="dateConversao">Data da Conversão</label>
                <div class="input-group bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>

                    {!! Form::date('dataConversao', null, ['class'  =>  'form-control datepicker', 'placeholde' =>  'Click aqui']) !!}

                </div>

            </div>
            <div class="col-md-3">
                {!! Form::label('igrejaConversao', 'Igreja onde se Converteu', ['class'    =>  'control-label']) !!}
                {!! Form::text('igrejaConversao', null, ['class'    =>  'form-control', 'id'    =>    'igrejaConversao']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="dataBatismo">Data do Batismo</label>
                <div class="input-group bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                    {!! Form::date('dataBatismo', null, ['class'  =>  'form-control datepicker', 'placeholde' =>  'Click aqui']) !!}
                </div>
            </div>
            <div class="col-md-4">
                {!! Form::label('lugar', 'Igreja onde se Batizou', ['class'    =>  'control-label']) !!}
                {!! Form::text('lugar', null, ['class'    =>  'form-control', 'id'    =>    'lugar']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::label('ministro', 'Ministro que lhe Batizou', ['class'    =>  'control-label']) !!}
                {!! Form::text('ministro', null, ['class'    =>  'form-control', 'id'    =>    'ministro']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="fone">Data da Membrecia</label>
                <div class="input-group bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                    {!! Form::date('primeiraMembrecia', null, ['class'  =>  'form-control datepicker', 'placeholde' =>  'Click aqui']) !!}
                </div>
            </div>
            <div class="col-md-4">
                {!! Form::label('igrejaMembrecia', 'Igreja da primeira Membrecia', ['class'    =>  'control-label']) !!}
                {!! Form::text('igrejaMembrecia', null, ['class'    =>  'form-control', 'id'    =>    'igrejaMembrecia']) !!}
            </div>
            <div class="col-md-4">
                <label for="fone">Data da Membrecia Atual</label>
                <div class="input-group bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                    {!! Form::date('dataMembreciaAtual', null, ['class'  =>  'form-control datepicker', 'placeholde' =>  'Click aqui']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="batismoEspiritoSanto">Data do Batismo no Espirito Santo</label>
                <div class="input-group bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                    {!! Form::date('batismoEspiritoSanto', null, ['class'  =>  'form-control datepicker', 'placeholde' =>  'Click aqui']) !!}
                </div>
            </div>
            <div class="col-md-6">
                {!! Form::label('igrejaBatismoEspiritoSanto', 'Igreja onde foi Batizado pelo Espirito Santo', ['class'    =>  'control-label']) !!}
                {!! Form::text('igrejaBatismoEspiritoSanto', null, ['class'    =>  'form-control', 'id'    =>    'igrejaBatismoEspiritoSanto']) !!}
            </div>                        
        </div>

        <div class="row">
            <div class="col-md-7">
                {!! Form::label('historico', 'Histórico | Observação', ['class'    =>  'control-label']) !!}

                {!! Form::textarea('historico', null, ['class'  =>  'form=control', 'rows'  =>  '15',   'cols'  =>  '150']) !!}

            </div>
        </div>

        <button type="submit" class="btn btn-primary pull-right">Salvar</button>

    </div>



</div>
