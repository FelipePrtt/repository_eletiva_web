<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastrar Funcionário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container">
  <h1>Cadastrar Funcionário</h1>

  <form method="post" action="/funcionarios">
    @csrf

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="nome" class="form-label">Nome Completo:</label>
        <input type="text" id="nome" name="nome" class="form-control" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="text" id="cpf" name="cpf" class="form-control" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="rg" class="form-label">RG:</label>
        <input type="text" id="rg" name="rg" class="form-control" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="text" id="telefone" name="telefone" class="form-control" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 mb-3">
        <label for="cep" class="form-label">CEP:</label>
        <input type="text" id="cep" name="cep" class="form-control" required>
      </div>

      <div class="col-md-3 mb-3">
        <label for="estado" class="form-label">Estado:</label>
        <input type="text" id="estado" name="estado" class="form-control" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="cidade" class="form-label">Cidade:</label>
        <input type="text" id="cidade" name="cidade" class="form-control" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="bairro" class="form-label">Bairro:</label>
        <input type="text" id="bairro" name="bairro" class="form-control" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="endereco" class="form-label">Endereço:</label>
        <input type="text" id="endereco" name="endereco" class="form-control" required>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="/funcionarios" class="btn btn-secondary">Cancelar</a>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>