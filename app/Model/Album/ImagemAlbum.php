<?php

namespace App\Model\Album;

use Illuminate\Database\Eloquent\Model;
use App\Model\Album\Album;
use App\Model\Album\Departamento;
use DB;
class ImagemAlbum extends Model
{
    protected $table =  'images';
    protected $fillable = ['album_id','imagem', 'descricao'];
    
    public function album(){
        return $this->belongsTo(Album::class);
    }
    public function quantImagem($id)
    {
        return ImagemAlbum::all()->where('album_id', $id)->count();
    }
  
}
