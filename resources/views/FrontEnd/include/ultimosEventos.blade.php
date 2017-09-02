<div class="col-md-8 col-sm-6"> 
    <div class="listing post-listing">
        <header class="listing-header">
            <h3>Eventos</h3>
        </header>
        <section class="listing-cont">
            <ul>
                @foreach($eventos as $evento)
                <li class="item post">
                    <div class="row">
                        <div class="col-md-5"> <a href="{{url('eventos/'.$evento->id)}}" class="media-box"> <img class="img-responsive" src="/imagem/igreja/File/eventos/{{$evento->imagem}}" alt="" > </a></div>
                        <div class="col-md-7">
                            <div class="post-title">
                                <h2><a href="{{url('/')}}/FrontEnd/blog-post.html">{{$evento->titulo}}</a></h2>
                                <span class="meta-data"><i class="fa fa-calendar"></i>{{$evento->data_inicio}}</span></div>
                            <p><?php echo substr($evento->descricao, 0, 200) . " ..."; ?></p>
                        </div>
                    </div>
                </li> 
                @endforeach
            </ul>
        </section>
    </div>
</div>