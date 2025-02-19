@extends('layout')

@section('conteudo')


<form method="post" action="listaex3">

    @csrf
                        
    <div class="mb-3">
        <label for="fah" class="form-label">Informe uma temperatura em Fahrenheit:</label>
        <input type="number" id="fah" name="fah" class="form-control" required="">
    </div>
                    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
            
@isset($Celsius)
<p>A temperatura convertida para graus Celsius é {{$Celsius}}.</p>
@endisset

@endsection