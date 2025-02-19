@extends('layout')

@section('conteudo')


<form method="post" action="listaex2">
                        
    @csrf

    <div class="mb-3">
        <label for="Celsius" class="form-label">Informe a temperatura em graus Celsius</label>
        <input type="number" id="Celsius" name="Celsius" class="form-control" required="">
    </div>
                    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@isset($fah)
    <p>A temperatura convetira para graus Fahrenheit é {{$fah}}.</p>
@endisset

@endsection