<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/uploads/avatars/{{$avatar->avatar}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{$avatar->name}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> <span>Menu Principal</span></a></li>
        <li><a href="{{route('listagem')}}"><i class="fa fa-pencil-square-o"></i> <span>Artigo</span>
                <span class="pull-right-container"></span>
            </a>
        </li>
        <li><a href="{{route('membro.index')}}"><i class="fa fa-folder-open-o"></i> <span>Membros</span></a></li>
        <li><a href="{{route('album.index')}}"><i class="fa fa-camera"></i> <span>Album</span></a></li>
        <li><a href=""><i class="fa fa-calendar"></i> <span>Eventos</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('eventos.index')}}"><i class="fa fa-pencil-square-o"></i> Eventos em Texto</a></li>
                <li><a href="{{route('video.index')}}"><i class="fa fa-video-camera"></i> Eventos em Videos</a></li>
                
            </ul>
        </li>
        <li><a href=""><i class="fa fa-database"></i> <span>Depart <-> Categoria</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('departamento.index')}}"><i class="fa fa-circle-o"></i> Departamento</a></li>
                <li><a href="{{route('categoria.index')}}"><i class="fa fa-circle-o"></i> Categorias</a></li>
            </ul>
        </li>
        <li><a href="{{route('tube.index')}}"><i class="fa fa-youtube-play"></i> <span>You Tube</span></a></li>
        <li><a href="{{route('sound.index')}}"><i class="fa fa-soundcloud"></i> <span>Soud Cloud</span></a></li>
        <li><a href="{{route('download.index')}}"><i class="fa fa-cloud-download"></i> <span>Downloads</span></a></li>
        <li><a href="{{route('pedido.index')}}"><i class="fa fa-comment-o"></i> <span>Pedidos de Oração</span></a></li>
        <li><a href="{{route('contatodash.index')}}"><i class="fa fa-commenting-o"></i> <span>Contato</span></a></li>
        
        <li><a href="{{route('user.index')}}"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
        <li><a href="{{route('acl.index')}}"><i class="fa fa-lock"></i> <span>ACL</span></a></li>
          
    </ul>
</section>