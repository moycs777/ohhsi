<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosVentasGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_venta_galeria', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_multimedia')->unsigned();
          $table->foreign('id_multimedia')->references('id')->on('multimedia')->onDelete('restrict');
          $table->integer('id_producto_venta')->unsigned();
          $table->foreign('id_producto_venta')->references('id')->on('producto_venta')->onDelete('cascade');
          
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
        Schema::dropIfExists('producto_venta_galeria');
    }
}
