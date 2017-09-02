<?php

namespace App\Model\Album;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Postagem;
use App\Model\Album\Album;
use App\Model\Album\ImagemAlbum;
class Departamento extends Model {

    protected $fillable = ['departamento'];

    
    public function user()
    
    {
        return $this->belongsto(User::class);
    }
    public function postagems()
    {
        return $this->hasMany(Postagem::class , 'departamento_id');
    }
    public function albums(){
        return $this->hasMany(Album::class);
    }
    public function imagemAlbums()
    {
        return $this->hasManyThrough(ImagemAlbum::class, Album::class);
    }


    
    public function dataImgRelacionadas($id) {
        $d = DB::table('users')
                        ->join('departamentos'  , 'departamentos.user_id' , 'users.id')
                        ->join('albums' , 'albums.departamento_id' , 'departamentos.id')
                        ->where('albums.id' , $id)
                       ->get()
                        ->first();
        return $d;
    }

    public function foreachDelImg($id) {
        $c = DB::table('images')
                ->join('albums', 'albums.id', '=', 'images.album_id')
                ->where('albums.id', $id)
                ->select('images.imagem')
                ->get();
        return $c;
    }

    public function updateDeparta($id) {
        $d = DB::table('departamentos')
                        ->join('albums', 'albums.departamento_id', '=', 'departamentos.id')
                        ->where('albums.id', $id)
                        ->get()->first();

        return $d;
    }

}
