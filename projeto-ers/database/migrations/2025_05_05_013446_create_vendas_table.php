<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->enum('tipo_pagamento', ['Dinheiro', 'Cartão'])->default('Dinheiro');
            
            //Ideal seria uma classe separa para as parcelas, porém foram mantidas aqui somente para testes
            $table->integer('qtde_parcelas');
            $table->decimal('valor_parcela');
            
            $table->decimal('valor_total', 10, 2);
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    public function down(): void
    {
        //
    }
};
