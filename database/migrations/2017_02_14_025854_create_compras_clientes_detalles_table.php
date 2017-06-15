<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasClientesDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('compras_clientes_detalle', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_producto_venta')->unsigned();
          $table->integer('id_compras_clientes')->unsigned();
          $table->integer('cantidad');
          $table->float('precio_unitario');
          
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('id_producto_venta')->references('id')->on('producto_venta');
          $table->foreign('id_compras_clientes')->references('id')->on('compras_clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('compras_clientes_detalle');
    }
}
