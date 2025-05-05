<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemVenda extends Model
{
    protected $fillable = ['venda_id', 'produto_id', 'codigo_barra', 'quantidade', 'valor_unitario', 'subtotal'];
    
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
