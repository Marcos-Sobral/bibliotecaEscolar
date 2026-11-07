<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('Livro', function (Blueprint $table) {
            $table->id('idLivro');
            $table->string('titulo', 45)->nullable();
            $table->string('isbn', 45)->unique()->nullable();
            $table->date('anoPublicacao')->nullable();
            $table->string('editora', 45)->nullable();
            $table->text('descricao')->nullable();
            $table->string('capaUrl', 255)->nullable();
            $table->string('linkEbook', 255)->nullable();
            $table->foreignId('Genero_idGenero')->constrained('Genero', 'idGenero');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('Livro');
    }
};
