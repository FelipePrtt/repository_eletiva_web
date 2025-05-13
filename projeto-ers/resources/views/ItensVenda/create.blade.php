<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Produtos à Venda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="container">
    <h1>Adicionar Produtos à Venda</h1>

    <form method="post" action="{{ route('vendas.create') }}">
      @csrf

      <div class="mb-3">
        <label for="produto_id" class="form-label">ID do Produto</label>
        <input type="text" id="produto_id" name="produtos[0][id]" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade</label>
        <input type="number" id="quantidade" name="produtos[0][quantidade]" class="form-control" min="1" max="100" required>
      </div>

      <!-- Para adicionar mais produtos, repita os blocos acima dinamicamente com JS (ou backend) -->
      <!-- Exemplo de um segundo produto (pode ser gerado com JS): -->
      <!--
      <div class="mb-3">
        <label for="produto_id_2" class="form-label">ID do Produto</label>
        <input type="text" id="produto_id_2" name="produtos[1][id]" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="quantidade_2" class="form-label">Quantidade</label>
        <input type="number" id="quantidade_2" name="produtos[1][quantidade]" class="form-control" min="1" max="100" required>
      </div>
      -->

      <button type="submit" class="btn btn-primary">Adicionar Produtos</button>
      <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
