<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function compras(Request $request){
        $id = $request->query('id');
        $vendas = Venda::where('id_cliente', $id)->get();
        return view("vendas.index", compact('vendas'));
    }
}
