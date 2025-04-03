<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void {
            Schema::create('estat_compras', function (Blueprint $table) {
                $table->id();
                $table->string("nombre");
                $table->string("color");
            });
        }

        public function down(): void {
            Schema::dropIfExists('estat_compras');
        }
    };