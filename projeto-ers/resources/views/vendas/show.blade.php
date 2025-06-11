<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes da venda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Detalhes do Da Compra</h1>
    
    <form method="post" action="/vendas/show/{{ $venda->id }}">
        @csrf
        @method('DELETE')
        
        <div class="mb-3">
            <label class="form-label">Nome Cliente:</label>
            <input type="text" class="form-control" value="{{ $cliente->nome }}" disabled>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Método de pagamento:</label>
            <input type="text" class="form-control" value="{{ $venda->pagamento}}" disabled>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Total:</label>
            <input type="number" class="form-control" value="{{ $venda->total }}" disabled>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Data da Venda:</label>
            <input type="text" class="form-control" value="{{ $venda->created_at }}" disabled>
        </div>

        
        <a href="/clientes-vendas/{{ $cliente->id }}" class="btn btn-secondary">Voltar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>