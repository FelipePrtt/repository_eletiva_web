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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->unsignedBigInteger('codigo_barra')->unique();
            $table->decimal('valor_compra', 10 , 2);
            $table->decimal('valor_venda', 10, 2);
            $table->integer('qtde_estoque');

            $table->unsignedBigInteger('fornecedor_id')->nullable();
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors')->onDelete('restrict');
            $table->date('data_compra')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
