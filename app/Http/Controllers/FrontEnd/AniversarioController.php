<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Membro;
use Illuminate\Support\Facades\DB;

class AniversarioController extends Controller {

    public function aniverssario() {

        $date = Membro::all();
        foreach ($date as $d) {
            $explode = explode('-', $d->dataNasc);
           
        }
        $query = DB::table('membros')
                ->whereDay('dataNasc', $explode[2])
                ->whereMonth('dataNasc', $explode[1])
                ->get(['nome']);
       
    }

}
