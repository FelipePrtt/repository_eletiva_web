<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ItensVendaController;
use App\Http\Controllers\VendaController;
use App\Http\Middleware\RoleAdmMiddleware;
use App\Http\Middleware\RoleCliMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeAdmController;

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
    return view('login');
});
//Rotas de login deve vir antes para proteger as outras rotas
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');//Devido a utilização do middleware de validação do laravel que utilizamos, precisa do name('login') que redireciona para a página que desejamos caso não consigamos validação
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function(){ //Middleware restringe o acesso as rotes que estão dentro dele, fornecendo acesso somente aos usuários logados
   
    Route::post('/logout', [AuthController::class, 'logout']);
   
    //Middleware para verificar se o usuário é do nivel ADM
    Route::middleware([RoleAdmMiddleware::class])->group(function(){
        Route::resource("produtos", ProdutoController::class); 
        Route::resource("fornecedores", FornecedorController::class);
        Route::resource("funcionarios", FuncionarioController::class);
        Route::resource("clientes", ClienteController::class);
        Route::get('/home-adm', [HomeAdmController::class, 'index']);
        Route::get('/relatoriovendas', [HomeAdmController::class, 'gerarRelatorioVendas']);
        Route::get('/relatorioclientes', [HomeAdmController::class, 'gerarRelatorioClientes']);
        Route::get("/clientes-vendas/{id}", [VendaController::class, 'index']);
        Route::get("/vendas/create/{id}", [VendaController::class, 'create']);
        Route::post("/vendas/store", [VendaController::class, 'store']);
        Route::get('/vendas/show/{id}', [VendaController::class, 'show']);
    });

    //Middleware para verificar se o usuário é do nivel CLI
    Route::middleware([RoleCliMiddleware::class])->group(function(){
        Route::get('/home-cli', function(){
            return view('home-cli');
        });
        
    }); 
});