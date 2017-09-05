<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Postagem;
use App\Model\Eventos\Evento;
use App\Model\Album\Album;
use App\Model\Album\Departamento;
use App\User;
use DB;
use App\Model\Biografia\Biografia;
use App\Model\SoudCloud\Sound;
use App\Model\Membro;
use App\Model\Eventos\Video;

class FrontEndArtigoController extends Controller {

    private $paginate1 = 6;
    private $paginate2 = 4;
    private $paginate3 = 3;
    private $paginate4 = 2;

    public function index() {

        $data = array(
            'titulo' => 'Igreja de Deus em Luziânia',
        );

        return view('FrontEnd.index', $data);
    }

    public function artigos() {
        $date = Membro::all();

        

        $postagem = new Postagem();
        $data = array(
            'titulo' => 'Igreja de Deus em Luziânia',
            'artigos' => $postagem->with('departamento')->where('status', true)->orderBy('id', 'desc')->paginate($this->paginate1),
            'albuns' => $album = Album::with('departamento')->with('imagemAlbums')->where('status', true)->orderBy('id', 'asc')->paginate($this->paginate2),
            'eventos' => Evento::where('status', true)->where('checkbox', true)->orderBy('id', 'desc')->paginate($this->paginate3),
            'sound' => Sound::where('status', true)->orderBy('id', 'desc')->paginate($this->paginate4),
            'aniver' => DB::select( DB::raw("SELECT * FROM membros WHERE day(dataNasc) = day(CURRENT_DATE) and month(dataNasc) = month(CURRENT_DATE)") ),
            'eventoVideo'   => Video::where('status' , true)->orderBy('id','desc')->paginate(1),
        );

        return view('FrontEnd.artigo.artigo-index', $data);
    }

    public function blogArtigo($id) {
        $result = Postagem::findOrFail($id);
        $relations = Postagem::with('departamento')->where('id', $id)->get();

        $data = array(
            'titulo' => $result->titulo,
            'artigos' => $relations,
        );
        return view('FrontEnd.artigo.blog', $data);
    }

    public function allArtigos() {
        $artigos = new Postagem();
        $relations = $artigos->with('departamento')->paginate($this->paginate1);

        $data = array(
            'titulo' => 'Todos os Artigos',
            'artigos' => $relations,
        );

        return view('FrontEnd.artigo.todos-artigos', $data);
    }

    public function findDepartamento(Request $request) {
        $join = \DB::table('departamentos')
                ->join('postagems', 'departamentos.id', 'postagems.departamento_id')
                ->join('users', 'users.id', 'departamentos.user_id')
                ->where('departamentos.departamento', $request->departamento)
                ->select('departamentos.departamento', 'departamentos.categoria', 'postagems.id', 'postagems.titulo', 'postagems.imagem', 'postagems.descricao', 'postagems.status', 'postagems.created_at'
                        , 'users.avatar', 'users.name')
                ->paginate($this->paginate1);

        $data['join'] = $join;

        return view('FrontEnd.artigo.artigos-departamento', $data);
    }

}
