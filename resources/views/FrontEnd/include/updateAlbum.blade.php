<style>
    .margin{
        margin-bottom: 5px;
    }
</style>
<div class="featured-gallery">
    <div class="container">
        <div class="row margin">
            <div class="col-md-3 col-sm-3">
                <h4>Últimos Albuns Adicionados</h4>
                <a href="{{route('front.albuns.index')}}" class="btn btn-default btn-lg">Veja todos os albuns</a>
            </div>
        </div>
        <div class="row">
            @foreach($albuns as $album)
            <div class="col-md-3 col-sm-3 post format-image">
                <a href="{{url('albuns/imagem/'.$album->id)}}">
                    <img class="img-thumbnail" src="/imagem/album/capa_album/{{$album->imagem_capa}}" alt="{{$album->titulo}}">
                </a> 
            </div> 
            @endforeach

        </div>
    </div>
</div>