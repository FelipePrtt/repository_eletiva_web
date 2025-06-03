<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itens_venda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venda_id')->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade');;            
            $table->unsignedBigInteger('produto_id')->foreign('produto_id')->references('id')->on('produtos');          
            $table->integer('quantidade');
            $table->decimal('valor_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();                                      
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itens_venda');
    }
};
