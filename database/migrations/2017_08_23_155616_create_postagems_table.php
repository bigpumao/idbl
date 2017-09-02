<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('departamento_id') ->unsigned();
            $table->foreign('departamento_id')
            ->references('id')
            ->on('departamentos')
            ->onDelete('cascade');
            $table->string('titulo', 200);
            $table->string('imagem')->default('postagem.jpg');
            $table->integer('status')->default('0');
            $table->text('descricao');
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
        Schema::dropIfExists('postagems');
    }
}
