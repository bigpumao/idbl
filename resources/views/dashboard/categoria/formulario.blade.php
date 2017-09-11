<style>
    .margin{
        margin-bottom: 30px;
    }
</style>
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('categoria.index')}}" data-toggle="tooltip" data-placement="top"
                   title="Lista de Categoria"><i class="fa fa-television" aria-hidden="true"></i></a></h2>
        </div>
    </div>
    <div class="row margin">
        <div class="col-md-4 col-md-offset-4">
            <label for="">Cadastro de Categoria</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

            {!! Form::label('departamento', 'Departamento') !!}
            {!! Form::select('departamento' , $departamento ,null, ['class' =>  'form-control']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::label('Categoria', 'Categoria') !!}
            {!! Form::text('categoria' , null , ['class' =>  'form-control']) !!}
        </div>

    </div>
    <div class="row margin">
        <div class="col-md-3">
            {!! Form::submit('Cadastrar' , ['class' =>  'btn btn-md btn-primary']) !!}
        </div>
    </div>



</div>