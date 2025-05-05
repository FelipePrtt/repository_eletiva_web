<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            ['id' => '1', 'descricao' => 'Placa de Vídeo', 'codigo_barra' => 7891234567890, 'valor_compra' => 1500.00, 'valor_venda' => 2000.00, 'qtde_estoque' => 10, 'fornecedor_id' => '1', 'data_compra' => '2023-10-01', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'descricao' => 'Processador', 'codigo_barra' => 7891234567891, 'valor_compra' => 1200.00, 'valor_venda' => 1600.00, 'qtde_estoque' => 5, 'fornecedor_id' => '1', 'data_compra' => '2023-10-02', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'descricao' => 'Memória RAM', 'codigo_barra' => 7891234567892, 'valor_compra' => 400.00, 'valor_venda' => 600.00, 'qtde_estoque' => 20, 'fornecedor_id' => '1', 'data_compra' => '2023-10-03', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'descricao' => 'SSD', 'codigo_barra' => 7891234567893, 'valor_compra' => 700.00, 'valor_venda' => 900.00, 'qtde_estoque' => 15, 'fornecedor_id' => '1', 'data_compra' => '2023-10-04', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '5', 'descricao' => 'Fonte de Alimentação', 'codigo_barra' => 7891234567894, 'valor_compra' => 500.00, 'valor_venda' => 700.00, 'qtde_estoque' => 8, 'fornecedor_id' => '1', 'data_compra' => '2023-10-05', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '6', 'descricao' => 'Gabinete', 'codigo_barra' => 7891234567895, 'valor_compra' => 300.00, 'valor_venda' => 450.00, 'qtde_estoque' => 12, 'fornecedor_id' => '1', 'data_compra' => '2023-10-06', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '7', 'descricao' => 'Monitor', 'codigo_barra' => 7891234567896, 'valor_compra' => 800.00, 'valor_venda' => 1000.00, 'qtde_estoque' => 7, 'fornecedor_id' => '1', 'data_compra' => '2023-10-07', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '8', 'descricao' => 'Teclado', 'codigo_barra' => 7891234567897, 'valor_compra' => 400.00, 'valor_venda' => 550.00, 'qtde_estoque' => 10, 'fornecedor_id' => '1', 'data_compra' => '2023-10-08', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '9', 'descricao' => 'Mouse', 'codigo_barra' => 7891234567898, 'valor_compra' => 250.00, 'valor_venda' => 350.00, 'qtde_estoque' => 15, 'fornecedor_id' => '1', 'data_compra' => '2023-10-09', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '10', 'descricao' => 'Webcam', 'codigo_barra' => 7891234567899, 'valor_compra' => 300.00, 'valor_venda' => 400.00, 'qtde_estoque' => 5, 'fornecedor_id' => '1', 'data_compra' => '2023-10-10', 'created_at' => now(), 'updated_at' => now()]
        ];

        Produto::insert($produtos);
    }
}
