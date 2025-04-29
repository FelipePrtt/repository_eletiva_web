<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Funcionários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="d-flex">
    @extends('layout')
    @section('principal')

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h1>Funcionários</h1>

          <a class="btn btn-primary mb-3" href="/funcionarios/create">Novo Funcionário</a>

          @if(session('sucesso'))
          <div class="alert alert-success">
            {{ session('sucesso') }}
          </div>
          @endif

          @if(session('erro'))
          <div class="alert alert-danger">
            {{ session('erro') }}
          </div>
          @endif

          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($funcionarios as $f)
              <tr>
                <td>{{ $f->id }}</td>
                <td>{{ $f->nome }}</td>
                <td>{{ $f->cpf }}</td>
                <td>{{ $f->telefone }}</td>
                <td>{{ $f->cidade }}/{{ $f->estado }}</td>
                <td>
                  <a href="/funcionarios/{{ $f->id }}/edit" class="btn btn-warning">Editar</a>
                  <a href="/funcionarios/{{ $f->id }}" class="btn btn-info">Consultar</a>
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