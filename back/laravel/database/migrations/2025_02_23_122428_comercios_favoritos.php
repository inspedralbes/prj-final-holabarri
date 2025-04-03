<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up() {
            Schema::create('comercios_favoritos', function (Blueprint $table) {
                $table->id();
                $table->foreignId('cliente_id')->constrained('cliente')->onDelete('cascade');
                $table->foreignId('comercio_id')->constrained('comercios')->onDelete('cascade');
                $table->timestamps();
            });
        }

        public function down() {
            Schema::dropIfExists('comercios_favoritos');
        }
    };