<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable =['nome', 'descricao', 'codigo_barra', 'valor_compra', 'valor_venda', 'qtde_estoque','fornecedor_id', 'data_compra'];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
