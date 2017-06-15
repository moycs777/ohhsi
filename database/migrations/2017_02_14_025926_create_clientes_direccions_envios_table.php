<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesDireccionsEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cliente_direccion_envio', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_cliente')->unsigned();
          $table->string('nombre_contacto');
          $table->string('pais');
          $table->string('direccion1');
          $table->string('direccion2');
          $table->string('ciudad');
          $table->string('estado');
          $table->string('codigo_postal');
          $table->string('telefono');
          $table->string('payu_info')->nullable();
          $table->char('principal',1);//S o N

          $table->timestamps();
          $table->softDeletes();
           
          $table->foreign('id_cliente')->references('id')->on('clientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('cliente_direccion_envio');
    }
}
