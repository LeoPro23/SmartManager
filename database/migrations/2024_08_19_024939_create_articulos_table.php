<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('contenido'); // Aquí se almacena el HTML del artículo
            $table->string('tipo_contenido'); // Diferencia el tipo de artículo (e.g., "estrategias", "contabilidad", "noticias")
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
