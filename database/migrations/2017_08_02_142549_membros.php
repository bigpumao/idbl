<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Membros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('membros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->string('nome');
            $table->string('imagem');
            $table->string('endereco');
            $table->string('cep');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('estado');
            $table->string('fone');
            $table->string('dataNasc');
            $table->string('naturalidade');
            $table->string('nacionalidade');
            $table->string('filiacao');
            $table->string('rg');
            $table->string('cpf');
            $table->string('tituloEleitoral');
            $table->string('escolaridade');
            $table->string('estadoCivil');
            $table->string('nomeConjuge');
            $table->string('quantFilhos');
            $table->char('sexFilho', 4)->nullable();
            $table->string('dataConversao');
            $table->string('igrejaConversao');
            $table->string('dataBatismo');
            $table->string('lugar');
            $table->string('ministro');
            $table->string('primeiraMembrecia');
            $table->string('igrejaMembrecia');
            $table->string('dataMembreciaAtual');
            $table->string('batismoEspiritoSanto');
            $table->string('igrejaBatismoEspiritoSanto');
            $table->text('historico');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('membros');
    }
}
