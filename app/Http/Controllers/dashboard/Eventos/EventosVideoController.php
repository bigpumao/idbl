<?php

namespace App\Http\Controllers\dashboard\Eventos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Eventos\Video;
use Yajra\Datatables\Facades\Datatables;
use Auth;
class EventosVideoController extends Controller
{
    public function index(){
        $data = array(
            'titulo' => 'Eventos em Vídeo',
            'localizador' => 'Eventose em Vídeo',
            'info' => 'Eventos em Vídeo',
            'avatar' => Auth::user(),
        );
        return view('dashboard.eventos.video.index', $data);
    }
     public function get_datatable() {
        $d = Video::select(['id', 'titulo', 'frame', 'status', 'created_at']);

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
        return view('dashboard.eventos.video.create',$data);
    }
    public function store(Request $request){
       $video = new Video();

       $this->validate(request() , [
           'titulo'     =>  'required',
           'frame'      =>  'required',
           'status'     =>  'required',
           'descricao'  =>  'required',
           ]);

       $video->titulo = $request->titulo;
       $video->frame = $request->frame;
       $video->status = $request->status;
       $video->descricao = $request->descricao;
       $video->user_id = auth()->user()->id;
       $result = $video->save();
       if($result){
           return redirect()->route('video.index')->with('msg','Vídeo do You Tube cadastrado com sucesso');
       }else{
           return redirect()->back()->with('error','Não foi possivel cadastrar Vídeo do Youtube');
       }
    }
    public function edit($id){
        $video = new Video();
        $result = $video->findOrFail($id);
       
        $data = array(
            'titulo' => 'Editando Sessão no Sound Cloud 🎶',
            'localizador' => 'Editando Sessão no Sound Cloud',
            'info' => 'Editando Sessão no Sound Cloud',
            'avatar' => Auth()->user(),
            'video' =>  $result,
        );
        return view('dashboard.eventos.video.edit',$data);
        
    }
    public function update(Request $request , $id){
        $video = new Video();
        $result = $video->findOrFail($id);
        $result->user_id = auth()->user()->id;
        $result->frame = $request->frame;
        $result->status = $request->status;
        $result->descricao = $request->descricao;
        $result->titulo = $request->titulo;
        $q = $result->save();
       if($q){
           return redirect()->route('video.index')->with('msg','Vídeo do You Tube atualizada com sucesso');
       }else{
           return redirect()->back()->with('error','Não foi possivel atualizar Vídeo do You Tube');
       }
        
    }
    public function destroy($id){
        $video = new Video();
        $result = $video->findOrFail($id);
        $q = $result->delete();
        if($q){
           return redirect()->route('video.index')->with('msg','Video You Tube Deletada com sucesso');
       }else{
           return redirect()->back()->with('error','Não foi possivel deletar Vídeo do You Tube ');
       }
    }
}
