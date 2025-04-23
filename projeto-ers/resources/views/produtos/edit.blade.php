<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Editar Produto</h1>
    
    <form method="post" action="/produtos/{{ $produto->id }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Produto:</label>
            <input type="text" id="descricao" name="descricao" class="form-control" 
                   value="{{ old('descricao', $produto->descricao) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="valor_compra" class="form-label">Valor de Compra:</label>
            <input type="number" step="0.01" id="valor_compra" name="valor_compra" 
                   class="form-control" value="{{ old('valor_compra', $produto->valor_compra) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="valor_venda" class="form-label">Valor de Venda:</label>
            <input type="number" step="0.01" id="valor_venda" name="valor_venda" 
                   class="form-control" value="{{ old('valor_venda', $produto->valor_venda) }}" required>
        </div>

        <div class="mb-3">
            <label for="qtde_estoque" class="form-label">Quantidade em Estoque:</label>
            <input type="number" step="1" id="qtde_estoque" name="qtde_estoque" class="form-control" value="{{ old('qtde_estoque', $produto->qtde_estoque) }}" required>
        </div>

        <div class="mb-3">
            <label for="fornecedor_id" class="form-label">Fornecedor:</label>
            <select id="fornecedor_id" name="fornecedor_id" class="form-select">
                <option value="">-- Selecione --</option>
                @foreach ($fornecedores as $fornecedor)
                    <option value="{{ $fornecedor->id }}" 
                            {{ $produto->fornecedor_id == $fornecedor->id ? 'selected' : '' }}>
                        {{ $fornecedor->nome }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="mb-3">
            <label for="data_compra" class="form-label">Data da Compra:</label>
            <input type="date" id="data_compra" name="data_compra" 
                   class="form-control" value="{{ old('data_compra', $produto->data_compra ? $produto->data_compra : '') }}">
        </div>
    
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="/produtos" class="btn btn-secondary">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>