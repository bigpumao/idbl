<?php

namespace App\Http\Controllers\dashboard\Eventos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Eventos\Evento;
use Yajra\Datatables\Datatables;
use Validator;
use Auth;
use Image;

class EventosController extends Controller {

    public function index() {
        $data = array(
            'titulo' => 'Eventos',
            'localizador' => 'Eventos',
            'info' => 'Eventos',
            'avatar' => Auth::user(),
        );
        return view('dashboard.eventos.index', $data);
    }

    public function create() {
        $data = array(
            'titulo' => 'Eventos',
            'localizador' => 'Eventos',
            'info' => 'Eventos',
            'avatar' => Auth::user(),
        );
        return view('dashboard.eventos.create', $data);
    }

    public function get_datatable() {
        $post = Evento::select(['id', 'titulo', 'data_inicio', 'data_fim', 'status']);

        return Datatables::of($post)
                        ->addColumn('action', function ($list) {
                            return '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->removeColumn('password')
                        ->make(true);
    }

    public function store(Request $request) {
        $eventos = new Evento();

        $validator = Validator::make($request->all(), [
                    'imagem' => 'required|image|mimes:jpg,png,gif,jpeg',
                    'titulo' => 'required',
                    'data_inicio' => 'required',
                    'data_fim' => 'required',
                    'descricao' => 'required',
                    'categoria' =>  'required',
                    'checkbox'  =>  'required',
        ]);

        if ($validator->fails()) {
            return redirect('dashboard/eventos/create')
                            ->withErrors($validator)
                            ->withInput();
        }


        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $filename = time() . "." . $imagem->getClientOriginalExtension();
            $imagemPath = public_path('imagem/igreja/File/eventos/' . $filename);
            Image::make($imagem)
                    ->resize(1280, 638)
                    ->save($imagemPath);
        }
        $user = Auth::user()->id;
        $eventos->user_id = $user;
        $eventos->imagem = $filename;
        $eventos->categoria = $request->categoria;
        $eventos->checkbox =    $request->checkbox;
        $eventos->data_inicio = $request->data_inicio;
        $eventos->data_fim = $request->data_fim;
        $eventos->status = $request->status;
        $eventos->titulo = $request->titulo;
        $eventos->descricao = $request->descricao;
        $result = $eventos->save();

        if ($result)
            return redirect()->route('eventos.index')->with('msg', 'Eventos cadastrado com sucesso');
        else
            return redirect()->back()->with('info', 'Não foi possivel cadastrar o eventos');
    }

    public function edit($id) {
        $evento = new Evento();
        $data = array(
            'titulo' => 'Eventos',
            'localizador' => 'Eventos',
            'info' => 'Eventos',
            'avatar' => Auth::user(),
            'update' => $evento->findOrFail($id)
        );
        return view('dashboard.eventos.edit', $data);
    }

    public function update(Request $request, $id) {
        $evet = new Evento();
        $eventos = $evet->findOrFail($id);
        
        $user = Auth::user();
        
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            $imagemPath = public_path('/imagem/igreja/File/eventos/' . $filename);
            Image::make($imagem)
                    ->resize(1280, 638)
                    ->save($imagemPath);
            
            $eventos->user_id = $user->id;
            $eventos->imagem = $filename;
            $eventos->titulo = $request->titulo;
            $eventos->data_inicio = $request->data_inicio;
            $eventos->data_fim = $request->data_fim;
            $eventos->status = $request->status;
            $eventos->checkbox  = $request->checkbox;
            $eventos->descricao = $request->descricao;
            $result = $eventos->save();
            if ($result)
                return redirect()->route('eventos.index')->with('msg', 'Evento atualizado com sucesso');
            else
                return redirect()->route('eventos.index')->with('msg', 'Não foi possivel atualizar o evento');
        }else {
            
            $eventos->user_id = $user->id;
            $eventos->imagem = $eventos->imagem;
            $eventos->titulo = $request->titulo;
            $eventos->data_inicio = $request->data_inicio;
            $eventos->data_fim = $request->data_fim;
            $eventos->status = $request->status;
            $eventos->checkbox  = $request->checkbox;
            $eventos->descricao = $request->descricao;
            $result = $eventos->save();
            if ($result)
                return redirect()->route('eventos.index')->with('msg', 'Evento atualizado com sucesso');
            else
                return redirect()->route('eventos.index')->with('msg', 'Não foi possivel atualizar o evento');
        }
    }

    public function destroy($id) {
        $evento = new Evento();
        $evnt = $evento->findOrFail($id);
        $result = $evnt->delete($id);
        if ($result)
           return redirect()->route('eventos.index')->with('msg', 'Evento excluido com sucesso');
        else
           return redirect()->route('eventos.index')->with('error', 'Não foi possivel excluir o evento');
    }

}
