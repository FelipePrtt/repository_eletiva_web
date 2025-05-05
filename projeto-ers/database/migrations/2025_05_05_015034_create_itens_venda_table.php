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
            $table->unsignedBigInteger('venda_id');            
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('codigo_barra');           
            $table->integer('quantidade');
            $table->decimal('valor_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
            $table->foreign('venda_id')
                  ->references('id')
                  ->on('vendas')
                  ->onDelete('cascade');
                  
            $table->foreign('produto_id')
                  ->references('id')
                  ->on('produtos');
                  
            $table->foreign('codigo_barra')
                  ->references('codigo_barra')
                  ->on('produtos');
        });
    }

    public function down(): void
    {
        //
    }
};
