<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('departamento_id')->unsigned();
            $table->string('nome');
            $table->text('descricao');
            $table->string('imagem_capa');
            $table->boolean('status')->default(false);
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('albums');
    }

}
