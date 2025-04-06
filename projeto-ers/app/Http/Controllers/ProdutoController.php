<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Fornecedor;
use Exception;
use Illuminate\Support\Facades\Log;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::with('fornecedor')->get();
        return view("produtos.index", compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view("produtos.create", compact("fornecedores"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'descricao' => 'required|string|max:255',
                'valor_compra' => 'required|numeric|min:0',
                'valor_venda' => 'required|numeric|min:0',
                'fornecedor_id' => 'nullable|exists:fornecedors,id',
                'data_compra' => 'nullable|date'
            ]);

            Produto::create($data);
            
            return redirect()->route('produtos.index')
                ->with('sucesso', 'Produto inserido com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao criar o produto: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('produtos.index')
                ->with('erro', 'Erro ao criar o produto!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::with('fornecedor')->findOrFail($id);
        return view("produtos.show", compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);
        $fornecedores = Fornecedor::all();
        return view("produtos.edit", compact('produto', 'fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            
            $data = $request->validate([
                'descricao' => 'required|string|max:255',
                'valor_compra' => 'required|numeric|min:0',
                'valor_venda' => 'required|numeric|min:0',
                'fornecedor_id' => 'nullable|exists:fornecedors,id',
                'data_compra' => 'nullable|date'
            ]);

            $produto->update($data);
            
            return redirect()->route('produtos.index')
                ->with('sucesso', 'Produto alterado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao editar o produto: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'produto_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('produtos.index')
                ->with('erro', 'Erro ao editar o produto!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            $produto->delete();
            
            return redirect()->route('produtos.index')
                ->with('sucesso', 'Produto excluído com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao excluir o produto: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'produto_id' => $id
            ]);
            return redirect()->route('produtos.index')
                ->with('erro', 'Erro ao excluir o produto!');
        }
    }
}