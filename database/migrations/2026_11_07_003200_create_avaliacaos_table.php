<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('Avaliacao', function (Blueprint $table) {
            $table->id('idAvaliacao');
            $table->integer('nota')->nullable();
            $table->text('comentario')->nullable();
            $table->dateTime('dataCriacao')->nullable()->useCurrent();
            $table->foreignId('Livro_idLivro')->constrained('Livro', 'idLivro');
            $table->foreignId('user_idUser')->constrained('User', 'idUser');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('Avaliacao');
    }
};
