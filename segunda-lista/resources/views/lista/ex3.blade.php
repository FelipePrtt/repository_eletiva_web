@extends('layout')

@section('conteudo')


<form method="post" action="respEx3">
    @csrf
    <h1>Exercício 3</h1>
    <div class="mb-3">
        <label for="valor_produto" class="form-label">Informe o valor do produto:</label>
        <input type="number" id="valor_produto" name="valor_produto" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($preco_final)
<p>O valor final do propduto é R${{$preco_final}}.</p>
@endisset
@endsection