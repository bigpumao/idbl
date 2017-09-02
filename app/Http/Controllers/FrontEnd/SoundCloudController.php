<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SoudCloud\Sound;
class SoundCloudController extends Controller
{
    public function getall(){
        $sound = new Sound();
        $result = $sound->all();
        return view('FrontEnd.index' , $result);
    }
}
