@extends('layout')

@section('conteudo')


<form method="post" action="listaex4">

    @csrf

    <div class="mb-3">
        <label for="larg" class="form-label">Informe a largura do retângulo:</label>
        <input type="number" id="larg" name="larg" class="form-control" required="">
    </div>

    <div class="mb-3">
        <label for="alt" class="form-label">Informe a altura do retângulo</label>
        <input type="number" id="alt" name="alt" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($area)
<p>A área do retângulo é {{$area}}m².</p>
@endisset

@endsection