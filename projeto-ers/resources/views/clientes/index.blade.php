<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex">
        @extends('layout')
        @section('principal')

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>Clientes</h1>

                    <a class="btn btn-primary mb-3" href="/clientes/create">Novo Cliente</a>

                    @if (session('sucesso'))
                    <div class="alert alert-success">
                        {{ session('sucesso') }}
                    </div>
                    @endif

                    @if (session('erro'))
                    <div class="alert alert-danger">
                        {{ session('erro') }}
                    </div>
                    @endif

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>CEP</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->nome }}</td>
                                <td>{{ $c->telefone}}</td>
                                <td>{{ $c->cpf }}</td>
                                <td>{{ $c->cep }}</td>
                                <td>{{ $c->email ?? '-' }}</td>
                                <td>
                                    <a href="/clientes/{{ $c->id }}/edit" class="btn btn-warning">Editar</a>
                                    <a href="/clientes/{{ $c->id }}" class="btn btn-info">Consultar</a>
                                    <a href="/clientes-vendas/{{ $c->id }}" class="btn btn-primary">Compras</a>
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
    @if(method_exists($clientes, 'links'))
    <div class="d-flex justify-content-center">
        {{ $clientes->links() }}
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>