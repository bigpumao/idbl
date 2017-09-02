<?php

namespace App\Http\Controllers\dashboard\Album;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Album\Album;
use App\Model\Album\ImagemAlbum;
use DB;
use Image;

class ImagemController extends Controller {
 
    public function view($id) {
        $this->id = $id;
        $infor = Album::find($id);
  
        $data = array(
            'titulo' => 'Visualizando Album: ' . $infor->nome,
            'localizador' => 'Visualizando  album',
            'info' => 'Visualizando  album: ' . $infor->nome,
            'avatar' => Auth()->user(),
            'album' => DB::table('images')
                    ->where('album_id', $id)
                    ->select('images.album_id', 'images.imagem', 'images.id', 'images.descricao')
                    ->get(),
            
        );

        return view('dashboard.albuns.imagem.view', $data);
    }
   

    public function create($id) {

        $data = array(
            'titulo' => 'Criando novo Album',
            'localizador' => 'Criando novo album',
            'info' => 'Criando novo album',
            'avatar' => Auth()->user(),
            'album' => Album::findOrFail($id),
        );
        return view('dashboard.albuns.imagem.create', $data);
    }

    public function store(Request $request, $id) {
        $album = new Album();

        $alb = $album->find($id);

        $img = new ImagemAlbum();
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');

            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            $imagePath = public_path('/imagem/album/imagens/' . $filename);
            Image::make($imagem)
                    ->resize(800, 600)
                    ->save($imagePath);
        }

        $img->descricao = $request->descricao;
        
        $img->album_id = $id;
        $img->imagem = $filename;
        $result = $img->save();
        if ($result) {
            return redirect()->route('imagem.album.create', [$id])->with('msg', 'Imagem cadastrada no album:  ' . $alb->nome);
        } else {
            return redirect()->back()->with('msg', 'Não foi possivel cadastrar a imagem no album: ' . $alb->nome);
        }
    }

    public function edit($id) {

        $album = new Album();
        $data = array(
            'titulo' => 'Edição do Album',
            'localizador' => 'Editando album',
            'info' => 'Editando album',
            'avatar' => Auth()->user(),
            'album' => $album->findOrFail($id)
        );


        return view('dashboard.albuns.imagem.edit', $data);
    }

    public function destroy($id) {
        $imagem = new ImagemAlbum();
        $result = $imagem->findOrFail($id);
        unlink(public_path('/imagem/album/imagens/' . $result->imagem));
        $query = $result->delete($id);
        if ($query) {
            return redirect()->back()->with('msg', 'Imagem deletada com sucesso');
        } else {
            return redirect()->back()->with('msg', 'Não foi possivel deletar a imagem');
        }
    }

}
