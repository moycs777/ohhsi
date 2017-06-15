<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('calificacion', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_compras_clientes')->unsigned();
          $table->integer('id_producto_venta')->unsigned();
          $table->string('opinion');
          $table->integer('estrellas');
          
          $table->timestamps();
          $table->softDeletes();
           
          $table->foreign('id_compras_clientes')->references('id')->on('compras_clientes');
          $table->foreign('id_producto_venta')->references('id')->on('producto_venta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificacion');
    }
}
