@extends('dashboard')

@section('content')
 @include('scripts.datatables')
<style>
    .table{
    max-width: 100%;
    height: auto;
    overflow: scroll;
}
</style>


<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="row">
                <div class="col-md-3">
                    <h2><a href="{{route('create')}}" data-toggle="tooltip" data-placement="top" title="Novo Artigo"><i class="fa fa-plus" aria-hidden="true"></i></a></h2> 
                </div>
                <div class="col-md-7 col-xs-12">

                    @if(Session::has('msg'))
                    <div id="msg" class="alert alert-success"><strong> <center>{{Session::get('msg')}}</center></strong></div>
                    @elseif(Session::has('error'))
                     <div id="msg" class="alert alert-danger"><strong> <center>{{Session::get('error')}}</center></strong></div>
                    @endif
                </div>
                <div class="col-md-12 col-xs-12 table">
                    <table id="datatables" class="table table-hover table-condensed" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Departamento</th>
                                <th>Status</th>
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
        ajax: "{{route('datatables')}}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'titulo', name: 'titulo'},
            {data: 'departamento', name: 'departamento'},
            {data: 'status', name: 'status'},
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
@endsection