<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova Venda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
</head>

<body class="container my-4">
<h1>Nova Venda</h1>

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
            <option value="À vista">À vista</option>
            <option value="Parcelado">Parcelado</option>
        </select>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Produto</label>
            <select id="produto_select" class="form-select">
                <option value="">Selecione um produto</option>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}"
                            data-preco="{{ $produto->valor_venda }}"
                            data-estoque="{{ $produto->qtde_estoque }}">
                        {{ $produto->nome }} (R$ {{ number_format($produto->valor_venda, 2, ',', '.') }})
                    </option>
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
        <label for="valor_total_venda" class="form-label">Valor Total da Venda</label>
        <!-- number facilita validação no backend -->
        <input type="number" step="0.01" id="valor_total_venda" name="valor_total_venda"
               class="form-control" readonly>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="/clientes-vendas/{{ $cliente->id }}" class="btn btn-secondary">Cancelar</a>
</form>

<script>
    const produtos   = @json($produtos);
    let   totalVenda = 0;
    let   itemIndex  = 0;

    function atualizarTotal() {
        totalVenda = 0;
        document.querySelectorAll('#itens_tabela tbody tr').forEach(row => {
            const texto = row.cells[3].textContent.trim();
            let valorLimpo = texto.replace('R$ ', '').replace(' ', '');
            if (valorLimpo.includes(',')) {
                valorLimpo = valorLimpo.replace('.', '').replace(',', '.');
            }
            totalVenda += parseFloat(valorLimpo) || 0;
        });
        document.getElementById('valor_total_venda').value = totalVenda.toFixed(2);
    }

    document.getElementById('adicionar_item').addEventListener('click', () => {
        const select = document.getElementById('produto_select');
        const quantidadeInput = document.getElementById('quantidade_input');

        const produtoId  = select.value;
        const quantidade = parseInt(quantidadeInput.value);
        const option     = select.options[select.selectedIndex];

        if (!produtoId) {
            alert('Selecione um produto válido.');
            return;
        }
        if (!quantidade || quantidade < 1) {
            alert('Informe uma quantidade maior que zero.');
            return;
        }

        const estoqueDisponivel = parseInt(option.dataset.estoque);
        const precoUnitario     = parseFloat(option.dataset.preco);
        const produtoNome       = option.text.split(' (')[0];

        // Verifica se já existe uma linha com este produto
        let linhaExistente = null;
        let idxExistente   = null;

        document.querySelectorAll('#itens_tabela tbody tr').forEach(row => {
            const hidden = row.querySelector('input[name^="itens"][name$="[produto_id]"]');
            if (hidden && hidden.value === produtoId) {
                linhaExistente = row;
                idxExistente   = hidden.name.match(/\[(\d+)]/)[1];
            }
        });

        // Soma a quantidade total no carrinho desse produto
        let quantidadeNoCarrinho = 0;
        document.querySelectorAll('#itens_tabela input[name$="[produto_id]"]').forEach(input => {
            if (input.value === produtoId) {
                const idx = input.name.match(/\[(\d+)]/)[1];
                const qtd = parseInt(document.querySelector(`input[name="itens[${idx}][quantidade]"]`).value);
                quantidadeNoCarrinho += qtd;
            }
        });

        // Verifica estoque
        if ((quantidadeNoCarrinho + quantidade) > estoqueDisponivel) {
            alert(`Estoque insuficiente. Disponível: ${estoqueDisponivel - quantidadeNoCarrinho}`);
            return;
        }

        if (linhaExistente) {
            // Atualiza a quantidade e subtotal
            const qtdInput = linhaExistente.querySelector(`input[name="itens[${idxExistente}][quantidade]"]`);
            const novaQtd = parseInt(qtdInput.value) + quantidade;
            qtdInput.value = novaQtd;
            linhaExistente.cells[1].textContent = novaQtd;

            const novoSubtotal = precoUnitario * novaQtd;
            linhaExistente.cells[3].textContent = `R$ ${novoSubtotal.toFixed(2)}`;
        } else {
            // Cria nova linha se não existir
            const linha = document.createElement('tr');
            linha.innerHTML = `
                <td>${produtoNome}</td>
                <td>${quantidade}</td>
                <td>R$ ${precoUnitario.toFixed(2)}</td>
                <td>R$ ${(precoUnitario * quantidade).toFixed(2)}</td>
                <td><button type="button" class="btn btn-danger btn-sm remover">Remover</button></td>
            `;

            const criarHidden = (nome, valor) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = `itens[${itemIndex}][${nome}]`;
                input.value = valor;
                linha.appendChild(input);
            };

            criarHidden('produto_id', produtoId);
            criarHidden('quantidade', quantidade);
            criarHidden('valor_unitario', precoUnitario);

            linha.querySelector('.remover').addEventListener('click', () => {
                linha.remove();
                atualizarTotal();
            });

            document.querySelector('#itens_tabela tbody').appendChild(linha);
            itemIndex++;
        }

        atualizarTotal();

        // Limpa campos
        select.selectedIndex  = 0;
        quantidadeInput.value = '';
    });
</script>

</body>
</html>
