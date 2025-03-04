@extends('layout')

@section('conteudo')

<form method="post" action="listaex12">
    @csrf
    <div class="mb-3">
        <label for="preco" class="form-label">Informe o preço:</label>
        <input type="number" id="preco" name="preco" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="desconto" class="form-label">Informe o percentual de desconto:</label>
        <input type="number" id="desconto" name="desconto" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


@isset($montante)
<p>O valor final do produto é {{$montante}}.</p>
@endisset
@endsection