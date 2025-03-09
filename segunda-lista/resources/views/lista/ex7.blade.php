@extends('layout')

@section('conteudo')

<form method="post" action="respEx7">
    @csrf
    <h1>Exercício 7</h1>
    <div class="mb-3">
        <label for="valor" class="form-label">Informe um número:</label>
        <input type="text" id="valor" name="valor" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($resp)
<p>A soma de todos os valores é {{$resp}}.</p>
@endisset
@endsection