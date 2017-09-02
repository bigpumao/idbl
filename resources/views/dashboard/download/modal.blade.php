<!-- Modal -->
<div id="MyModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastro de arquivos de Download</h4>
            </div>
            <div class="modal-body">
                {!!Form::open(array('route' =>  'download.store' , 'method' =>  'post',  'files'    =>  'true'))!!}
                <div class="row">
                   
                    <div class="col-md-4 form-group">
                        {!!Form::label('arquivo','Up-Load do arquivo')!!}
                        {!!Form::file('arquivo')!!}
                    </div>
                      
                    
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                         {!!Form::label('descricao','Descricao do Arquivo')!!}
                        {!!Form::textarea('descricao', null,['class'   =>  'form-control'])!!}
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-default">UPLOAD</button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
