@extends('layout')

@section('conteudo')

<form method="post" action="respEx8">
    @csrf
    <h1>Exercício 8</h1>
    <div class="mb-3">
        <label for="valor" class="form-label">Informe um número:</label>
        <input type="text" id="valor" name="valor" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($resp)
<p>A contagem regressiva a partir do numero informado é: {{$resp}}.</p>
@endisset
@endsection