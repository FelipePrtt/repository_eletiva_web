<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Exception;

class UserController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        try{
            $dados = $request->all();
            $dados['password'] = Hash::make($dados['password']);
            User::create($dados);
            return redirect('/login');
        }catch(Exception $e){
            Log::error('Erro ao criar usuário:' . $e->getMessage(), [
                'stack' => $e->getMessage(),
                'request' => $request->all()
            ]);
            return redirect('/cadastro')->with('erro', 'Erro ao cadastrar!');
        }
    }
}
