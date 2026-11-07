<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('User', function (Blueprint $table) {
            $table->id('idUser');
            $table->string('nomeUsuario', 16)->nullable();
            $table->string('apelido', 45)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('senha', 255)->nullable();
            $table->timestamp('create_time')->nullable()->useCurrent();
            $table->string('matricula', 45)->nullable();
            $table->enum('Status', ['Ativo', 'Inativo', 'Suspenso'])->nullable();
            $table->date('dataNascimento')->nullable();
            $table->string('FotoUser', 255)->nullable();
            $table->foreignId('perfil_idperfil')->constrained('perfil', 'idperfil');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('User');
    }
};
