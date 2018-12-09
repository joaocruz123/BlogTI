<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtigosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('titulo')->unique();
            $table->string('descricao');
            $table->string('corpo');
            $table->string('imagem');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('artigos');
    }
}
