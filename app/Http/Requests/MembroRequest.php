<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class MemboRequest extends FormRequest
{
    
    protected $redirect = 'membros/create';
    
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
                'nome'                          => 'required|max:255',
                'endereco'                      => 'required',
                'cidade'                        => 'required',
                'estado'                        => 'required',
                'fone'                          => 'required',
                'dataNasc'                      => 'required',
                'naturalidade'                  => 'required',
                'nacionalidade'                 => 'required',
                'filiacao'                      => 'required',
                'rg'                            => 'required',
                'cpf'                           => 'required',
                'escolaridade'                  => 'required',
                'estadoCivil'                   => 'required',
                'nomeConjuge'                   => 'required',
                'dataConversao'                 => 'required',
                'dataBatismo'                   => 'required',
                'lugar'                         => 'required',
                'ministro'                      => 'required',
                'primeiraMembrecia'             => 'required',
                'igrejaMembrecia'               => 'required',
                'dataMembreciaAtual'            => 'required',
                'batismoEspiritoSanto'          => 'required',
                'igrejaBatismoEspiritoSanto'    => 'required',
       
        ];
    }
}
