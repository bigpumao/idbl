@extends('dashboard')
@section('content')
<!-- jQuery -->
@include('scripts.datatables')

@include('dashboard.download.modal')

<style>
    .margin{
        margin-left: 10px;
    }
</style>
@if(isset($link))
<div class="col-md-8 col-md-offset-2">
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color:black;">&times;</span></button>
        <div class="row margin">
            <strong style="color:#FFFCDD">Titulo do Arquivo</strong><br> {{$link->titulo}} <br>
            <strong style="color:#FFFCDD">Seu Link: </strong> <br> {!! url('downloads/arquivos/'.$link->arquivo)!!}
        </div>
    </div>    
</div>

@endif
<div class="section">
    <div class="col-md-12">
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-3">
                            <h2><a href="#myModal" data-toggle="modal" data-target="#MyModal" data-toggle="tooltip" data-placement="top" title="Novo Download" ><i class="fa fa-plus" aria-hidden="true"></i></a></h2> 
                        </div>
                        <div class="col-md-4 col-xs-12">

                            @if(Session::has('msg'))
                            <div id="msg" class="alert alert-success"><strong> <center>{{Session::get('msg')}}</center></strong></div>
                            @elseif(Session::has('error'))
                            <div id="msg" class="alert alert-danger"><strong> <center>{{Session::get('msg')}}</center></strong></div>
                            @endif
                        </div>
                        <div class="col-md-12 col-xs-12 table">
                            <table id="datatables" class="table table-hover table-condensed" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome Arquivo</th>
                                        <th>Data Criada</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>    
            </div>
            <script type="text/javascript">
                $('#datatables').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('download.datatables')}}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'arquivo', name: 'arquivo'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    setTimeout(function () {
                        $('#msg').fadeOut(1500);
                    }, 3000);
                });
            </script>



        </section>
    </div>
</div


@stop