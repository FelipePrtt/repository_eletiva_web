<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Responsável pelo suporte na autenticação, facade é uma "interface"/padrão de projeto com funções predefinidas

class AuthController extends Controller
{
    public function showFormLogin(){
        return view('login');
    }

    public function login(Request $request){
        $credenciais = $request->only('email', 'password');//Quando usa o only, os dados recebidos do request se tornam um array que serão armazenados na variavel

        //Busca pelos dados no banco
        if (Auth::attempt($credenciais)){
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'ADM')
                return redirect()->intended('/home-adm');
            else
                return redirect()->intended('/home-cli');
        }

        //Se os dados não estiverem no banco volta pra página de login com erro
        return back()->withErrors([
            'login' => 'Credenciais inválidas!'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
