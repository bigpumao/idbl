<?php

namespace App\Model;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Image;
use App\User;

class Membro extends Model {

    protected $table = "membros";
    protected $fillable = ['user_id','nome', 'imagem', 'endereco', 'cep', 'cidade', 'estado','bairro', 'fone', 'dataNasc',
        'naturalidade', 'nacionalidade', 'filiacao', 'rg', 'cpf', 'tituloEleitoral', 'escolaridade',
        'estadoCivil', 'nomeConjuge', 'quantFilhos', 'sexFilho', 'dataConversao', 'igrejaConversao',
        'dataBatismo', 'lugar', 'ministro', 'primeiraMembrecia', 'igrejaMembrecia', 'dataMembreciaAtual',
        'batismoEspiritoSanto', 'igrejaBatismoEspiritoSanto', 'historico', 'updated_at', 'created_at'];

    public static function countID() {
        $f = new Membro();
        $ficha = $f->count('id');

        return $ficha;
    }
    public function user()
    {
        return $this->belongsto(User::class);
    }

    

}
