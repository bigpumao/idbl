<style>
    #margin{
        margin-top: 10px;
    }
</style>
<section>
    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('tube.index')}}" data-toggle="tooltip" data-placement="top" title="Lista de videos You Tube"><i class="fa fa-television" aria-hidden="true"></i></a></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            @if(Session::has('errors'))
                @if(count($errors))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <h5>CRIANDO VÍDEOS DO YOU TUBE</h5>
        </div>
       
    </div>
    <input type="hidden" value="youtube" name="categoria">
    <div class="row">
        <div class="col-md-3">
            <label>Tituto</label>
            {!!Form::text('titulo' , null,['class'   =>  'form-control'] )!!}
        </div>

        <div class="col-md-3">
            <label>Frame do You Tube</label>
            {!!Form::text('frame' , null,['class'   =>  'form-control'] )!!}
        </div>
        <div class="col-md-3">
            <label>Departamento</label>
            {!!Form::select('departamento' , [
            'kids'   =>  'Kids',
            'jeans'  =>  'Jeans',
            'senhores e senhoras'   =>  'Senhores e Senhoras',
            'louvor'    =>  'Louvor',
            'geral'     =>  'Geral',
            ],null,['class'   =>  'form-control'] )!!}
        </div>
         <div class="col-md-3">
            <label>Status</label>
            {!!Form::select('status' , [false    =>  'Inativo', true  =>  'Ativo'],null,['class'   =>  'form-control'] )!!}
        </div>

    </div>
    <div class="row">
        <div class="col-md-5">
            {!!Form::submit('Salvar' , ['class' =>  'btn btn-primary' , 'id'    =>  'margin'])!!}
        </div>
    </div>
</section>