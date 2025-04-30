<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fornecedor::create([
            'id'=> 1,
            'nome'=> 'Fornecedor 1',
            'telefone'=> '189333444',
            'cnpj'=> 1234567890,
            'cep'=> 21012190,
            'endereco'=> 'Rua das Palmeiras',
            'bairro'=> 'Centro'
        ]);
    }
}
