<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('compras_clientes', function (Blueprint $table) {
          $table->increments('id');
          $table->float('monto_compra');
          $table->date('fecha_compra');
          $table->date('fecha_despacho')->nullable();
          $table->boolean('despacho')->nullable();
          $table->boolean('calificacion')->nullable();//default false
          $table->string('soporte_pago')->nullable();

          $table->integer('id_cliente')->unsigned();
          $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
          
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
        Schema::dropIfExists('compras_clientes');
    }
}
