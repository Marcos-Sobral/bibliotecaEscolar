<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('Emprestimo', function (Blueprint $table) {
            $table->id('idEmprestimo');
            $table->dateTime('dataEmprestimo')->nullable()->useCurrent();
            $table->date('dataPrevistaDevolucao');
            $table->dateTime('dataDevolucaoEfetiva')->nullable();
            $table->enum('statusEmprestimo', ['Ativo', 'Devolvido', 'Atrasado', 'Renovado'])->nullable();
            $table->integer('quantidadeRenovacoes')->nullable();
            $table->foreignId('user_idUser')->constrained('User', 'idUser');
            $table->foreignId('Exemplar_idExemplar')->constrained('Exemplar', 'idExemplar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Emprestimo');
    }
};
