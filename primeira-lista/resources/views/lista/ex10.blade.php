@extends('layout')

@section('conteudo')


<form method="post" action="listaex10">
    @csrf
    <div class="mb-3">
        <label for="km" class="form-label">Informe um valor em quilômetros (km):</label>
        <input type="number" id="km" name="km" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>


@isset($milhas)
<p>A quantidade em milhas é de: {{$milhas}}.</p>
@endisset
@endsection