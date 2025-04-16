@extends('layout')
@section('principal')

    <h1>Bem vindo Administrador! {{Auth::user()->name}}</h1>

@endsection