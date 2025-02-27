@extends('layout')

@section('conteudo')

<form method="post" action="listaex11">
    @csrf
    <div class="mb-3">
        <label for="peso" class="form-label">Informe o peso:</label>
        <input type="number" id="peso" name="peso" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="altura" class="form-label">Informe a altura:</label>
        <input type="text" id="altura" name="altura" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($imc)
<p>Seu IMC é {{$imc}}.</p>
@endisset

@endsection