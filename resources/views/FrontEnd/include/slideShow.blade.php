<div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
    <ul class="slides">

        @foreach($eventos as $evento)

        <li id="elemento" class=" parallax flex-active-slide"><img src="/imagem/igreja/File/eventos/{{$evento->imagem}}"  alt="{{$evento->titulo}}"></li>

        @endforeach

    </ul>
</div>
