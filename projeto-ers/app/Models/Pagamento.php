<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venda;

class Pagamento extends Model
{
    protected $fillable = ['venda_id', 'tipo_pagamento', 'valor_total', 'status'];

    public function venda(){
        return $this->belongsTo(Venda::class);
    }
}