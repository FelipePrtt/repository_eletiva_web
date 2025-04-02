<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable =['nome', 'telefone', 'cpf', 'rg', 'cep', 'estado', 'cidade', 'bairro', 'endereco'];
}
