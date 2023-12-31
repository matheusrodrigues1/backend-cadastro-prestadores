<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestadores', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('nome');
            $table->string('telefone');
            $table->string('email', 191)->unique();
            $table->string('foto')->nullable();
            $table->string('nome_servico');
            $table->text('descricao');
            $table->string('valor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestadores');
    }
};
