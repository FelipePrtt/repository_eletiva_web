<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $funcionarios = [
            ['id' => '1', 'nome' => 'João Silva', 'telefone' => '11987654321', 'cpf' => '123.456.789-00', 'rg' => '12.345.678-9', 'cep' => '01000-000', 'estado' => 'SP', 'cidade' => 'São Paulo', 'bairro' => 'Centro', 'endereco' => 'Rua A, 123', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'nome' => 'Maria Oliveira', 'telefone' => '21987654321', 'cpf' => '987.654.321-00', 'rg' => '98.765.432-1', 'cep' => '20000-000', 'estado' => 'RJ', 'cidade' => 'Rio de Janeiro', 'bairro' => 'Copacabana', 'endereco' => 'Avenida B, 456', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'nome' => 'Carlos Pereira', 'telefone' => '31987654321', 'cpf' => '456.789.123-00', 'rg' => '34.567.890-2', 'cep' => '30000-000', 'estado' => 'MG', 'cidade' => 'Belo Horizonte', 'bairro' => 'Savassi', 'endereco' => 'Rua C, 789', 'created_at' => now(), 'updated_at' => now()]
        ];
        
        Funcionario::insert($funcionarios);
    }
}
