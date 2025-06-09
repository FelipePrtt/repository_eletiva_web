<!DOCTYPE html>Add commentMore actions
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Vendas</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .tabela {
            width: 100%;
            border-collapse: collapse;
        }

        .tabela th, .tabela td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
        }

        .tabela th {
            background-color: #f0f0f0;
        }

        .footer {
            position: absolute;
            bottom: 30px;
            text-align: center;
            width: 100%;
            font-size: 10px;
            color: #555;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col {
            width: 48%;
        }
    </style>
</head>
<body>

    <div class="titulo">Relatório de Vendas</div>

    <table class="tabela">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Data da Venda</th>
                <th>Produtos</th>
                <th>Total da Venda</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td>{{ $venda->cliente->nome }}</td>
                    <td>{{ $venda->created_at->format('d/m/Y') }}</td>
                    <td>
                        <ul>
                            @foreach($venda->itens as $item)
                                <li>{{ $item->produto->nome }} ({{ $item->quantidade }}x R$ {{ number_format($item->valor_unitario, 2, ',', '.') }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>R$ {{ number_format($venda->total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total Geral: R$ {{ number_format($totalPeriodo, 2, ',', '.') }}</h4>

    <div class="footer">
        Relatório gerado em {{ now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>