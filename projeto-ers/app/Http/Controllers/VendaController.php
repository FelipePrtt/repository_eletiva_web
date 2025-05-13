<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Produto;
use App\Models\ItemVenda;
use Exception;
use Illuminate\Support\Facades\Log;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::all();
        return view("vendas.index", compact('vendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();
        $produtos = Produto::all();
        return view('vendas.create', compact('clientes', 'funcionarios', 'produtos'));
    }

    public function store(Request $request)
    {
        $venda = Venda::create([
            'id_cliente' => $request->cliente_id,
            'id_funcionario' => $request->funcionario_id,
            'tipo_pagamento' => $request->tipo_pagamento,
            'valor_total' => 0
        ]);

        $total = 0;
        foreach ($request->produtos as $produtoId => $dados) {
            $produto = Produto::find($produtoId);
            $subtotal = $produto->valor_venda * $dados['quantidade'];

            ItemVenda::create([
                'venda_id' => $venda->id,
                'produto_id' => $produtoId,
                'codigo_barra' => $produto->codigo_barra,
                'quantidade' => $dados['quantidade'],
                'valor_unitario' => $produto->valor_venda,
                'subtotal' => $subtotal
            ]);

            $total += $subtotal;
            $produto->decrement('qtde_estoque', $dados['quantidade']);
        }

        $venda->update(['valor_total' => $total]);

        return redirect()->route('vendas.show', $venda->id);
    }

    public function show(string $id)
    {
        $venda = Venda::with('cliente')->findOrFail($id);
        return view('vendas.show', compact('produto'));
    }

    public function edit(string $id)
    {
        $venda = Venda::findOrFail($id);
        $cliente = Cliente::all();
        return view('vendas.edit', compact('produto', 'cliente'));
    }

    public function update(Request $request, string $id)
    {
        try{
            $venda = Venda::findOrFail($id);
            $venda->update($request->all());

            return redirect()->route('vendas.index')->with('sucesso', 'Venda alterada com sucesso!');
        } catch (Exception $e){
            Log::error('Erro ao alterar venda:'. $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'venda_id' => $id,
                'request' => $request->all()
            ]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $venda = Venda::findOrFail($id);
            $venda->delete();

            return redirect()->route('vendas.index')->with('sucesso', 'Venda excluída com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao excluir a compra: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'venda_id' => $id
            ]);
            return redirect()->route('vendas.index')->with('erro', 'Erro ao excluir venda!');
        }
    }
}
