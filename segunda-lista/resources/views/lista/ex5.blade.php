@extends('layout')

@section('conteudo')

<form method="post" action="respEx5">
    @csrf
    <h1>Exercício 5</h1>
    <div class="mb-3">
        <label for="mes" class="form-label">Informe um número de 1 a 12:</label>
        <input type="text" id="mes" name="mes" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($mes)
<p>O número corresponde ao mês de {{$mes}}.</p>
@endisset
@endsection