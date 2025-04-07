<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Fornecedor;
use Exception;
use Illuminate\Support\Facades\Log;

class ProdutoController extends Controller
{
    // Listar todos os produtos
    public function index()
    {
        $produtos = Produto::with('fornecedor')->get();
        return view("produtos.index", compact('produtos'));
    }

    // Formulário de criação
    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view("produtos.create", compact("fornecedores"));
    }

    // Salvar novo produto
    public function store(Request $request)
    {
        try {
           Produto::create($request->all());
            
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

    // Exibir detalhes do produto
    public function show(string $id)
    {
        $produto = Produto::with('fornecedor')->findOrFail($id);
        return view("produtos.show", compact('produto'));
    }

    // Formulário de edição
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);
        $fornecedores = Fornecedor::all();
        return view("produtos.edit", compact('produto', 'fornecedores'));
    }

    // Atualizar produto
    public function update(Request $request, string $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            $produto->update($request->all());
            
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

    // Excluir produto
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
