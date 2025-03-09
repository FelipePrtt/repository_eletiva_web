@extends('layout')

@section('conteudo')

<form method="post" action="respEx9">
    @csrf
    <h1>Exercício 9</h1>
    <div class="mb-3">
        <label for="valor" class="form-label">Informe um número:</label>
        <input type="text" id="valor" name="valor" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($resp)
<p>Os fatoriais de cada valor são, respectivamente: {{$resp}}.</p>
@endisset
@endsection