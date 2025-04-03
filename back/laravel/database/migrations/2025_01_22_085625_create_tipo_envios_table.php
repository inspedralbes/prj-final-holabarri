<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void {
            Schema::create('tipo_envios', function (Blueprint $table) {
                $table->id();
                $table->string('nombre', 100);
                $table->text('descripcion')->nullable();
                $table->timestamps();
            });
        }

        public function down(): void {
            Schema::dropIfExists('tipo_envios');
        }
    };