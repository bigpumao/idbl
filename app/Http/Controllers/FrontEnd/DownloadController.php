<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Download\Download;

class DownloadController extends Controller
{
    private $paginate = 6;
    public function getDownload()
    {
        $result = Download::paginate($this->paginate);
        
        $data = array(
            'titulo'    =>  'Downloads',
            'downloads' =>  $result
        );
        return view('FrontEnd.downloads.download', $data);
    }
}
