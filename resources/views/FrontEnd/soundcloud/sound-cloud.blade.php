@extends('FrontEnd.index')
@section('content')
<style>
    .timeline-badge{
          background-color: rgba(0, 0,0, 0.04)!important;
    }
</style>
<div class="nav-backed-header parallax" style="background-image:url(/FrontEnd/images/slide1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li class="active">Sound Cloud</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Nav Backed Header --> 
<!-- Start Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Todos os Sons</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header --> 
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <ul class="timeline">

                @foreach($sounds as $som)
                @if($som->id % 2 == 0)

                <li class="timeline-inverted">
                    @else
                <li>
                    
                    @endif    
                    <div class="timeline-badge"><img src="/imagem/igreja/logo/logo_idb1.png" width="20px;"> </div>
                    <!--                timeline-inverted-->

                    <div class="timeline-panel">
                        <div class="timeline-heading">
                        </div>
                        <div class="timeline-body">
                            <ul class="info-table">
                                <li><i class="fa fa-soundcloud"></i> <strong></strong> {{$som->titulo}}</li>
                                <div>
                                    {!!$som->frame!!}
                                </div>
                            </ul>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div>
        {{$sounds->links()}}
    </div>
</div>


@stop