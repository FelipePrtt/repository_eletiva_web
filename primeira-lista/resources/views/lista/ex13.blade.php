@extends('layout')

@section('conteudo')


<form method="post" action="listaex13">
    @csrf
    <div class="mb-3">
        <label for="capital" class="form-label">Informe o capital:</label>
        <input type="number" id="capital" name="capital" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="juros" class="form-label">Informe a taxa de juros:</label>
        <input type="number" id="juros" name="juros" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="periodo" class="form-label">Informe o período de aplicação:</label>
        <input type="number" id="periodo" name="periodo" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


@isset($juros_simples)
<p>Os juros gerados no final da aplicação totalizam R${{$juros_simples}}.</p>
@endisset

@endsection