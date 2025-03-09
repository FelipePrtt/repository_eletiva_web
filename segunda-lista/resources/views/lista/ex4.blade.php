@extends('layout')

@section('conteudo')


<form method="post" action="respEx4">
    @csrf
    <h1>Exercício 4</h1>
    <div class="mb-3">
        <label for="numero" class="form-label">Informe um valor:</label>
        <input type="number" id="numero" name="numero" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($resp)
<p>Os números primos existentes antes do valor informado são: {{$resp}}.</p>
@endisset
@endsection