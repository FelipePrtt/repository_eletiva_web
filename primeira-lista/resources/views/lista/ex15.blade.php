@extends('layout')
@section('conteudo')

<form method="post" action="listaex15">
    @csrf
    <div class="mb-3">
        <label for="dias" class="form-label">Insira uma quantidade de dias:</label>
        <input type="number" id="dias" name="dias" class="form-control" required="" step="0.1"> 
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($qtd_dias, $horas, $minutos, $segundos)
<p>{{$qtd_dias}} dias são equivalente a {{$horas}} horas, {{$minutos}} minutos e {{$segundos}} segundos.</p>
@endisset
@endsection