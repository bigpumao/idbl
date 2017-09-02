<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FrontEnd\Contato;


class ContatoController extends Controller {

    public function index() {
        $data = array(
            'titulo' => 'Contato',
        );
        return view('FrontEnd.contato.contato', $data);
    }

    public function store(Request $request) {

        $data = $request->all();
        $contato = new Contato();
        $this->validate($request, [
        'nome' => 'required',
        'email' => 'required',
        'mensagem' =>  'required',
    ]);


        $result = $contato->create($data);
        if($result)
        {
            return redirect()->back()->with('sucesso', 'Muito Obrigado. Entraremos em contato em breve');
        } else 
            
        {
            return redirect()->back()->with('error','Descupe-nos. Não foi possivel enviar o contato. Tente outra vez.');
        }
    }

}
