<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'preco', 'estoque', 'categoria_id'];

    /**
     *Relacionamento: 1 produto para 1 categoria
     */

    public function categori() 
    {
        return $this->belongsTo(Categoria::class);
    }
}
