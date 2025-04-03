<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void {
            Schema::create('ciudades', function (Blueprint $table) {
                $table->id();
                $table->integer("parent_code");
                $table->integer("code");
                $table->string("label");
                $table->timestamps();
            });
        }

        public function down(): void {
            Schema::dropIfExists('ciudades');
        }
    };
