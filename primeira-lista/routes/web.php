<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bem-vindo', function () {
    return "Seja bem vindo!";
});

Route::get('/exer1', function(){
    return view('exer1');
});

Route::post('/exer1resp', function(Request $request){
    $valor1 = intval($request->input('valor1'));
    $valor2 = intval($request->input('valor2'));
    $soma = $valor1 + $valor2;
    return view('exer1', compact('soma'));
});


Route::get('/ex1' ,function(){
    return view('lista.ex1');
});

Route::post('/listaex1', function(Request $request){
    $nota1 = floatval($request->input('nota1'));
    $nota2 = floatval($request->input('nota2'));
    $nota3 = floatval($request->input('nota3'));
    $media = floatval($nota1 + $nota2 + $nota3) / 3;
    return view('lista.ex1', compact('media'));
});

Route::get('/ex2', function(){
    return view('lista.ex2');
});

Route::post('/listaex2', function(Request $request){
    $Celsius = floatval($request->input('Celsius'));
    $fah = ($Celsius * 1.8) + 32    ;
    return view('lista.ex2', compact('fah'));
});

Route::get('/ex3', function(){
    return view('lista.ex3');
});

Route::post('/listaex3', function(Request $request){
    $fah = floatval($request->input('fah'));
    $Celsius = ($fah - 32) * (5/9);
    return view('lista.ex3', compact('Celsius'));
});

Route::get('/ex4', function(){
    return view('lista.ex4');
});

Route::post('listaex4', function(Request $request){
    $largura = floatval($request->input('larg'));
    $altura = floatval($request->input('alt'));

    $area = ($largura * $altura);
    return view('lista.ex4', compact('area'));
});

Route::get('/ex5', function(){
    return view('lista.ex5');
});

Route::post('listaex5', function(Request $request){
    $raio = floatval($request->input('raio'));
    $areacir = 3.14 * ($raio ** 2);
    return view('lista.ex5', compact('areacir'));
});

Route::get('/ex6', function(){
    return view('lista.ex6');
});

Route::post('listaex6', function(Request $request){
    $largura = floatval($request->input('larg'));
    $altura = floatval($request->input('alt'));
    $perimetro = ($largura * 2) + ($altura * 2);
    return view('lista.ex6', compact('perimetro'));
});

