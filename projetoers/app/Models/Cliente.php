<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'email', 'cpf', 'telefone', 'rg', 'estado', 'cidade', 'cep', 'bairro', 'endereco'];
}
