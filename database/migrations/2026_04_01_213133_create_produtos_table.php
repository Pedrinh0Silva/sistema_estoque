<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
   public function up(): void
{
    Schema::create('produtos', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->text('descricao')->nullable();
        $table->string('categoria');
        $table->integer('quantidade')->default(0);
        $table->decimal('preco', 10, 2);
        $table->string('fornecedor');
        $table->integer('estoque_minimo')->default(5); // Para o alerta de estoque baixo
        $table->timestamps();
    });
}
};
