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
        Schema::create('torneos', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nombre', 65);
            $table->string('ubicacion', 65);
            $table->enum('tipo_torneo', ['INDIVIDUAL_DOBLES','INDIVIDUAL','DOBLES']);
            $table->enum('categoria', ['MASTERS_1000', 'MASTERS_500', 'MASTERS_250']);
            $table->enum('superficie', ['PISTA_DURA', 'HIERBA', 'TIERRA_BATIDA']);
            $table->integer('entradas');
            $table->string('fecha_ini');
            $table->string('fecha_fin');
            $table->decimal('premio',10,2);
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
        Schema::dropIfExists('torneos');
    }
};
