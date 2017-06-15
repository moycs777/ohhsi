<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categoria_producto', function (Blueprint $table) {
          $table->increments('id');
          $table->string('descripcion');
          $table->char('estado',1);
          $table->string('slug')->unique();
          $table->integer('id_categoria_padre')->unsigned();
          
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
      Schema::dropIfExists('categoria_producto');

    }
}
