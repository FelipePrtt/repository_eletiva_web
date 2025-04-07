<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Editar Funcionário</h1>
    
    <form method="post" action="/funcionarios/{{ $funcionario->id }}">
      @csrf
      @method('PUT')
      
      <div class="mb-3">
        <label for="nome" class="form-label">Nome Completo:</label>
        <input type="text" id="nome" name="nome" class="form-control" 
               value="{{ old('nome', $funcionario->nome) }}" required>
      </div>
      
      <div class="mb-3">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="text" id="cpf" name="cpf" class="form-control" 
               value="{{ old('cpf', $funcionario->cpf) }}" required>
      </div>
    
      <div class="mb-3">
        <label for="rg" class="form-label">RG:</label>
        <input type="text" id="rg" name="rg" class="form-control" 
               value="{{ old('rg', $funcionario->rg) }}" required>
      </div>
      
      <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="text" id="telefone" name="telefone" class="form-control" 
               value="{{ old('telefone', $funcionario->telefone) }}" required>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="cep" class="form-label">CEP:</label>
          <input type="text" id="cep" name="cep" class="form-control" 
                 value="{{ old('cep', $funcionario->cep) }}" required>
        </div>
        
        <div class="col-md-4 mb-3">
          <label for="estado" class="form-label">Estado:</label>
          <input type="text" id="estado" name="estado" class="form-control" 
                 value="{{ old('estado', $funcionario->estado) }}" required>
        </div>
        
        <div class="col-md-4 mb-3">
          <label for="cidade" class="form-label">Cidade:</label>
          <input type="text" id="cidade" name="cidade" class="form-control" 
                 value="{{ old('cidade', $funcionario->cidade) }}" required>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Atualizar</button>
      <a href="/funcionarios" class="btn btn-secondary">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
