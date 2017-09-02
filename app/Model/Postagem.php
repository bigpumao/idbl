<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Model\Album\Departamento;
use App\User;
class Postagem extends Model
{
    protected $fillable = [
        'titulo',
        'imagem',
        'descricao',
        'status',
        ];
    
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
   
   public function user(){
       return $this->belongsTo(User::class);
   }
}
