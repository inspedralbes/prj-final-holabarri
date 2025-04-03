<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('cliente_id');
                $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');
                $table->float('total');
                $table->unsignedBigInteger('tipo_envio')->nullable();
                $table->foreign('tipo_envio')->references('id')->on('tipo_envios')->onDelete('cascade');
                $table->unsignedBigInteger('tipo_pago')->nullable();
                $table->foreign('tipo_pago')->references('id')->on('tipo_pagos')->onDelete('cascade');
                $table->unsignedBigInteger('estat')->nullable();
                $table->foreign('estat')->references('id')->on('estat_compras')->onDelete('cascade');
                $table->timestamps();
            });
        }

        public function down(): void {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign(['estat']);
                $table->dropForeign(['cliente_id']);
            });
            Schema::dropIfExists('orders');
        }
    };