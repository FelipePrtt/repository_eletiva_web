<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class HomeAdmController extends Controller
{
    public function index(){
        $produtos = Produto::select('nome', 'qtde_estoque')->get();
        return view("home-adm", compact('produtos'));
    }


    public function gerarRelatorioVendas(){
        $vendas = Venda::with(['cliente', 'itens.produto'])->get();
        $totalPeriodo = $vendas->sum('total');
    
        $pdf = Pdf::loadView('relatoriovendas', compact('vendas', 'totalPeriodo'));
    
        return $pdf->download('relatorio_vendas.pdf');
    }

    public function gerarRelatorioClientes(){
        $clientes = Cliente::with('vendas')->get();
    
        $clientes->each(function ($c) {
            
            $c->total_compras = $c->vendas->sum('total');          
            $c->ultima_compra = $c->vendas->max('created_at');     
        });
        
    
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
            'relatorioclientes',
            ['dados' => $clientes]           
        );
    
        return $pdf->download('relatorioclientes.pdf');
    }
}