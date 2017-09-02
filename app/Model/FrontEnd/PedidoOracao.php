<?php

namespace App\Model\FrontEnd;

use Illuminate\Database\Eloquent\Model;

class PedidoOracao extends Model
{
    protected $fillable = ['secret','area','nome','email','titulo','descricao'];
}
