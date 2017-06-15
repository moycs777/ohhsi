<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostGaleriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('post_galeria', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_multimedia')->unsigned();
          $table->foreign('id_multimedia')->references('id')->on('multimedia')->onDelete('restrict');
          $table->integer('id_post')->unsigned();
          $table->foreign('id_post')->references('id')->on('post')->onDelete('cascade');
          
          $table->timestamps();
          $table->softDeletes();
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_galeria');
    }
}
