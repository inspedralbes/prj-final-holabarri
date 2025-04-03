<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producto_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_comercio_id');
            $table->foreign('order_comercio_id')->references('id')->on('order_comercios')->onDelete('cascade');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->integer('cantidad')->min(1);
            $table->float('precio'); //PRECIO UNIDAD, ¡¡¡NO MULTIPLICACIÓN!!!
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_orders');
    }
};
