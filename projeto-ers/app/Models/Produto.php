<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable =['descricao', 'valor_compra', 'valor_venda', 'fornecedor_id', 'data_compra'];
}
