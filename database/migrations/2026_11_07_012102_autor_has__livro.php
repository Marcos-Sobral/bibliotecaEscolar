<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void {
        Schema::create('Autor_has_Livro', function (Blueprint $table) {
            $table->foreignId('Autor_idAutor')->constrained('Autor', 'idAutor');
            $table->foreignId('Livro_idLivro')->constrained('Livro', 'idLivro');
            $table->primary(['Autor_idAutor', 'Livro_idLivro']);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('Autor_has_Livro');
    }
};
