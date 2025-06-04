<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venda;
use App\Models\Produto;

class ItemVenda extends Model {

    protected $table = 'itens_venda';

    protected $fillable = ['venda_id', 'produto_id', 'quantidade', 'valor_unitario'];
    
    public function venda() {
        return $this->belongsTo(Venda::class); 
    }
    
    public function produto() {
        return $this->belongsTo(Produto::class);
    }
}