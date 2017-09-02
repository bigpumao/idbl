<?php

namespace App\Http\Controllers\dashboard\SoudCloud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SoudCloud\Sound;
use Yajra\Datatables\Facades\Datatables;
class SoudCloudController extends Controller
{
   public function index(){
        $data = array(
            'titulo' => 'Lista de sons do Sound Cloud 🎶',
            'localizador' => 'Lista de sons do Sound Cloud',
            'info' => 'Lista de sons do Sound Cloud',
            'avatar' => Auth()->user()
        );
        return view('dashboard.soundCloud.index',$data);
   }
    public function get_datatable() {
        $d = Sound::select(['id', 'titulo', 'frame', 'status', 'created_at']);

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
            'titulo' => 'Criando Sessão no Sound Cloud 🎶',
            'localizador' => 'Criando Sessão no Sound Cloud',
            'info' => 'Criando Sessão no Sound Cloud',
            'avatar' => Auth()->user()
        );
        return view('dashboard.soundCloud.create',$data);
    }
    public function store(Request $request){
       $sound = new Sound();
       $sound->titulo = $request->titulo;
       $sound->frame = $request->frame;
       $sound->status = $request->status;
       $sound->user_id = auth()->user()->id;
       $result = $sound->save();
       if($result){
           return redirect()->route('sound.index')->with('msg','Sessão Sound Cloud salva com sucesso');
       }else{
           return redirect()->back()->with('error','Não foi possivel salvar a sessão Sound Cloud');
       }
    }
    public function edit($id){
        $sound = new Sound();
        $result = $sound->findOrFail($id);
        $data = array(
            'titulo' => 'Editando Sessão no Sound Cloud 🎶',
            'localizador' => 'Editando Sessão no Sound Cloud',
            'info' => 'Editando Sessão no Sound Cloud',
            'avatar' => Auth()->user(),
            'sound' =>  $result,
        );
        return view('dashboard.soundCloud.edit',$data);
        
    }
    public function update(Request $request , $id){
        $sound = new Sound();
        $result = $sound->findOrFail($id);
        $result->user_id = auth()->user()->id;
        $result->frame = $request->frame;
        $result->status = $request->status;
        $result->titulo = $request->titulo;
        $q = $result->save();
       if($q){
           return redirect()->route('sound.index')->with('msg','Sessão Sound Cloud atualizada com sucesso');
       }else{
           return redirect()->back()->with('error','Não foi possivel atualizar a sessão Sound Cloud');
       }
        
    }
    public function destroy($id){
        $sound = new Sound();
        $result = $sound->findOrFail($id);
        $q = $result->delete();
        if($q){
           return redirect()->route('sound.index')->with('msg','Sessão Sound Cloud Deletada com sucesso');
       }else{
           return redirect()->back()->with('error','Não foi possivel deletar a sessão Sound Cloud');
       }
    }
}
