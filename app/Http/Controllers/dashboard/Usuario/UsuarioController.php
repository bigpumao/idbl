<?php

namespace App\Http\Controllers\dashboard\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use DB;
use Yajra\Datatables\Datatables;
use Validator;

class UsuarioController extends Controller {

    public function index() {

        $data = array(
            'titulo' => 'Cadastro de Usuário',
            'info' => 'Cadastro de Usuário',
            'localizador' => 'Usuário',
            'avatar' => Auth::user(),
            'alc' => User::all(),
        );

        return view('dashboard.usuario.index', $data);
    }

    public function get_datatable() {

        $post = User::select(['id', 'name', 'email', 'admin', 'created_at', 'updated_at']);

        return Datatables::of($post)
                        ->addColumn('action', function ($list) {
                            return '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->removeColumn('password')
                        ->make(true);
    }

    public function create() {
        $data = array(
            'titulo' => 'Cadastro de Usuário',
            'info' => 'Cadastro de Usuário',
            'localizador' => 'Usuário',
            'avatar' => Auth::user()
        );
        if (auth()->user()->admin) {
            return view('dashboard.usuario.create', $data);
        } else {
            return redirect()->back()->with('error', 'Este usuário não tem status como Administrativo');
        }
    }

    public function store(Request $request) {

        if (auth()->user()->admin) {
            $v = Validator::make($request->all(), [
                        'name' => 'required|string|max:255',
                        'email' => 'required|string|email|max:255|unique:users',
//                     'password' => 'required|string|min:6|confirmed',
            ]);
            if ($v->fails()) {
                return redirect()
                                ->route('user.create')
                                ->withErrors($v)
                                ->withInput();
            }

            $u = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
            ]);
            if ($u) {
                return redirect()->route('user.index')->with('msg', 'Usuário cadastrado com sucesso.');
            } else {
                return redirect()->back()->with('msg', 'Não foi possivel cadastrar o usuario.');
            }
        } else {
            return redirect()->back()->with('msg', 'Você não tem permição para add um usuario');
        }
    }

    public function edit($id) {

        $data = array(
            'titulo' => 'Cadastro de Usuário',
            'info' => 'Cadastro de Usuário',
            'localizador' => 'Usuário',
            'avatar' => Auth::user(),
            'user' => User::findOrFail($id)
        );
        if (auth()->user()->admin) {
            return view('dashboard.usuario.edit', $data);
        } else {
            return redirect()->back()->with('error', 'Este usuário não tem status como Administrativo');
        }
    }

    public function update(Request $request, $id) {
        $user = new User();
        $result = $user->find($id);
        if ($id != 1 or auth()->user()->id == 1) {
            if (auth()->user()->admin) {
                $query = $result->update($request->all());
                if ($query) {
                    return redirect()->route('user.index')->with('msg', 'Usuario atualizado com sucesso.');
                } else {
                    return redirect()->back()->with('msg', 'Não foi possivel atualizar o usuario');
                }
            }else
            {
               return redirect()->route('user.index')->with('error' , 'Este usuário não tem status como Administrador');
            }
        }else {
                return redirect()->route('user.index')->with('error' , 'Este usuário não pode ser Atualizado');
        }
    }

    public function destroy($id) {
        $user = new User();
        if (auth()->user()->admin) {
            $result = $user->findOrFail($id)->delete();

            if ($result) {
                return redirect()->route('user.index')->with('msg', 'Usuário excluido com sucesso');
            } else {
                return redirect()->route('user.index')->with('msg', 'Não foi possivel excluir o usuario ' . $user->name);
            }
        } else {
            return redirect()->back()->with('error', 'Este usuário não tem status como Administrativo');
        }
    }

}
