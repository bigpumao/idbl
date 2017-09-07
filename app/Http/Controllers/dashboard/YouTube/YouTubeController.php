<?php

namespace App\Http\Controllers\dashboard\YouTube;

use App\Model\Album\Departamento;
use App\Model\YouTube\Youtube;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class YouTubeController extends Controller
{

    public function index(){
        $data = array(
            'titulo' => 'Lista de vídeos do You Tube',
            'localizador' => 'Lista de vídeos do You Tube',
            'info' => 'Lista de vídeos do You Tube',
            'avatar' => Auth()->user()
        );
        return view('dashboard.youtube.index',$data);
    }
    public function get_datatable() {
        $d = Youtube::select(['id', 'titulo', 'status', 'created_at']);

        return Datatables::of($d)
            ->addColumn('action', function ($list) {
                return '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
    public function create(){
        $data = array(
            'titulo' => 'Criando Vídeos do You Tube',
            'localizador' => 'Criando Vídeos do You Tube',
            'info' => 'Criando Vídeos do You Tube',
            'avatar' => Auth()->user()
        );
        return view('dashboard.youtube.create',$data);
    }
    public function store(Request $request){
        $departamento = new Departamento();
        $tube = new Youtube();

        $this->validate(request(), [
            'titulo'        =>  'required',
            'frame'         =>  'required',
            'departamento'  =>  'required',
            'status'        =>  'required',

        ]);

        $departamento->user_id = auth()->user()->id;
        $departamento->departamento = $request->departamento;
        $departamento->categoria = $request->categoria;
        $departamento->save();

        $tube->frame = $request->frame;
        $tube->status = $request->status;
        $tube->titulo = $request->titulo;
        $tube->departamento_id = $departamento->id;
        $result = $tube->save();

        if($result){
            return redirect()->route('tube.index')->with('msg','O vídeo do You Tube foi salvo com sucesso');
        }else{
            return redirect()->back()->with('error','Não foi possivel salvar o vídeo do You Tube');
        }
    }
    public function edit($id){
        $tube = new Youtube();
        $result = $tube->findOrFail($id);
        $data = array(
            'titulo' => 'Editando vídeos do You Tube',
            'localizador' => 'Editando vídeos do You Tube',
            'info' => 'Editando vídeos do You Tube',
            'avatar' => Auth()->user(),
            'sound' =>  $result,
        );
        return view('dashboard.youtube.edit',$data);

    }
    public function update(Request $request , $id){
        $tube = new Youtube();
        $departamento = new Departamento();
        $result = $tube->findOrFail($id);
        $departa = $departamento->findOrFail($result->departamento_id);
        $departa->categoria = $request->categoria;
        $departa->departamento = $request->departamento;
        $departa->user_id = auth()->user()->id;
        $departa->save();

        $result->departamento_id = $departa->id;
        $result->frame = $request->frame;
        $result->status = $request->status;
        $result->titulo = $request->titulo;
        $q = $result->save();
        if($q){
            return redirect()->route('tube.index')->with('msg','O vídeo do You Tube foi atualizada com sucesso');
        }else{
            return redirect()->back()->with('error','Não foi possivel atualizar o vídeo do You Tube');
        }

    }
    public function destroy($id){
        $tube = new Youtube();
        $result = $tube->findOrFail($id);
        $q = $result->delete();
        if($q){
            return redirect()->route('tube.index')->with('msg','O vídeo do You Tube foi Deletada com sucesso');
        }else{
            return redirect()->back()->with('error','Não foi possivel deletar o vídeo do You Tube a sessão Sound Cloud');
        }
    }
}
