<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up() {
            Schema::create('favoritos', function (Blueprint $table) {
                $table->id();
                $table->foreignId('cliente_id')->constrained('cliente')->onDelete('cascade');
                $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
                $table->timestamps();
                $table->unique(['cliente_id', 'producto_id']);
            });
        }

        public function down() {
            Schema::dropIfExists('favoritos');
        }
    };
