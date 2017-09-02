<?php

namespace App\Http\Controllers\dashboard\PedidoOracao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FrontEnd\PedidoOracao;
use Yajra\Datatables\Datatables;
use Auth;

class PedidoOracaoController extends Controller {

    public function index() {
        $data = array(
            'titulo' => 'Pedido de oração',
            'localizador' => 'Pedido de oração',
            'info' => 'Pedido de oração',
            'avatar' => Auth::user(),
        );
        return view('dashboard.pedido.index', $data);
    }

    public function get_datatable() {
        $post = PedidoOracao::select(['id', 'secret', 'area', 'nome', 'email', 'titulo']);

        return Datatables::of($post)
                        ->addColumn('action', function ($list) {
                            return '<a href="show/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-comment-o" ></i> show</a>'
                                    . '<a href="destroy/' . $list->id . '" id="destroy" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->removeColumn('password')
                        ->make(true);
    }

    public function destroy($id) {
        $oracao = PedidoOracao::findOrFail($id);
        $result = $oracao->delete();
        if ($result) {
            return redirect()->back()->with('msg', 'Pedido Excluido com êxito');
        } else {
            return redirect()->back()->with('error', 'Não foi possivel deletar o pedido de oracao. Tente novamente');
        }
    }

    public function show($id) {
        $oracao = PedidoOracao::findOrFail($id);
        $data = array(
            'titulo' => $oracao->titulo,
            'pedido' => $oracao,
            'localizador' => 'Pedido de oração',
            'info' => 'Pedido de oração',
            'avatar' => Auth::user(),
        );
        return view('dashboard.pedido.show', $data);
    }

}
