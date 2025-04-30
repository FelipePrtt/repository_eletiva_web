<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
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



    public function edit(){
        return view('users.edit');
    }

    public function update(Request $request){
        try{
            $user = Auth::user();
            if (!Hash::check($request->input('confirm-password', $user->password))){
                return redirect('/editar')->with('erro', 'A senha anterior não confere!');
            }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save;
            Auth::logout();
            return redirect('/login');
        }catch(Exception $e){
            Log::error('Erro ao editar usuário:' . $e->getMessage(), [
                'stack' => $e->getMessage(),
                'request' => $request->all()
            ]);
            return redirect('/editar')->with('erro', 'Erro ao editar.');
        }
    }
}
