<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        // Relaciona o contato com o usuário (dono da agenda)
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        $table->string('name');
        $table->string('email')->nullable();
        $table->string('phone');
        $table->string('type')->default('Pessoal'); // Pessoal, Trabalho, etc.
        $table->text('notes')->nullable();
        $table->string('photo')->nullable(); // Guardaremos o caminho da imagem
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
