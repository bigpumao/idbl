<?php

namespace App\Http\Controllers\dashboard\Contato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FrontEnd\Contato;
use Datatables;
use Auth;

class ContatoController extends Controller {

    public function index() {
        $data = array(
            'titulo' => 'Contato',
            'localizador' => 'Contato',
            'info' => 'Contato',
            'avatar' => Auth()->user(),
        );
        return view('dashboard.contato.contato', $data);
        
    }

    public function get_datatable() {
        $membro = Contato::select(['id', 'nome', 'email', 'telefone', 'created_at']);

        return Datatables::of($membro)
                        ->addColumn('action', function ($list) {
                            return '<a href="show/' . $list->id . '" class="btn btn-xs btn-primary"><i class="fa fa-folder-open-o"></i> Show</a>'
                                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->make(true);
    }

    public function show($id) {
        $contato = Contato::findOrFail($id);
         $data = array(
            'titulo' => 'Contato',
            'localizador' => 'Contato',
            'info' => 'Contato',
            'avatar' => Auth()->user(),
            'contato'   =>  $contato,
        );
        return view('dashboard.contato.show', $data);
    }

    public function destroy($id) {
        $contato = new Contato();
        $result = $contato->delete($id);


        if ($result) {
            return redirect()->back()->with('msg', 'Contato deletado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Não foi possivel deletar o contato. Tente de novo');
        }
    }

}
