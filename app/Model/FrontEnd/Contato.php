<?php

namespace App\Model\FrontEnd;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['nome','email','telefone','mensagem'];
}
