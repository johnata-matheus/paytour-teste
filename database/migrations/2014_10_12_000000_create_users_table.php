<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->binary('arquivo');
            $table->string('telefone');
            $table->text('cargo_desejado');
            $table->string('escolaridade');
            $table->text('observacoes')->nullable();
            $table->dateTime('data_envio');
            $table->timestamp("created_at");
            $table->timestamp("updated_at");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
