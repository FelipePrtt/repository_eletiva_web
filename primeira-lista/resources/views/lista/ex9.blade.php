@extends('layout')

@section('conteudo')


<form method="post" action="listaex9">
    @csrf
    <div class="mb-3">
        <label for="metros" class="form-label">Informe um valor em metros:</label>
        <input type="number" id="metros" name="metros" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($centimetros)
<p>O valor informado corresponde a {{$centimetros}} centimetros.</p>
@endisset
@endsection