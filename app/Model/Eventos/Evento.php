<?php

namespace App\Model\Eventos;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Evento extends Model
{
    public function user()
    {
    	return $this->belongsto(User::class);
    }
}
