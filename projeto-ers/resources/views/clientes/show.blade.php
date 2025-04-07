<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Detalhes do Cliente</h1>
    
    <form method="post" action="/clientes/{{ $cliente->id }}">
        @csrf
        @method('DELETE')
        
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" class="form-control" value="{{ $cliente->nome }}" disabled>
        </div>
    
        <div class="mb-3">
            <label class="form-label">RG:</label>
            <input type="text" class="form-control" value="{{ $cliente->rg ?? '-' }}" disabled>
        </div>
    
        <div class="mb-3">
            <label class="form-label">CPF:</label>
            <input type="text" class="form-control" value="{{ $cliente->cpf }}" disabled>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <input type="text" class="form-control" value="{{ $cliente->telefone ?? '-' }}" disabled>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="text" class="form-control" value="{{ $cliente->email ?? '-' }}" disabled>
        </div>

        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="/clientes/{{ $cliente->id }}/edit" class="btn btn-warning">Editar</a>
        <a href="/clientes" class="btn btn-secondary">Voltar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>