<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fornecedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex">
        @extends('layout')
        @section('principal')

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>Fornecedores</h1>

                    <a class="btn btn-primary mb-3" href="/fornecedores/create">Novo Fornecedor</a>

                    @if (session('erro'))
                    <div class="alert alert-danger">
                        {{ session('erro')}}
                    </div>
                    @endif

                    @if (session('sucesso'))
                    <div class="alert alert-success">
                        {{ session('sucesso')}}
                    </div>
                    @endif

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>CNPJ</th>                               
                                <th>CEP</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fornecedores as $f)
                            <tr>
                                <td> {{ $f->id }}</td>
                                <td> {{ $f->nome }}</td>
                                <td> {{ $f->telefone }}</td>
                                <td> {{ $f->cnpj }}</td>
                                <td> {{ $f->cep }}</td>
                                <td>
                                    <a href="/fornecedores/{{ $f->id }}/edit" class="btn btn-warning">Editar</a>
                                    <a href="/fornecedores/{{ $f->id }}" class="btn btn-info">Consultar</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>