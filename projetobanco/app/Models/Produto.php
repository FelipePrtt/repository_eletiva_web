<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco', 'estoque', 'categoria_id', 'foto'];

    public function categoria() 
    {
        return $this->belongsTo(Categoria::class);
    }

}
