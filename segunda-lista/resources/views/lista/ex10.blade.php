@extends('layout')

@section('conteudo')

<form method="post" action="respEx10">
    @csrf
    <h1>Exercício 10</h1>
    <div class="mb-3">
        <label for="valor" class="form-label">Informe um número:</label>
        <input type="text" id="valor" name="valor" class="form-control" required="">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($tabuada, $valor)
<h2>Tabuada do {{$valor}}:</h2>
<ul style="list-style-type: none;">
    @foreach ($tabuada as $i => $resultado)
    <li>{{$valor}} x {{$i}} = {{$resultado}}</li>
    @endforeach
</ul>
@endisset

@endsection