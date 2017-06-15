<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductoT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //   Schema::create('producto_t', function (Blueprint $table) {
      //     $table->increments('id');
      //     $table->string('title',255);
      //     $table->string('slug',255);
      //     $table->text('descripcion');
      //     $table->integer('cantidad');
      //     $table->float('precio_venta');
      //     $table->char('estado',1);//  E xistencia, V endido, I nactivo
      //     $table->string('ruta');

      //     $table->timestamps();
      //     $table->softDeletes();

      // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_t');
    }
}
