<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Album\Departamento;
use App\Model\Postagem;
use App\Model\Biografia\Biografia;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
   public function departamentos()
   {
       return $this->hasMany(Departamento::class);
   }
    public function postagens()
    {
        return $this->hasManyThrough(Postagem::class, Departamento::class);
    }
    public function biografia(){
        return $this->hasOne(Biografia::class);
    }
    

}
