<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void {
        Schema::create('Exemplar', function (Blueprint $table) {
            $table->id('idExemplar');
            $table->string('codigoBarras', 45)->nullable();
            $table->enum('statusCirculacao', ['Disponível', 'Emprestado'])->nullable();
            $table->enum('estadoFisico', ['Bom', 'Danificado', 'Extraviado / Perdido'])->nullable();
            $table->enum('tipoAquisicao', ['Compra', 'Doação'])->nullable();
            $table->dateTime('dataAquisicao')->nullable();
            $table->foreignId('Livro_idLivro')->constrained('Livro', 'idLivro');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('Exemplar');
    }
};
