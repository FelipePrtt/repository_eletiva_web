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
            $table->unsignedBigInteger('cliente_id')->foreign('cliente_id')->references('id')->on('clientes');
            $table->enum('pagamento', ['Á vista', 'Parcelado']);
            $table->decimal('total');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
