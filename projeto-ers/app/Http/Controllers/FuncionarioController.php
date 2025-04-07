<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class FuncionarioController extends Controller
{
    // Listar todos
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    // Formulário de criação
    public function create()
    {
        return view('funcionarios.create');
    }

    // Salvar novo
    public function store(Request $request)
    {
        try {
            Funcionario::create($request->all());

            return redirect()->route('funcionarios.index')
                ->with('sucesso', 'Funcionário cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao cadastrar funcionário: " . $e->getMessage());
            return redirect()->route('funcionarios.index')
                ->with('erro', 'Erro ao cadastrar funcionário!');
        }
    }

    // Exibir detalhes
    public function show(string $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.show', compact('funcionario'));
    }

    // Formulário de edição
    public function edit(string $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    // Atualizar
    public function update(Request $request, string $id)
    {
        try {
            $funcionario = Funcionario::findOrFail($id);
            $funcionario->update($request->all());

            return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionário atualizado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao atualizar funcionário: " . $e->getMessage());
            return redirect()->route('funcionarios.index')
                ->with('erro', 'Erro ao atualizar funcionário!');
        }
    }

    // Excluir
    public function destroy(string $id)
    {
        try {
            $funcionario = Funcionario::findOrFail($id);
            $funcionario->delete();

            return redirect()->route('funcionarios.index')
                ->with('sucesso', 'Funcionário excluído com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao excluir funcionário: " . $e->getMessage());
            return redirect()->route('funcionarios.index')
                ->with('erro', 'Erro ao excluir funcionário!');
        }
    }
}
