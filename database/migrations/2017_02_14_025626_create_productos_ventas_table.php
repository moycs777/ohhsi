<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateProductosVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('producto_venta', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_categoria_producto')->unsigned();
          $table->string('titulo');
          $table->string('slug')->unique();
          $table->text('descripcion');
          $table->integer('cantidad');
          $table->double('precio_venta',20,0);
          $table->char('estado',1);//  E xistencia, V endido, I nactivo
          
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('id_categoria_producto')->references('id')->on('categoria_producto')->onDelete('restrict');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('producto_venta');

    }
}
