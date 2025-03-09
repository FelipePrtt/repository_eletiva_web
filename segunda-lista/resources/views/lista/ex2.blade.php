@extends('layout')

@section('conteudo')

<form method="post" action="/respEx2">
    @csrf
    <h1>Exercício 2</h1>
    <div class="mb-3">
        <label for="valor1" class="form-label">Informe o 1° valor:</label>
        <input type="number" id="valor1" name="valor1" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="valor2" class="form-label">Informe o 2° valor:</label>
        <input type="number" id="valor2" name="valor2" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($resp)
<p>{{$resp}}.</p>
@endisset
@endsection
