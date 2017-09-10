<?php

namespace App\Http\Controllers\dashboard\Biografia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Biografia\Biografia;

class BiografiaController extends Controller {

    public function update(Request $request, $id) {
        $bio = new Biografia();
        $count = $bio->where('user_id', $id)->get()->count();
        $where = $bio->where('user_id', $id)->get()->first();
        
        if($count == 0) {
            $bio->user_id = $id;
            $bio->descricao = $request->descricao;
            $result = $bio->save();
            if ($result) {
                return redirect()->back()->with('msg', 'Biografia salva com sucesso');
            } else {
                return redirect()->back()->with('error', 'Não foi possivel cadastrar sua biografia');
            }
        }
        $where->user_id = $id;
        $where->descricao = $request->descricao;
        $result = $where->save();

        if ($result) {
            return redirect()->back()->with('msg', 'Biografia salva com sucesso');
        } else {
            return redirect()->back()->with('error', 'Não foi possivel cadastrar sua biografia');
        }
    }

}
