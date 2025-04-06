<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ClienteController extends Controller
{
    // Listar todos
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    // Formulário de criação
    public function create()
    {
        return view('clientes.create');
    }

    // Salvar novo
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:100',
                'email' => 'required|email|unique:clientes,email',
                'telefone' => 'required|string|max:20',
                'endereco' => 'nullable|string|max:200'
            ]);

            Cliente::create($request->all());

            return redirect()->route('clientes.index')
                ->with('sucesso', 'Cliente cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao cadastrar cliente: " . $e->getMessage());
            return redirect()->route('clientes.index')
                ->with('erro', 'Erro ao cadastrar cliente!');
        }
    }

    // Exibir detalhes
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    // Formulário de edição
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    // Atualizar
    public function update(Request $request, string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);

            $request->validate([
                'nome' => 'required|string|max:100',
                'email' => 'required|email|unique:clientes,email,'.$cliente->id,
                'telefone' => 'required|string|max:20',
                'endereco' => 'nullable|string|max:200'
            ]);

            $cliente->update($request->all());

            return redirect()->route('clientes.index')
                ->with('sucesso', 'Cliente atualizado com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao atualizar cliente: " . $e->getMessage());
            return redirect()->route('clientes.index')
                ->with('erro', 'Erro ao atualizar cliente!');
        }
    }

    // Excluir
    public function destroy(string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();

            return redirect()->route('clientes.index')
                ->with('sucesso', 'Cliente excluído com sucesso!');
        } catch (Exception $e) {
            Log::error("Erro ao excluir cliente: " . $e->getMessage());
            return redirect()->route('clientes.index')
                ->with('erro', 'Erro ao excluir cliente!');
        }
    }
}