<?php

namespace App\Model\Biografia;

use Illuminate\Database\Eloquent\Model;

class Biografia extends Model
{
   protected $fillable = ['user_id' , 'descricao' ];
}
