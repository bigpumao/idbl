<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Album\Departamento;
class DepartamentoController extends Controller
{
    protected $paginate = 6;
    public function search($departamento)
    {
        $departamento = Departamento::with('postagems')->where('departamento', $departamento)
                ->where('categoria', 'postagem')->paginate($this->paginate);
        
        $data = array(
            'titutlo'   =>  'Departamento',
            'departamentos' =>  $departamento,
        );
        return view('Frontend.departamento.departamento' , $data);
    }
}
