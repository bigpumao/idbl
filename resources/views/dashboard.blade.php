<!DOCTYPE html>
<html>
    @include('dashboard.include.head')
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('dashboard.include.header')

            <aside class="main-sidebar">
                @include('dashboard.include.sidebar')
            </aside>
            <div class="content-wrapper">

                <section class="content-header">
                    <h1>
                        <small>{{$info}}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">{{$localizador}}</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                    </div>
                </section>
            </div>

            @include('dashboard.include.footer')
            @include('dashboard.include.aside')

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <!-- DataTables -->

        <script   src="http://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="{{url('/')}}/Tuor/js/bootstrap-tour.min.js"></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
$.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{url('/')}}/template/bootstrap/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

        <!-- Sparkline -->
        <script src="{{url('/')}}/template/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="{{url('/')}}/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{url('/')}}/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{url('/')}}/template/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="{{url('/')}}/template/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="{{url('/')}}/template/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{url('/')}}/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="{{url('/')}}/template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="{{url('/')}}/template/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{url('/')}}/template/dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{url('/')}}/template/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{url('/')}}/template/dist/js/demo.js"></script>
        <script src="{{url('/js/bootstrap-datepicker.pt-BR.min.js')}}/"></script>
        <script src="{{url('/js/cep.js')}}/"></script>
        <script src="{{url('/')}}/plugins/lightbox2-master/dist/js/lightbox.js"></script>
        <script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

        @include('dashboard.include.cpf')
        Ï<script>
var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
};
CKEDITOR.replace('editor1', options);
        </script>

        <!-- Fim dos Scripts -->

        <script>

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                language: "pt-BR"
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                setTimeout(function () {
                    $('#msg').fadeOut(1500);
                }, 3000);
            });
        </script>


    </body>
</html>
