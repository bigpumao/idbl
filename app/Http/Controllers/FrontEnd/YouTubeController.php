<?php

namespace App\Http\Controllers\FrontEnd;

use App\Model\YouTube\Youtube;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YouTubeController extends Controller
{
    private $paginate = 6;

    public function index()
    {
        $data = array(
            'titulo'    =>  'Todos os Vídeos',
            'youtube'   =>  Youtube::where('status' , true)->orderBy('id' , 'desc')->paginate($this->paginate),
        );
        return view('FrontEnd.youtube.index', $data);
    }
    public function search(Request $request)
    {
        $data = array(
            'titulo'    =>  'Pesquisa dos vídeos',
            'youtube'   =>  Youtube::where('status' , true)->where('titulo', 'LIKE', "%$request->search%")->paginate($this->paginate),
        );
        return view('FrontEnd.youtube.search',$data);
    }
}
