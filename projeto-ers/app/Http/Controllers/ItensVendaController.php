<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemVenda;
use App\Models\Produto;
use App\Models\Venda;

class ItensVendaController extends Controller
{
    public function index()
    {
        $itens = ItemVenda::with('cliente')->get();
        return view('itensvenda', compact('itens'));
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('itensvenda.create', compact('produtos'));
    }

    public function show(string $id)
    {
        $itens = ItemVenda::with('venda')->findOrFail($id);
        return view('itensvenda.show', compact('itens'));
    }

    public function edit(string $id)
    {
        $protudos = Produto::findOrFail($id);
        $venda = Venda::findOrFail($id);
        return view('itensvenda.edit', compact('produtos', 'venda'));
    }
}
