@extends('dashboard')
@section('content')
<!-- jQuery -->
@include('scripts.datatables')

<!-- App scripts -->
<div class="section">
    <div class="col-md-12">
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="row">
                        
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
                                        <th>Secret</th>
                                        <th>Area</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>titulo</th>
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
                    ajax: "{{route('pedido.datatables')}}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'secret', name: 'secret'},
                        {data: 'area', name: 'area'},
                        {data: 'nome', name: 'nome'},
                        {data: 'email', name: 'email'},
                        {data: 'titulo', name: 'titulo'},
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
</div>
@stop