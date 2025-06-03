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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('venda_id')->foreing('venda_id')->references('id')->on('vendas')->onDelete('cascade');
            $table->enum('tipo_pagamento', ['Dinheiro', 'Cartão', 'Pix']);
            $table->decimal('valor_total', 10, 2);
            $table->enum('status', ['Pendente', 'Pago'])->default('Pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
