<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Venda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Novo Venda</h1>
    
    <form method="post" action="{{ route('vendas.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="descricao" class="form-label">ID Cliente</label>
            <input type="text" id="descricao" name="descricao" class="form-control" required>
        </div>

        <div class="mb-3">
            <lable for="forma_pagamento" class="form-label">Tipo de Pagamento</lable>
            <input type="text" id="forma_pagamento" name="forma_pagamento" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="qtde_parcelas" class="form-label">Quantidade de Parcelas:</label>
            <input type="number" step="1" id="qtde_parcelas" name="qtde_parcelas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="valor_parcela" class="form-label">Quantidade de Parcelas:</label>
            <input type="number" step="1" id="valor_parcela" name="valor_parcela" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="valor_total_venda" class="form-label">Valor da Venda:</label>
            <input type="number" step="0.01" id="valor_total_venda" name="valor_total_venda" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>