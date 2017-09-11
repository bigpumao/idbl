<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_departamento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('departamento_id')->unsigned();
            $table->integer('categoria_id')->unsigned();


            $table->foreign('departamento_id')
                ->references('id')
                ->on('departamentos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('cascade')
                ->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_departamento');
    }
}
