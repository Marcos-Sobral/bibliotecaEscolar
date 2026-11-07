<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('CurtidaAvaliacao', function (Blueprint $table) {
            $table->id('idCurtidaAvaliacao');
            $table->dateTime('dataCriacao')->nullable()->useCurrent();
            $table->foreignId('Avaliacao_idAvaliacao')->constrained('Avaliacao', 'idAvaliacao');
            $table->foreignId('user_idUser')->constrained('User', 'idUser');
            $table->unique(['Avaliacao_idAvaliacao', 'user_idUser'], 'uk_usuario_avaliacao');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('CurtidaAvaliacao');
    }
};
