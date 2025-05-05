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
            $table->unsignedBigInteger('id_funcionario');
            $table->unsignedBigInteger('id_cliente');
            $table->integer('tipo_pagamento');
            $table->decimal('valor_total', 10, 2);
            $table->timestamps();
            
            $table->foreign('id_funcionario')->references('id')->on('funcionarios');
            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    public function down(): void
    {
        //
    }
};
