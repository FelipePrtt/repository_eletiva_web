<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:100',
                'telefone' => 'required|string|max:20',
                'cnpj' => 'required|string|max:18|unique:fornecedors,cnpj',
                'cep' => 'nullable|string|max:9',
                'endereco' => 'nullable|string|max:255',
                'bairro' => 'nullable|string|max:100'
            ]);

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedores.show', compact('fornecedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $fornecedor = Fornecedor::findOrFail($id);

            $request->validate([
                'nome' => 'required|string|max:100',
                'telefone' => 'required|string|max:20',
                'cnpj' => 'required|string|max:18|unique:fornecedors,cnpj,'.$fornecedor->id,
                'cep' => 'nullable|string|max:9',
                'endereco' => 'nullable|string|max:255',
                'bairro' => 'nullable|string|max:100'
            ]);

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

    /**
     * Remove the specified resource from storage.
     */
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