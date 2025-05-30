<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Middleware\RoleAdmMiddleware;
use App\Http\Middleware\RoleCliMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/cadastro', [UserController::class, 'create']);
Route::post('/cadastro', [UserController::class, 'store']);

Route::get("/login", [AuthController::class, 'showFormLogin'])->name('login');
Route::post("/login", [AuthController::class, 'login']);

Route::middleware("auth")->group(function (){
    Route::post("/logout", [AuthController::class, "logout"]);

    Route::middleware([RoleAdmMiddleware::class])->group(function (){ 
        Route::resource("produtos", ProdutoController::class);
        Route::get('/home-adm', function() {
            return view("home-adm");
        });
    });

    Route::middleware([RoleCliMiddleware::class])->group(function (){ 
        Route::get('/home-cli', function() {
            return view("home-cli");
        });

        Route::get('carrinho/add/{id}', [CarrinhoController::class, 'add']);
    });
    
});

