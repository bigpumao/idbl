<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Eventos\Evento;
class EventosController extends Controller
{
    private $paginate = 6;
    public function eventosAll()
    {
    
    	$result = Evento::where('status' , true)->paginate($this->paginate);
       
    	$data = array(
            'titulo'    =>  'Eventos',
            'eventos'   =>  $result,
        );
        return view('FrontEnd.eventos.eventos' , $data);
    }
    public function findEvento($id){
        $evento = Evento::findOrFail($id);  
        $data = array(
            'titulo'    =>  $evento->titulo,
            'evento'    =>  $evento,
        ); 
        return view('FrontEnd.eventos.evento-id',$data);
    }
}
