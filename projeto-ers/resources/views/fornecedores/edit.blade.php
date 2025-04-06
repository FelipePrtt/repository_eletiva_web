<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Editar Fornecedor</h1>
    
    <form method="post" action="/fornecedores/{{ $fornecedor->id }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Fornecedor:</label>
            <input type="text" id="nome" name="nome" class="form-control" 
                   value="{{ old('nome', $fornecedor->nome) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ:</label>
            <input type="text" id="cnpj" name="cnpj" class="form-control" 
                   value="{{ old('cnpj', $fornecedor->cnpj) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="form-control" 
                   value="{{ old('telefone', $fornecedor->telefone) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="cep" class="form-label">CEP:</label>
            <input type="text" id="cep" name="cep" class="form-control" 
                   value="{{ old('cep', $fornecedor->cep) }}">
        </div>
    
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" id="endereco" name="endereco" class="form-control" 
                   value="{{ old('endereco', $fornecedor->endereco) }}">
        </div>
    
        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro:</label>
            <input type="text" id="bairro" name="bairro" class="form-control" 
                   value="{{ old('bairro', $fornecedor->bairro) }}">
        </div>
    
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/fornecedores" class="btn btn-secondary">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>