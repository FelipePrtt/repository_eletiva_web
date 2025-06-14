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
    public function index($id)
    {
        $vendas = Venda::where('cliente_id', $id)->get();
        return view("vendas.index", compact('vendas', 'id'));
    }

    public function create($id)
    {
        $cliente = Cliente::findOrFail($id);
        $funcionarios = Funcionario::all();
        $produtos = Produto::all();
        return view('vendas.create', compact('cliente', 'funcionarios', 'produtos'));
    }

    public function store(Request $request)
    {
        //Validação dos dados do request
        $request->validate([
            'id' => 'required|exists:clientes,id',
            'pagamento' => 'required|string',
            'valor_total_venda' => 'required|numeric|min:0',
            'itens' => 'required|array|min:1',
            'itens.*.produto_id' => 'required|exists:produtos,id',
            'itens.*.quantidade' => 'required|integer|min:1',
            'itens.*.valor_unitario' => 'required|numeric|min:0',
        ]);

        //Cria a venda que será vinculado os itens
        $venda = Venda::create([
            'cliente_id' => $request->input('id'),
            'pagamento' => $request->input('pagamento'),
            'total' => $request->input('valor_total_venda'),
        ]);
    
        // Salvar os itens da venda
        foreach ($request->input('itens') as $item) {
            $venda->itens()->create([
                'produto_id' => $item['produto_id'],
                'quantidade' => $item['quantidade'],
                'valor_unitario' => $item['valor_unitario'],
                'total' => $item['quantidade'] * $item['valor_unitario'], 
            ]);
            $produto = Produto::find($item['produto_id']);
            if ($produto) {
                $produto->qtde_estoque -= $item['quantidade'];
                $produto->save();
            }
        }

        return redirect('/clientes-vendas/' . $venda->cliente_id);
    }


    public function show(string $id)
    {
        $venda = Venda::with('cliente')->findOrFail($id);
        $cliente = $venda->cliente; 
        return view('vendas.show', compact('venda', 'cliente'));
    }
    

    public function edit(string $id)
    {
        $venda = Venda::findOrFail($id);
        $cliente = Cliente::all();
        return view('vendas.edit', compact('venda', 'cliente'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $venda = Venda::findOrFail($id);
            $venda->update($request->all());

            return redirect()->route('vendas.index')->with('sucesso', 'Venda alterada com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao alterar venda:' . $e->getMessage(), [
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
