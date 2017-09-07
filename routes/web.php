<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
 
//Grupo AUTH
$this->group(array('prefix' => 'dashboard', 'middleware' => 'auth'), function() {
    //######################################################
    
    $this->get('dashboard', 'dashboard\PostagemController@manu_principal')->name('dashboard');

#################################################### ACL ########################################

$this->group(array('prefix' =>  'acl'), function(){
    $this->get('index' , array('as'   =>  'acl.index', 'uses'   =>  'dashboard\Acl\AclController@index'));
    $this->get('edit/{id}' , array('as'   =>  'acl.edit', 'uses'   =>  'dashboard\Acl\AclController@edit'));
    $this->post('store/{id}' , array('as'   =>  'acl.update', 'uses'   =>  'dashboard\Acl\AclController@update'));
    $this->get('datatables' , array('as'   =>  'acl.datatables', 'uses'   =>  'dashboard\Acl\AclController@get_datatable'));
});
 ##############################################Biografia########################################
 $this->group(array('prefix'    =>  'biografia'), function(){
     $this->post('update/{id}' , array('as'   =>  'bio.update' ,   'uses'  =>  'dashboard\Biografia\BiografiaController@update'));
 });
 ###########################################SoudCloud########################################
 $this->group(array('prefix' => 'soudcloud') , function(){
     $this->get('index' , array('as'    => 'sound.index', 'uses' =>  'dashboard\SoudCloud\SoudCloudController@index' ));
     $this->get('datatables' , array('as'    => 'sound.datatables', 'uses' =>  'dashboard\SoudCloud\SoudCloudController@get_datatable' ));
     $this->get('create' , array('as'    => 'sound.create', 'uses' =>  'dashboard\SoudCloud\SoudCloudController@create' ));
     $this->post('store' , array('as'    => 'sound.store', 'uses' =>  'dashboard\SoudCloud\SoudCloudController@store' ));
     $this->get('edit/{id}' , array('as'    => 'sound.edit', 'uses' =>  'dashboard\SoudCloud\SoudCloudController@edit' ));
     $this->post('update/{id}' , array('as'    => 'sound.update', 'uses' =>  'dashboard\SoudCloud\SoudCloudController@update' ));
     $this->get('destroy/{id}' , array('as'    => 'sound.destroy', 'uses' =>  'dashboard\SoudCloud\SoudCloudController@destroy' ));
 });

###########################################Youtube Videos########################################
$this->group(array('prefix' => 'idbtube') , function(){
    $this->get('index' , array('as'    => 'tube.index', 'uses' =>  'dashboard\YouTube\YouTubeController@index' ));
    $this->get('datatables' , array('as'    => 'tube.datatables', 'uses' =>  'dashboard\YouTube\YouTubeController@get_datatable' ));
    $this->get('create' , array('as'    => 'tube.create', 'uses' =>  'dashboard\YouTube\YouTubeController@create' ));
    $this->post('store' , array('as'    => 'tube.store', 'uses' =>  'dashboard\YouTube\YouTubeController@store' ));
    $this->get('edit/{id}' , array('as'    => 'tube.edit', 'uses' =>  'dashboard\YouTube\YouTubeController@edit' ));
    $this->post('update/{id}' , array('as'    => 'tube.update', 'uses' =>  'dashboard\YouTube\YouTubeController@update' ));
    $this->get('destroy/{id}' , array('as'    => 'tube.destroy', 'uses' =>  'dashboard\YouTube\YouTubeController@destroy' ));
});
 
##################################################Postagem########################################
    //Postagem
    $this->group(array('prefix' => 'postagem'), function() {
        $this->get('index', array('as' => 'listagem', 'uses' => 'dashboard\PostagemController@index'));
        $this->get('create', array('as' => 'create', 'uses' => 'dashboard\PostagemController@create'));
        $this->post('store', array('as' => 'store', 'uses' => 'dashboard\PostagemController@store'));
        $this->get('show/{id}', array('as' => 'show', 'uses' => 'dashboard\PostagemController@show'));
        $this->get('edit/{id}', array('as' => 'edit', 'uses' => 'dashboard\PostagemController@edit'));
        $this->get('destroy/{id}', array('as' => 'destroy', 'uses' => 'dashboard\PostagemController@destroy'));
        $this->post('update/{id}', array('as' => 'update', 'uses' => 'dashboard\PostagemController@update'));
        $this->get('datatables', array('as' => 'datatables', 'uses' => 'dashboard\PostagemController@get_datatable'));
    });
//############################################# Membros ##########################################
    //Cadastro de Membros
    $this->group(array('prefix' => 'membros', 'middleware' => 'auth'), function() {
        $this->get('index', array('as' => 'membro.index', 'uses' => 'dashboard\CadastroMController@index'));
        $this->get('create', array('as' => 'membro.create', 'uses' => 'dashboard\CadastroMController@create'));
        $this->post('store', array('as' => 'membro.store', 'uses' => 'dashboard\CadastroMController@store'));
        $this->get('show/{id}', array('as' => 'show.edit', 'uses' => 'dashboard\CadastroMController@show'));
        $this->get('edit/{id}', array('as' => 'membro.edit', 'uses' => 'dashboard\CadastroMController@edit'));
        $this->get('datatables', array('as' => 'membro.datatables', 'uses' => 'dashboard\CadastroMController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'membro.destroy', 'uses' => 'dashboard\CadastroMController@destroy'));
        $this->post('update/{id}', array('as' => 'membro.update', 'uses' => 'dashboard\CadastroMController@update'));
    });

//################################################ Perfil ##################################################
    //Perfil
    $this->group(array('prefix' => 'perfil'), function() {
        $this->get('profile', array('as' => 'perfil', 'uses' => 'dashboard\PerfilController@profile'));
        $this->post('update', array('as' => 'update.imagem', 'uses' => 'dashboard\PerfilController@update_avatar'));
        $this->post('users/{id}', array('as' => 'perfil.update', 'uses' => 'dashboard\PerfilController@update_perfil'));
    });
    //Album
    ##############################################################Album#############################################################
    $this->group(array('prefix' => 'album'), function() {
        $this->get('index', array('as' => 'album.index', 'uses' => 'dashboard\Album\AlbumController@index'));
        $this->get('create', array('as' => 'album.create', 'uses' => 'dashboard\Album\AlbumController@create'));
        $this->post('store', array('as' => 'album.store', 'uses' => 'dashboard\Album\AlbumController@store'));
        $this->get('destroy/{id}', array('as' => 'album.destroy', 'uses' => 'dashboard\Album\AlbumController@destroy'));
        $this->post('album-update/{id}', array('as' => 'album.update', 'uses' => 'dashboard\Album\AlbumController@update'));
        ################################ IMAGEM NO ALBUM ###################################################

        $this->get('quantImagem', array('as' => 'quantImagem', 'uses' => 'dashboard\Album\ImagemController@quantImagem'));
        $this->get('imagem-create/{id}', array('as' => 'imagem.album.create', 'uses' => 'dashboard\Album\ImagemController@create'));
        $this->post('imagem-store/{id}', array('as' => 'imagem.album.store', 'uses' => 'dashboard\Album\ImagemController@store'));
        $this->get('imagem-view/{id}', array('as' => 'imagem.album.view', 'uses' => 'dashboard\Album\ImagemController@view'));
        $this->get('imagem-edit/{id}', array('as' => 'imagem.album.edit', 'uses' => 'dashboard\Album\ImagemController@edit'));
        $this->get('imagem-destroy/{id}', array('as' => 'iagem.album.destroy', 'uses' => 'dashboard\Album\ImagemController@destroy'));
    });
    //Eventos
    #########################################Eventos############################################################
    $this->group(['prefix' => 'eventos'], function() {
        $this->get('index', array('as' => 'eventos.index', 'uses' => 'dashboard\Eventos\EventosController@index'));
        $this->get('create', array('as' => 'eventos.create', 'uses' => 'dashboard\Eventos\EventosController@create'));
        $this->post('store', array('as' => 'eventos.store', 'uses' => 'dashboard\Eventos\EventosController@store'));
        $this->get('datatables', array('as' => 'eventos.datatables', 'uses' => 'dashboard\Eventos\EventosController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'eventos.destroy', 'uses' => 'dashboard\Eventos\EventosController@destroy'));
        $this->get('edit/{id}', array('as' => 'eventos.edit', 'uses' => 'dashboard\Eventos\EventosController@edit'));
        $this->post('update/{id}', array('as' => 'eventos.update', 'uses' => 'dashboard\Eventos\EventosController@update'));
    });
    ////Eventos Vídeos
    #############################################Eventos em Vídeo #############################################
     $this->group(['prefix' => 'video'], function() {
        $this->get('index', array('as' => 'video.index', 'uses' => 'dashboard\Eventos\EventosVideoController@index'));
        $this->get('create', array('as' => 'video.create', 'uses' => 'dashboard\Eventos\EventosVideoController@create'));
        $this->post('store', array('as' => 'video.store', 'uses' => 'dashboard\Eventos\EventosVideoController@store'));
        $this->get('datatables', array('as' => 'video.datatables', 'uses' => 'dashboard\Eventos\EventosVideoController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'video.destroy', 'uses' => 'dashboard\Eventos\EventosVideoController@destroy'));
        $this->get('edit/{id}', array('as' => 'video.edit', 'uses' => 'dashboard\Eventos\EventosVideoController@edit'));
        $this->post('update/{id}', array('as' => 'video.update', 'uses' => 'dashboard\Eventos\EventosVideoController@update'));
    });
    //Downloads
    ###################################################Download##############################################
    $this->group(array('prefix' => 'downloads'), function() {
        $this->get('index', array('as' => 'download.index', 'uses' => 'dashboard\Download\DownloadController@index'));
        $this->post('store', array('as' => 'download.store', 'uses' => 'dashboard\Download\DownloadController@store'));
        $this->get('datatables', array('as' => 'download.datatables', 'uses' => 'dashboard\Download\DownloadController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'download.destroy', 'uses' => 'dashboard\Download\DownloadController@destroy'));
        $this->get('destroy/{id}', array('as' => 'download.destroy', 'uses' => 'dashboard\Download\DownloadController@destroy'));
        $this->get('link-donwload/{id}', array('as' => 'download.link', 'uses' => 'dashboard\Download\DownloadController@pegalink'));
    });
//Usuario
###########################################################Registro Usuario  ############################################################
    $this->group(array('prefix' => 'usuario'), function() {
        $this->get('index', array('as' => 'user.index', 'uses' => 'dashboard\Usuario\UsuarioController@index'));
        $this->get('/create', array('as' => 'user.create', 'uses' => 'dashboard\Usuario\UsuarioController@create'));
        $this->post('/store', array('as' => 'user.store', 'uses' => 'dashboard\Usuario\UsuarioController@store'));
        $this->get('datatables', array('as' => 'user.datatables', 'uses' => 'dashboard\Usuario\UsuarioController@get_datatable'));
        $this->get('edit/{id}', array('as' => 'user.edit', 'uses' => 'dashboard\Usuario\UsuarioController@edit'));
        $this->post('update/{id}', array('as' => 'user.update', 'uses' => 'dashboard\Usuario\UsuarioController@update'));
        $this->get('destroy/{id}', array('as' => 'user.destroy', 'uses' => 'dashboard\Usuario\UsuarioController@destroy'));
    });
//Pedido De Oração
############################################################Pedido de Oração#######################################################
    $this->group(array('prefix' => 'pedido'), function() {
        $this->get('todas-oracoes', array('as' => 'pedido.index', 'uses' => 'dashboard\PedidoOracao\PedidoOracaoController@index'));
        $this->get('datatables', array('as' => 'pedido.datatables', 'uses' => 'dashboard\PedidoOracao\PedidoOracaoController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'pedido.destroy', 'uses' => 'dashboard\PedidoOracao\PedidoOracaoController@destroy'));
        $this->get('show/{id}', array('as' => 'pedido.destroy', 'uses' => 'dashboard\PedidoOracao\PedidoOracaoController@show'));
    });
###########################################################Contato#################################################################
$this->group(array('prefix'   =>  'contatodash'),function(){
    $this->get('index',array('as'   =>  'contatodash.index','uses'  =>  'dashboard\Contato\ContatoController@index'));
    $this->get('datatables',array('as'   =>  'contatodash.datatable','uses'  =>  'dashboard\Contato\ContatoController@get_datatable'));
    $this->get('show/{id}',array('as'   =>  'contatodash.show','uses'  =>  'dashboard\Contato\ContatoController@show'));
    $this->get('destroy/{id}',array('as'   =>  'contatodash.destroy','uses'  =>  'dashboard\Contato\ContatoController@destroy'));
});
############################################################ dashboard ############################################################
});
//redireciona home para o dashboard
$this->get('/home', function() {
    return Redirect::to('dashboard/dashboard');
});

//Logout / sair
$this->get('logout', function() {
    Auth::logout();
    return Redirect::to("/");
});
//Login / Registar
Auth::routes();
$this->get('/register', function() {
    return redirect('dashboard/usuario/index');
})->middleware('auth');
########################################################### Front End ################################################################
#-----------------------------------------------------------Artigos------------------------------------------------------------------
$this->group(array('middleware' => 'web'), function() {

    $this->get('/', array('as' => 'front.index', 'uses' => 'FrontEnd\FrontEndArtigoController@artigos'));
#-------------------------------------------------------Blog------------------------------------------------------------------------
    $this->group(array('prefix' => 'blog'), function() {

        $this->get('artigo/{id}', array('as' => 'front.artigos', 'uses' => 'FrontEnd\FrontEndArtigoController@blogArtigo'));
        $this->get('departamento/{id}', array('as' => 'front.departamento', 'uses' => 'FrontEnd\FrontEndArtigoController@departamentoArtigo'));
        $this->get('todos-artigos', array('as' => 'front.allArtigos', 'uses' => 'FrontEnd\FrontEndArtigoController@allArtigos'));
        $this->post('artigo-departamento', array('as' => 'buscaDepartamento', 'uses' => 'FrontEnd\FrontEndArtigoController@findDepartamento'));
        $this->post('departamentos/{id}', array('as' => 'tagsDepartamentos', 'uses' => 'FrontEnd\FrontEndArtigoController@tagsDepartamentos'));
    });
#------------------------------------------------------------Album------------------------------------------------------------------
    $this->group(array('prefix' => 'albuns'), function() {
        $this->get('index', array('as' => 'front.albuns.index', 'uses' => 'FrontEnd\FrontEndAlbumController@allAlbums'));
        $this->get('imagem/{id}', array('as' => 'front.albuns.imagem', 'uses' => 'FrontEnd\FrontEndAlbumController@findImagem'));
        $this->post('departamento', array('as' => 'front.albuns.departamento', 'uses' => 'FrontEnd\FrontEndAlbumController@albumDepartamento'));
    });
#------------------------------------------------------------Eventos-----------------------------------------------------------------
    $this->group(array('prefix' => 'eventos'), function() {
        $this->get('index', array('as' => 'eventosfront.index', 'uses' => 'FrontEnd\EventosController@eventosAll'));
        $this->get('/{id}', array('as' => 'eventos.find', 'uses' => 'FrontEnd\EventosController@findEvento'));
    });
#-------------------------------------------------------------Pedido Oração----------------------------------------------------------
    $this->group(array('prefix' => 'pedido'), function() {
        $this->post('oracao', array('as' => 'front.pedidoOracao', 'uses' => 'FrontEnd\PedidoController@store'));
    });
    $this->group(array('prefix' => 'download'), function() {
        $this->get('getall', array('as' => 'getall', 'uses' => 'FrontEnd\DownloadController@getDownload'));
    });
#--------------------------------------------------------------Quem Somos ---------------------------------------------------------------
    $this->group(array('prefix' => 'informacao'), function() {
        $this->get('idbl', array('as' => 'quemSomos.index', 'uses' => 'FrontEnd\PedidoController@quemSomos'));
    });
#------------------------------------------------------Contato----------------------------------------------------------
$this->group(array('prefix' =>  'contato'), function(){
     $this->get('index', array('as' => 'contato.index', 'uses' => 'FrontEnd\ContatoController@index'));
     $this->post('store', array('as' => 'contato.store', 'uses' => 'FrontEnd\ContatoController@store'));
});
#-------------------------------------------------------------------------------------------------------------------------------------
});
#---------------------------------------------------------Departameto------------------------------------------------------------------
#
$this->group(array('prefix'   =>  'departamento') , function(){
    $this->get('search/{id}' , array('as'    =>  'departamento.search' , 'uses'  =>  'FrontEnd\DepartamentoController@search'));
});
#-------------------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------Sound Cloud---------------------------------------------------------------------

$this->group(array('prefix'   =>  'soundcloud-idbl'),function(){
    $this->get('sounds', array('as' =>  'sound.getall', 'uses'  =>  'FrontEnd\SoundCloudController@getall'));
});
#-------------------------------------------------------You Tube-----------------------------------------------------------------------
$this->group(array('prefix' =>  'IDB-Tube'), function(){
    $this->get('index.idbl', array('as'  =>  'youtube.index' , 'uses'    =>  'FrontEnd\YouTubeController@index'));
    $this->post('search' , array('as'   =>  'youtube.search',   'uses'  =>  'FrontEnd\YouTubeController@search'));
});

#
############################################################### Fim  ##################################################################
