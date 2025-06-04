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

    <form method="post" action="{{ route('compras.create') }}">
      @csrf
      <div class="mb-3">
            <label for="produto_id" class="form-label">Selecione o Produto:</label>
            <select id="produto_id" name="produto_id" class="form-select">
                <option value="">-- Selecione --</option>
                @foreach ($produtos as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

    <a href="{{route('')}}" class="btn btn-primary">Adicionar ao Carrinho</a>

    
    <a href="/clientes-vendas/" class="btn btn-secondary">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
