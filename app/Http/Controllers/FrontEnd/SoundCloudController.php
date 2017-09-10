<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SoudCloud\Sound;
class SoundCloudController extends Controller
{
    private $paginate = 4;
    public function getall(){
        $sound = new Sound();
        $data = array(
            'sounds'    =>  $sound->where('status', true)->paginate($this->paginate),
            );
        return view('FrontEnd.soundcloud.sound-cloud' , $data);
    }
}
