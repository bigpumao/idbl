<div class="styleswitcher visible-lg visible-md" style="left: 10px;">
    @if(isset($sound))
    <div class="arrow-box"><a class="switch-button open"><span class="fa fa-play-circle-o fa-lg"></span></a> </div>
    @foreach($sound as $sounds)

    <div class="row">
        <div class="col-3">  
                {!!$sounds->frame!!}
        </div>
    </div>
    @endforeach
    @else
    
    @endif
</div>