<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('Autor', function (Blueprint $table) {
            $table->id('idAutor');
            $table->string('nomeAutor', 45)->nullable();
            $table->string('nacionalidadeAutor', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('Autor');
    }
};
