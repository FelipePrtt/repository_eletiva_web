<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class WelcomeController extends Controller
{
    public function index(){
        $produto = Produto::all();
        return view('welcome', compact('produto'));
    }
}
