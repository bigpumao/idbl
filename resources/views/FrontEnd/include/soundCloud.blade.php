<style>
    div.soundCloud > iframe{
     
        height: 200px !important;
    }
</style>
<div class="styleswitcher visible-lg visible-md" style="left: 10px;">
    @if(isset($sound))
    <div class="arrow-box"><a class="switch-button open"><span class="fa fa-play-circle-o fa-lg"></span></a> </div>
    @foreach($sound as $sounds)

    <div class="row">
        <div class="col-3 soundCloud">  
                {!!$sounds->frame!!}
        </div>
    </div>
    @endforeach
    @else
    
    @endif
</div>