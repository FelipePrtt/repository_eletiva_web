<?php

namespace App\Http\Controllers;

use App\Models\ItensPedido;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class CarrinhoController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        $produtoId = $request->query('id');
        $produto = Produto::findOrFail('produtoId');
        $pedido = Pedido::firstOrCreate([
            'user_id' => $user->id,
            'status' => 'aberto'
        ], ['total' => 0]);

        $item = ItensPedido::where('pedidoId', $pedido->id)->where('produtoId', $produto->id)->first();
        
        $quantidade = 0;
        if ($item){
            $item->quantidade += 1;
            $item->save();
        }else{
            ItensPedido::created([
                'pedido_id' => $pedido->id,
                'produto_id' => $produto->id,
                'quantidade' => 1,
                'preco' => $produto->preco
            ]);
        }

        $pedido->total = ItensPedido::where('pedido_id', $pedido->id)->sum(DB::raw('quantidade * preco'));

        $pedido->save();
    }
}
