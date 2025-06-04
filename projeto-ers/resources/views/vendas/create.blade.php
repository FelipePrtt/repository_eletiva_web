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

  <form method="post" action="/vendas/store">
    @csrf

    <input type="hidden" name="id" value="{{ $cliente->id }}">

    <div class="mb-3">
      <label for="nome" class="form-label">Nome do Cliente</label>
      <input type="text" id="nome" name="nome" class="form-control" readonly value="{{ $cliente->nome }}">
    </div>

    <div class="mb-3">
      <label for="pagamento" class="form-label">Tipo de Pagamento</label>
      <select id="pagamento" class="form-select" name="pagamento">
        <option value="Á vista">Á vista</option>
        <option value="Parcelado">Parcelado</option>
      </select>
    </div>

    <!-- Adicionar Itens -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Produto</label>
        <select id="produto_select" class="form-select">
          <option value="">Selecione um produto</option>
          @foreach($produtos as $produto)
          <option value="{{ $produto->id }}" data-preco="{{ $produto->valor_venda }}">{{ $produto->nome }} (R$ {{ number_format($produto->valor_venda, 2, ',', '.') }})</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Quantidade</label>
        <input type="number" id="quantidade_input" class="form-control" min="1">
      </div>
      <div class="col-md-3 d-flex align-items-end">
        <button type="button" class="btn btn-success w-100" id="adicionar_item">Adicionar Produto</button>
      </div>
    </div>

    <!-- Tabela de Itens -->
    <table class="table table-bordered" id="itens_tabela">
      <thead>
        <tr>
          <th>Produto</th>
          <th>Quantidade</th>
          <th>Valor Unitário</th>
          <th>Subtotal</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

    <!-- Total -->
    <div class="mb-3">
      <label for="valor_total_venda" class="form-label">Valor Total da Venda:</label>
      <input type="number" step="0.01" id="valor_total_venda" name="valor_total_venda" class="form-control" >
    </div>

    <!-- Ações -->
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="/clientes-vendas/{{ $cliente->id }}" class="btn btn-secondary">Cancelar</a>
  </form>

  <script>
    const produtos = @json($produtos);
    let total = 0;
    let itemIndex = 0;

    document.getElementById('adicionar_item').addEventListener('click', () => {
      const select = document.getElementById('produto_select');
      const quantidade = parseInt(document.getElementById('quantidade_input').value);
      const produtoId = select.value;
      const produtoNome = select.options[select.selectedIndex].text;
      const precoUnitario = parseFloat(select.options[select.selectedIndex].dataset.preco);

      if (!produtoId || quantidade <= 0) {
        alert('Selecione um produto e uma quantidade válida.');
        return;
      }

      const subtotal = precoUnitario * quantidade;
      total += subtotal;
      document.getElementById('valor_total_venda').value = total.toFixed(2);

      const tabela = document.querySelector('#itens_tabela tbody');
      const linha = document.createElement('tr');

      linha.innerHTML = `
        <td>${produtoNome}</td>
        <td>${quantidade}</td>
        <td>R$ ${precoUnitario.toFixed(2)}</td>
        <td>R$ ${subtotal.toFixed(2)}</td>
        <td><button type="button" class="btn btn-danger btn-sm remover">Remover</button></td>

        <input type="hidden" name="itens[${itemIndex}][produto_id]" value="${produtoId}">
        <input type="hidden" name="itens[${itemIndex}][quantidade]" value="${quantidade}">
        <input type="hidden" name="itens[${itemIndex}][valor_unitario]" value="${precoUnitario}">
    `;

      tabela.appendChild(linha);

      linha.querySelector('.remover').addEventListener('click', function() {
        total -= subtotal;
        document.getElementById('valor_total_venda').value = total.toFixed(2);
        linha.remove();
      });

      itemIndex++;
      select.selectedIndex = 0;
      document.getElementById('quantidade_input').value = '';
    });
  </script>

</body>

</html>