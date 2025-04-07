<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Detalhes do Funcionário</h1>
    
    <form method="post" action="/funcionarios/{{ $funcionario->id }}">
      @csrf
      @method('DELETE')
      
      <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" class="form-control" value="{{ $funcionario->nome }}" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">CPF:</label>
        <input type="text" class="form-control" value="{{ $funcionario->cpf }}" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">RG:</label>
        <input type="text" class="form-control" value="{{ $funcionario->rg }}" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">Telefone:</label>
        <input type="text" class="form-control" value="{{ $funcionario->telefone }}" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">CEP:</label>
        <input type="text" class="form-control" value="{{ $funcionario->cep ?? 'Não informado' }}" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">Endereço:</label>
        <input type="text" class="form-control" value="{{ $funcionario->endereco ?? 'Não informado' }}" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">Bairro:</label>
        <input type="text" class="form-control" value="{{ $funcionario->bairro ?? 'Não informado' }}" disabled>
      </div>

      <div class="alert alert-warning mt-4">
        <p class="mb-0">Deseja realmente excluir este funcionário?</p>
      </div>
      
      <button type="submit" class="btn btn-danger">Excluir</button>
      <a href="/funcionarios/{{ $funcionario->id }}/edit" class="btn btn-warning">Editar</a>
      <a href="/funcionarios" class="btn btn-secondary">Voltar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
