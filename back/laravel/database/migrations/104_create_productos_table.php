<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategoria_id');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade');
            $table->unsignedBigInteger('comercio_id');
            $table->foreign('comercio_id')->references('id')->on('comercios')->onDelete('cascade');
            $table->string('nombre');
            $table->text('descripcion');
            $table->float('precio');
            $table->boolean('visible')->default(true);
            $table->integer('stock')->nullable();
            $table->string('imagen')->nullable()->comment('Nombre del archivo de la imagen principal del producto');
        });
    }

    public function down() {
        Schema::dropIfExists('productos');
    }
};
