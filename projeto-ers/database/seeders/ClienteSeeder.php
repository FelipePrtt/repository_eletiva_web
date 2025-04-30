<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            ['id' => '1', 'nome' => 'Ana Costa', 'email' => 'ana.costa@example.com', 'cpf' => '123.456.789-00', 'telefone' => '11987654321', 'rg' => '12.345.678-9', 'estado' => 'SP', 'cidade' => 'São Paulo', 'cep' => '01000-000', 'bairro' => 'Centro', 'endereco' => 'Rua A, 123', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'nome' => 'Bruno Almeida', 'email' => 'bruno.almeida@example.com', 'cpf' => '987.654.321-00', 'telefone' => '21987654321', 'rg' => '98.765.432-1', 'estado' => 'RJ', 'cidade' => 'Rio de Janeiro', 'cep' => '20000-000', 'bairro' => 'Copacabana', 'endereco' => 'Avenida B, 456', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'nome' => 'Carlos Pereira', 'email' => 'carlos.pereira@example.com', 'cpf' => '456.789.123-00', 'telefone' => '31987654321', 'rg' => '34.567.890-2', 'estado' => 'MG', 'cidade' => 'Belo Horizonte', 'cep' => '30000-000', 'bairro' => 'Savassi', 'endereco' => 'Rua C, 789', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'nome' => 'Daniela Santos', 'email' => 'daniela.santos@example.com', 'cpf' => '321.654.987-00', 'telefone' => '41987654321', 'rg' => '21.345.678-9', 'estado' => 'PR', 'cidade' => 'Curitiba', 'cep' => '80000-000', 'bairro' => 'Centro', 'endereco' => 'Rua D, 101', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '5', 'nome' => 'Eduardo Lima', 'email' => 'eduardo.lima@example.com', 'cpf' => '654.321.987-00', 'telefone' => '51987654321', 'rg' => '43.210.987-6', 'estado' => 'RS', 'cidade' => 'Porto Alegre', 'cep' => '90000-000', 'bairro' => 'Moinhos de Vento', 'endereco' => 'Avenida E, 202', 'created_at' => now(), 'updated_at' => now()]
        ];

        Cliente::insert($clientes);
    }
}
