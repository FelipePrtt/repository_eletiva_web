<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'nome', 'cpf', 'rg', 'telefone',
        'cep', 'estado', 'cidade', 'bairro', 'endereco'
    ];
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
