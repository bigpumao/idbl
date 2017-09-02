<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FrontEnd\PedidoOracao;

class PedidoController extends Controller {

    public function store(Request $request) {
        $pedido = new PedidoOracao();
         $this->validate(request(), [
            'secret' => 'required',
            'area' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'titulo' => 'required',
            'descricao' => 'required',
        ]);
               $result = $pedido->create($request->all());
        if ($result) {
            return redirect()->route('front.index')->with('msg', 'Seu Pedido de Oração foi enviado com sucesso');
        } else {
            return redirect()->route('front.index')->with('error', 'Não foi possivel enviar o seu pedido. Desculpe-nos pelo transtorno. Tente novamente');
        }
    }

    public function quemSomos() {
        $data = array(
            'titulo' => 'Quem Somos?',
        );
        return view('FrontEnd.quem-somos.quem-somos', $data);
    }

}
