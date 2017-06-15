<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('post', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_categoria_post')->unsigned();
          $table->string('titulo');
          $table->string('slug');
          $table->text('descripcion');

          $table->timestamps();
          $table->softDeletes();
          
          $table->foreign('id_categoria_post')->references('id')->on('categoria_post')->onDelete('restrict');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
