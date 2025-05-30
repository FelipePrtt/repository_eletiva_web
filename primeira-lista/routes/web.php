<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ExerciciosController;

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

Route::get('/exer1', [ExerciciosController::class, 'abrirFormExer1']);

Route::post('/exer1resp', [ExerciciosController::class, 'respExer1']);

//Rotas da lista de exercício
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

Route::get('/ex7', function(){
    return view('lista.ex7');
});

Route::post('listaex7', function(Request $request){
    $raio = floatval($request->input('raio'));
    $perimetro = 2 * 3.14 * $raio;
    return view('lista.ex7', compact('perimetro'));
});

Route::get('/ex8', function(){
    return view('lista.ex8');
});

Route::post('listaex8', function(Request $request){
    $base = floatval($request->input('base'));
    $expoente = floatval($request->input('expoente'));
    $resultado = pow($base, $expoente);
    return view('lista.ex8', compact('resultado'));
});

Route::get('/ex9', function(){
    return view('lista.ex9');
});

Route::post('listaex9', function(Request $request){
    $metros = floatval($request->input('metros'));
    $centimetros = $metros * 100;
    return view('lista.ex9', compact('centimetros'));
});

Route::get('/ex10', function(){
    return view('lista.ex10');
});

Route::post('listaex10', function(Request $request){
    $km = floatval($request->input('km'));
    $milhas = $km * 0.621371;
    return view('lista.ex10', compact('milhas'));
});

Route::get('ex11', function(){
    return view('lista.ex11');
});

Route::post('listaex11', function(Request $request){
    $peso = floatval($request->input('peso'));
    $altura = floatval($request->input('altura')); 
    $imc = $peso / ($altura ** 2);
    return view('lista.ex11', compact('imc'));
});

Route::get('ex12', function(){
    return view('lista.ex12');
});

Route::post('listaex12', function(Request $request){
    $preco = floatval($request->input('preco'));
    $desconto = floatval($request->input('desconto'));
    $preco_final = $preco - ($preco * ($desconto / 100) );
    return view('lista.ex12', compact('preco_final'));
});

Route::get('ex13', function(){
    return view('lista.ex13');
});

Route::post('listaex13', function(Request $request){
    $capital_js = floatval($request->input('capital'));
    $juros = floatval($request->input('juros'));
    $periodo_js = floatval($request->input('periodo'));
    $juros_simples = $capital_js * ($juros / 100) * $periodo_js;
    return view('lista.ex13', compact('juros_simples'));
});

Route::get('ex14', function(){
    return view('lista.ex14');
});

Route::post('listaex14', function(Request $request){
    $capital_jc = floatval($request->input('capital'));
    $juros = floatval($request->input('juros'));
    $periodo_jc = floatval($request->input('periodo'));
    $montante = number_format(($capital_jc * (1 + $juros/100) ** $periodo_jc), 2, ',', '.');  
    return view('lista.ex14', compact('montante'));
});

Route::get('ex15', function(){
    return view('lista.ex15');
});

Route::post('listaex15', function(Request $request){
    $qtd_dias = floatval($request->input('dias'));
    $totalHoras = $qtd_dias * 24; 
    $horas = floor($totalHoras); 
    $minutos = floor(($totalHoras - $horas) * 60); 
    $segundos = floor((($totalHoras - $horas) * 60 - $minutos) * 60); 
    return view('lista.ex15', compact('qtd_dias', 'horas', 'minutos', 'segundos'));
});