<?php

namespace App\Model\Album;

use Illuminate\Database\Eloquent\Model;
use App\Model\Album\Departamento;
use App\Model\Album\ImagemAlbum;
class Album extends Model {

    protected $fillable = ['nome', 'descricao', 'departamento_id', 'imagem_capa'];

    public function getAlbum() {
        $result = Album::all();
        return $result;
    }

    public function departamento() 
    {
        return $this->belongsTo(Departamento::class);
    }
    public function imagemAlbums(){
        return $this->hasMany(ImagemAlbum::class);
    }
    

}
