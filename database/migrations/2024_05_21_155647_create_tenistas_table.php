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
        Schema::create('tenistas', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('ranking')->nullable();
            $table->integer('bestRanking')->nullable();
            $table->string('nombre_completo', 100);
            $table->string('pais', 65);
            $table->string('fecha_nacimiento');
            $table->integer('edad')->nullable();
            $table->decimal('altura', 10,2)->default(0);
            $table->decimal('peso',10,2)->default(0);
            $table->string('profesional_desde');
            $table->enum('mano_pref', ['DIESTRO', 'ZURDO']);
            $table->enum('reves', ['UNA', 'DOS']);
            $table->string('entrenador', 100);
            $table->decimal('price_money',10,2)->default(0);
            $table->integer('win');
            $table->integer('lost');
            $table->string('win_rate')->nullable();
            $table->integer('puntos');
            $table->string('imagen')->default('https://via.placeholder.com/150');
            $table->boolean('isDeleted')->default('false');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenistas');
    }
};
