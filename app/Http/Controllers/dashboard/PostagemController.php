<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use Image;
use App\Model\Postagem;
use App\Model\Album\Departamento;
use Yajra\Datatables\Facades\Datatables;
use App\Model\Membro;
use App\Model\FrontEnd\PedidoOracao;
use App\Model\Album\Album;
use App\Model\Eventos\Evento;
use App\Model\Download\Download;
use App\Model\FrontEnd\Contato;

class PostagemController extends Controller {

    public function manu_principal() {


        $data = array(
            'titulo' => 'Menu Principal',
            'localizador' => 'Menu de opções',
            'info' => 'Menu de opções',
            'avatar' => Auth::user(),
            'quantUser' => User::all()->count(),
            'quantPost' => Postagem::all()->count(),
            'quantMembros' => Membro::all()->count(),
            'quantOracao' => PedidoOracao::all()->count(),
            'quantAlbum' => Album::all()->count(),
            'quantEventos' => Evento::all()->count(),
            'quantDownload' => Download::all()->count(),
            'quantContato'  => Contato::all()->count(),
            'acl'           => User::all(),
                );

        return view('dashboard.index', $data);
    }

    public function index(Postagem $postagem) {

        $data = array(
            'titulo' => 'Listagem das Postagem',
            'localizador' => 'Listas dos post',
            'info' => 'Lista de Postagem',
            'avatar' => Auth::user(),
        );

        return view('dashboard.postagem.listagem', $data);
    }

    public function get_datatable() {
        $relations = $d = DB::table('users')
                ->join('departamentos', 'departamentos.user_id', 'users.id')
                ->join('postagems', 'departamentos.id', 'postagems.departamento_id')
                ->where('users.id', auth()->user()->id)
                ->select('postagems.id', 'postagems.titulo', 'departamentos.departamento' ,'postagems.status')
                ->get();

        $post = Postagem::select(['id', 'titulo', 'status', 'created_at']);

        return Datatables::of($relations)
                        ->addColumn('action', function ($list) {
                            return '<a href="show/' . $list->id . '" class="btn btn-xs btn-primary"><i class="fa fa-folder-open-o"></i> Show</a>'
                                    . '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->removeColumn('password')
                        ->make(true);
    }

    public function create() {
        $data = array(
            'titulo' => 'Criando novo Artigo',
            'localizador' => 'Novo Post',
            'info' => 'Nova Postagem',
            'avatar' => Auth::user(),
        );

        return view('dashboard.postagem.create', $data);
    }

    public function store(Request $request) {
        $postagem = new Postagem();
        $findDepartamento = new Departamento();

        $user = Auth::user();

        if ($request->hasFile('imagem') == TRUE) {

            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            Image::make($imagem)->resize(800, 600)->save(public_path('/uploads/postagem/' . $filename));

            $findDepartamento->categoria = $request->categoria;
            $findDepartamento->user_id = $user->id;
            $findDepartamento->departamento = $request->departamento;
            $findDepartamento->save();
            $postagem->departamento_id = $findDepartamento->id;
            $postagem->titulo = $request->titulo;
            $postagem->imagem = $filename;
            $postagem->descricao = $request->descricao;
            $postagem->status = $request->status;

            $return = $postagem->save();
            if ($return) {
                return redirect()->route('listagem')->with('msg', 'Artigo cadastrado com sucesso!');
            } else {
                return redirect()->back();
            }
        }else {
            $findDepartamento->categoria = $request->categoria;
            $findDepartamento->user_id = $user->id;
            $findDepartamento->departamento = $request->departamento;
            $findDepartamento->save();
            $postagem->departamento_id = $findDepartamento->id;
            $postagem->titulo = $request->titulo;
            $postagem->imagem = 'postagem.jpg';
            $postagem->descricao = $request->descricao;
            $postagem->status = $request->status;

            $return = $postagem->save();

            if ($return) {
                return redirect()->route('listagem')->with('msg', 'Artigo cadastrado com sucesso!');
            } else {
                return redirect()->back();
            }
        }
    }

    public function show($id) {
        $data = array(
            'titulo' => 'Visualizaçao da postagem',
            'localizador' => 'Postagem ',
            'info' => 'Postagem',
            'avatar' => Auth::user(),
            'postagem' => Postagem::findOrFail($id),
            'usuario' => $d = DB::table('users')
            ->join('departamentos', 'departamentos.user_id', 'users.id')
            ->join('postagems', 'postagems.departamento_id', 'departamentos.id')
            ->where('postagems.id', $id)
            ->get()
            ->first(),
        );
       
        return view('dashboard.postagem.show', $data);
    }

    public function edit($id) {
        $data = array(
            'titulo' => 'Editando a postagem',
            'localizador' => 'Edição ',
            'info' => 'Edição do Post',
            'avatar' => Auth::user(),
            'postagem' => Postagem::find($id),
        );
        return view('dashboard.postagem.edit', $data);
    }

    public function update(Request $request, $id) {

        $findDepartamento = new Departamento();
        $user = Auth::user();
        $postagem = Postagem::findOrFail($id);

        $findDepartamento = Departamento::findOrFail($postagem->departamento->id);
        $findUser = User::findOrFail($findDepartamento->user->id);



        if ($request->hasFile('imagem') == true) {

            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            Image::make($imagem)->resize(800, 600)->save(public_path('/uploads/postagem/' . $filename));

            $findDepartamento->categoria = $request->categoria;
            $findDepartamento->user_id = $user->id;
            $findDepartamento->departamento = $request->departamento;
            $findDepartamento->save();
            $postagem->departamento_id = $findDepartamento->id;
            $postagem->titulo = $request->titulo;
            $postagem->status = $request->status;
            $postagem->imagem = $filename;
            $postagem->descricao = $request->descricao;

            $return = $postagem->save();
            if ($return)
                return redirect()->route('listagem')->with('msg', 'Artigo atualizado com sucesso!');
            else
                return redirect()->back();
        }else {
            $findDepartamento->categoria = $request->categoria;
            $findDepartamento->user_id = $user->id;
            $findDepartamento->departamento = $request->departamento;
            $findDepartamento->save();
            $postagem->departamento_id = $findDepartamento->id;
            $postagem->titulo = $request->titulo;
            $postagem->status = $request->status;
            $postagem->imagem = $postagem->imagem;
            $postagem->descricao = $request->descricao;

            $return = $postagem->save();
            if ($return) {
                return redirect()->route('listagem')->with('msg', 'Artigo atualizado com sucesso!');
            } else {
                return redirect()->back();
            }
        }
    }

    public function destroy($id) {
        $postagem = Postagem::findOrFail($id);
        $departamento = Departamento::findOrFail($postagem->departamento_id);
        $user = $departamento->user;
       
        $result = $postagem->delete();
        if ($result) {
            return redirect()->route('listagem')->with('msg', 'Artigo deletado com sucesso!');
        } else {
            return redirect()->back();
        }
    }

}
