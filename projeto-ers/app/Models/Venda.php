<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemVenda;

class Venda extends Model
{
    protected $fillable = ['id_funcionario', 'id_cliente', 'tipo_pagamento', 'valor_total'];
    
    public function itens()
    {
        return $this->hasMany(ItemVenda::class);
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
