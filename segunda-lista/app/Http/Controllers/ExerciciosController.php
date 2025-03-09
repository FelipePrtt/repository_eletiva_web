<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Switch_;

class ExerciciosController extends Controller //Extends representa herança
{
    //Exercício 1
    public function abrirFormEx1()
    {
        return view('/lista/ex1');
    }
    public function respEx1(Request $request)
    {
        $valor1 = intval($request->input('valor1'));
        $valor2 = intval($request->input('valor2'));

        if ($valor1 == $valor2) {
            $resultado = ($valor1 + $valor2) * 3;
        } else {
            $resultado = $valor1 + $valor2;
        }
        return view('/lista/ex1', compact('resultado'));
    }

    //Exercício 2
    public function abrirFormEx2()
    {
        return view('/lista/ex2');
    }
    public function respEx2(Request $request)
    {
        $valor1 = intval($request->input('valor1'));
        $valor2 = intval($request->input('valor2'));

        $valores = [$valor1, $valor2];
        sort($valores);

        if ($valor1 == $valor2) {
            $resp = "Os valores são iguais: {$valor1}";
            return view('/lista/ex2', compact('resp'));
        } else {
            $resp = implode(', ', $valores);
            return view('/lista/ex2', compact('resp'));
        }
    }

    //Exercício3
    public function abrirFormEx3()
    {
        return view('/lista/ex3');
    }
    public function respEx3(Request $request)
    {
        $preco = intval($request->input('valor_produto'));
        if ($preco > 100) {
            $preco_final = $preco + ($preco * 15 / 100);
        } else {
            $preco_final = $preco;
        }
        return view('/lista/ex3', compact('preco_final'));
    }

    //Exercício 4
    public function abrirFormEx4()
    {
        return view('/lista/ex4');
    }
    public function respEx4(Request $request)
    {
        $numero = intval($request->input('numero'));
        $primos = [];

        for ($i = 2; $i <= $numero; $i++) {
            $eprimo = true;

            for ($j = 2; $j <= sqrt($i); $j++) {
                if ($i % $j == 0) {
                    $eprimo = false;
                    break;
                }
            }

            if ($eprimo) {
                $primos[] = $i;
            }
        }
        $resp = implode(', ', $primos);
        return view('/lista/ex4', compact('resp'));
    }

    //Exercício 5
    public function abrirFormEx5()
    {
        return view('/lista/ex5');
    }
    public function respEx5(Request $request)
    {
        $num = intval($request->input('mes'));
        switch ($num) {
            case 1:
                $mes = 'Janeiro';
                break;
            case 2:
                $mes = 'Fevereiro';
                break;
            case 3:
                $mes = 'Março';
                break;
            case 4:
                $mes = 'Abril';
                break;
            case 5:
                $mes = 'Maio';
                break;
            case 6:
                $mes = 'Junho';
                break;
            case 7:
                $mes = 'Julho';
                break;
            case 8:
                $mes = 'Agosto';
                break;
            case 9:
                $mes = 'Setembro';
                break;
            case 10:
                $mes = 'Outubro';
                break;
            case 11:
                $mes = 'Novembro';
                break;
            case 12:
                $mes = 'Dezembro';
                break;
        }
        return view('/lista/ex5', compact('mes'));
    }

    //Exercício 6
    public function abrirFormEx6()
    {
        return view('/lista/ex6');
    }
    public function respEx6(Request $request)
    {
        $numero = intval($request->input('valor'));
        $resp = [];

        for ($i = 1; $i <= $numero; $i++) {
            $resp[] = $i;
        }
        $resp = implode(', ', $resp);
        return view('/lista/ex6', compact('resp'));
    }

    //Exercício 7
    public function abrirFormEx7()
    {
        return view('/lista/ex7');
    }
    public function respEx7(Request $request)
    {
        $numero = intval($request->input('valor'));
        $resp = 0;

        $cont = 1;
        while ($cont <= $numero) {
            $resp += $cont;
            $cont += 1;
        }
        return view('/lista/ex7', compact('resp'));
    }

    //Exercicio 8
    public function abrirFormEx8()
    {
        return view('/lista/ex8');
    }
    public function respEx8(Request $request)
    {
        $numero = intval($request->input('valor'));
        $resp = [];

        $cont = 1;
        do {
            $resp[] = $cont;
            $cont += 1;
        } while ($cont <= $numero);
        rsort($resp);
        $resp = implode(', ', $resp);
        return view('/lista/ex8', compact('resp'));
    }

    //Exercício 9
    public function abrirFormEx9()
    {
        return view('/lista/ex9');
    }
    public function respEx9(Request $request)
    {
        $numero = intval($request->input('valor'));
        $resp = [];
        $fat = 1;
        for ($i = 1; $i <= $numero; $i++) {
            $fat *= $i;
            $resp[] = $fat;
        }
        $resp = implode(', ', $resp);
        return view('/lista/ex9', compact('resp'));
    }

    //Exercício 10
    public function abrirFormEx10()
    {
        return view('/lista/ex10');
    }
    public function respEx10(Request $request)
    {
        $valor = $request->input('valor');
        $tabuada = [];
        for ($i = 1; $i <= 10; $i++) {
            $tabuada[$i] = $valor * $i;
        }
        return view('/lista/ex10', compact('tabuada', 'valor'));
    }
}
