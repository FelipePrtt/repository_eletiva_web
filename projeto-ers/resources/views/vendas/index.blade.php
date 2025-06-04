<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vendas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="d-flex">
    @extends('layout')
    @section('principal')

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h1>Vendas</h1>

          <a class="btn btn-primary mb-3" href="/vendas/create/{{ $id }}">Nova Venda</a>

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
                <th>Cliente</th>
                <th>Valor Total</th>
                <th>Tipo de Pagamento</th>
                <th>Data</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($vendas as $venda)
              <tr>
                <td>{{ $venda->id }}</td>
                <td>{{ $venda->cliente->nome }}</td>
                <td>{{ $venda->total }}</td>
                <td>{{ $venda->pagamento }}</td>;
                <td>{{ $venda->created_at }}</td>
                <td>
                  <a href="/vendas/edit/{{ $venda->id }}" class="btn btn-danger">Devolução</a>
                  <a href="/vendas/show/{{ $venda->id }}" class="btn btn-info">Consultar</a>
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