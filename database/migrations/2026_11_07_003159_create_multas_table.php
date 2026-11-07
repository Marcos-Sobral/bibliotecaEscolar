<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('Multa', function (Blueprint $table) {
            $table->id('idMulta');
            $table->decimal('valor', 10, 2)->nullable();
            $table->enum('statusPagamento', ['Pendente', 'Pago', 'Perdoado'])->nullable();
            $table->dateTime('dataGeracao')->nullable()->useCurrent();
            $table->foreignId('Emprestimo_idEmprestimo')->constrained('Emprestimo', 'idEmprestimo');
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('Multa');
    }
};
