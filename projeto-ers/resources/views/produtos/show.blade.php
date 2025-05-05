<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Consultar Produto</h1>
    
    <form method="post" action="/produtos/{{ $produto->id }}">
        @csrf
        @method('DELETE')
        
        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <input type="text" class="form-control" value="{{ $produto->descricao }}" disabled>
        </div>

        <div class="mb-3">
            <lable for="codigo_barra" class="form-label">Código de Barras</lable>
            <input type="number" id="codigo_barra" name="codigo_barra" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Valor de Compra:</label>
            <input type="text" class="form-control" value="R$ {{ number_format($produto->valor_compra, 2, ',', '.') }}" disabled>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Valor de Venda:</label>
            <input type="text" class="form-control" value="R$ {{ number_format($produto->valor_venda, 2, ',', '.') }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantidade em Estoque:</label>
            <input type="text" class="form-control" value=" {{number_format($produto->qtde_estoque)}}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Fornecedor:</label>
            <input type="text" class="form-control" 
                   value="{{ $produto->fornecedor ? $produto->fornecedor->nome : 'Nenhum fornecedor associado' }}" disabled>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Data da Compra:</label>
            <input type="text" class="form-control" 
                   value="{{ $produto->data_compra ? $produto->data_compra : 'Não informada' }}" disabled>
        </div>
    
        <div class="alert alert-warning mt-4">
            <p class="mb-0">Deseja excluir permanentemente este produto?</p>
        </div>
        
        <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
        <a href="/produtos" class="btn btn-secondary">Cancelar</a>
        <a href="/produtos/{{ $produto->id }}/edit" class="btn btn-primary">Editar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>