<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Album\Album;
use App\Model\Album\ImagemAlbum;
use App\Model\Album\Departamento;
use DB;
class FrontEndAlbumController extends Controller
{
    private $paginate1 = 16;
    private $paginate2 = 15;
    public function allAlbums(){
      
        $album = Album::with('departamento')->with('imagemAlbums')->where('status' , true)->orderBy('id', 'desc')->paginate($this->paginate1);
        $data = array (
            'titulo'    =>  'Album de Fotos',
            'albuns'     =>  $album,
        );
        return view('FrontEnd.album.album', $data);
    }
    public function findImagem($id){
        $imagem = ImagemAlbum::with('album')->where('album_id' , $id)->paginate($this->paginate2);
        
        $data = array(
            'titulo'    =>  'Album de Fotos',
            'imagens'    =>  $imagem,
        );
        return view('FrontEnd.album.imagem',$data);
    }
    public function albumDepartamento(Request $request)
    {
            
       $album = \DB::table('departamentos')
               ->join('albums', 'departamentos.id' , 'albums.departamento_id')
               ->where('departamentos.categoria' , 'album')
               ->where('departamentos.departamento' , $request->departamento)
               ->where('albums.status' , true)
               ->paginate($this->paginate2);
      
        $data = array (
            'titulo'    =>  'Album de Fotos',
            'albuns'     =>  $album,
        );
        return view('FrontEnd.album.departamento', $data);
    }
   
}
