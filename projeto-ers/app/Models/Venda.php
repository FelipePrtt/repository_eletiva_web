<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemVenda;

class Venda extends Model
{
    protected $fillable = ['cliente_id', 'compra_id', 'pagamento_id'];
    
    public function itens()
    {
        return $this->hasMany(ItemVenda::class);
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
