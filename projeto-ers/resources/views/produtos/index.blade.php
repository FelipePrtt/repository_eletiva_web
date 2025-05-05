<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        @extends('layout')
        @section('principal')

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>Produtos</h1>

                    <a class="btn btn-primary mb-3" href="/produtos/create">Novo Produto</a>

                    @if (session('erro'))
                    <div class="alert alert-danger">
                        {{ session('erro') }}
                    </div>
                    @endif

                    @if (session('sucesso'))
                    <div class="alert alert-success">
                        {{ session('sucesso') }}
                    </div>
                    @endif

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descrição</th>
                                <th>Código de Barras</th>
                                <th>Valor Venda</th>
                                <th>Quantidade em Estoque</th>
                                <th>Fornecedor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->descricao }}</td>
                                <td>{{ $p->codigo_barra}}</td>
                                <td>R$ {{ number_format($p->valor_venda, 2, ',', '.') }}</td>
                                <td>{{ $p->qtde_estoque}}</td>
                                <td>
                                    @if($p->fornecedor)
                                    {{ $p->fornecedor->nome }}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    <a href="/produtos/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>
                                    <a href="/produtos/{{ $p->id }}" class="btn btn-info">Consultar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>