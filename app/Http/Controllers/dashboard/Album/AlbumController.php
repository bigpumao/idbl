<?php

namespace App\Http\Controllers\dashboard\Album;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Album\Album;
use App\Model\Album\Departamento;
use App\Model\Album\ImagemAlbum;
use Image;
use DB;

class AlbumController extends Controller {

    private $album;
    private $paginate =  15;

    public function __contruct(Album $album) {
        $this->album = $album;
    }

    public function index() {
        $img = new ImagemAlbum();
               
        $data = array(
            'titulo' => 'Lista de Album',
            'localizador' => 'Listagem de Album',
            'info' => 'Listas de Album',
            'avatar' => Auth()->user(),
            'album' => Album::all(),
            'albuns'    =>      Album::with('departamento')->with('imagemAlbums')->orderBy('id' , 'desc')->paginate($this->paginate),
         
        );


        return view('dashboard.albuns.album.index', $data);
    }

    public function create() {

        $data = array(
            'titulo' => 'Criando novo Album',
            'localizador' => 'Criando novo album',
            'info' => 'Criando novo album',
            'avatar' => Auth()->user(),
            'departamento'   =>  Departamento::pluck('departamento'),
        );
        return view('dashboard.albuns.album.create', $data);
    }

    public function store(Request $request) {

        $this->validate(request(),[
            'departamento'  =>  'required',
            'nome'          =>  'required',
            'descricao'     =>  'required',
            'imagem_capa'   =>  'required',
        ]);

        $departamento = new Departamento();
        $user = \Auth::user();
        $album = new Album();
        if ($request->hasFile('imagem_capa')) {
            $imagem = $request->file('imagem_capa');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            $imagePath = public_path('/imagem/album/capa_album/' . $filename);
            Image::make($imagem)
                    ->resize(800, 600)
                    ->save($imagePath);

            $result = $request->all();
            $result['imagem_capa'] = $filename;
            $departamento->categoria = $request->categoria;
            $departamento->user_id = $user->id;
            $departamento->departamento = $request->departamento;
            $departamento->save();
            $result['departamento'] = $departamento->departamento;
            $result['departamento_id'] = $departamento->id;

            $query = $album->create($result);
            if ($query)
                return redirect()->route('album.index')->with('msg', 'Album Criado com sucesso');
            else {
                return redirect()->back()->with('msg', 'Não foi possivel criar o album');
            };
        }
    }

    public function update(Request $request, $id) {
        $departamento = new Departamento();
        $album = new Album();

        $d = $departamento->updateDeparta($id);

        $alb = $album->findOrFail($id);
        // dd($alb);
        if ($request->hasFile('imagem')) {
            unlink(public_path('/imagem/album/capa_album/' . $alb->imagem_capa));
            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();

            $imagemPath = public_path('imagem/album/capa_album/' . $filename);
            Image::make($imagem)
                    ->resize(800, 600)
                    ->save($imagemPath);

            $result = $request->all();
            $departamento->categoria = $request->categoria;
            $departamento->departamento = $request->departamento;
            $departa['departamento'] = $departamento->departamento;

            $x = Departamento::findOrFail($d->departamento_id);
            $z = $x->update($departa);

            $result['departamento_id'] = $x->id;
            $result['imagem_capa'] = $request->imagem_capa;
            $result['status'] = $request->stauts;
            $query = $alb->update($result);
            if ($query) {
                return redirect()->route('album.index')->with('msg', 'Album Criado com sucesso');
            } else {
                return redirect()->back()->with('msg', 'Não foi possivel criar o album');
            }
        } else {

            $result = $request->all();
            $departamento->departamento = $request->departamento;
            $departa['departamento'] = $departamento->departamento;

            $x = Departamento::findOrFail($d->departamento_id);
            $z = $x->update($departa);

            $result['departamento_id'] = $x->id;
            $result['imagem_capa'] = $alb->imagem_capa;
            $alb->status = $request->status;
            $alb->save();
            $query = $alb->update($result);
            if ($query) {
                return redirect()->route('album.index')->with('msg', 'Album Atualizado com sucesso');
            } else {
                return redirect()->back()->with('msg', 'Não foi possivel atualizar o album');
            }
        }
    }

    public function destroy($id) {
        $album = Album::with('departamento')->where('id', $id)->first();
        $imagens = ImagemAlbum::with('album')->where('album_id', $album->id )->get();

        if($album)
        {
            unlink(public_path('/imagem/album/capa_album/' . $album->imagem_capa));
            foreach ($imagens as $imagem) {
                unlink(public_path('/imagem/album/imagens/' . $imagem->imagem));
            }
            $departamento = Departamento::with('albums')->where('id' , $album->departamento->id)->delete();

            if($departamento)
            {
                return redirect()->route('album.index')->with('msg', 'Album deletado com sucesso');
            }
            else
            {
                return redirect()->back()->with('msg', 'Não foi possivel deletar o album.');
            }
        }
        else
        {
            return redirect()->back()->with('msg', 'Não existe esse album');
        }

    }

}
