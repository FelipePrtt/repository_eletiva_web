<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class FornecedorController extends Controller
{
    // Listar todos
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    // Formulário de criação
    public function create()
    {
        return view('fornecedores.create');
    }

    // Salvar novo
    public function store(Request $request)
    {
        try {
            Fornecedor::create($request->all());

            return redirect()->route('fornecedores.index')
                ->with('sucesso', 'Fornecedor cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao cadastrar fornecedor: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('fornecedores.index')
                ->with('erro', 'Erro ao cadastrar fornecedor!');
        }
    }

    // Exibir detalhes
    public function show(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedores.show', compact('fornecedor'));
    }

    // Formulário de edição
    public function edit(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedores.edit', compact('fornecedor'));
    }

    // Atualizar
    public function update(Request $request, string $id)
    {
        try {
            $fornecedor = Fornecedor::findOrFail($id);
            $fornecedor->update($request->all());

            return redirect()->route('fornecedores.index')
                ->with('sucesso', 'Fornecedor atualizado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao atualizar fornecedor: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'fornecedor_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('fornecedores.index')
                ->with('erro', 'Erro ao atualizar fornecedor!');
        }
    }

    // Excluir
    public function destroy(string $id)
    {
        try {
            $fornecedor = Fornecedor::findOrFail($id);
            $fornecedor->delete();

            return redirect()->route('fornecedores.index')
                ->with('sucesso', 'Fornecedor excluído com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao excluir fornecedor: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'fornecedor_id' => $id
            ]);
            return redirect()->route('fornecedores.index')
                ->with('erro', 'Erro ao excluir fornecedor!');
        }
    }
}
