<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Meu E-commerce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

  <!-- Banner -->
  <div class="container-fluid p-0">
    <div class="mb-4">
        <h1 class="text-center mb-4">Meu Ecommerce</h1>
    </div>
  </div>

  <!-- Seção de Produtos -->

    <h2 class="text-center mb-4">Nossos Produtos</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

      <!-- Card 1 -->
    @foreach ($produto as $p)
      <div class="col">
        <div class="card h-100">
          <img src="{{asset('storage/'.$p->foto)}}" class="card-img-top" alt="Produto 1" />
          <div class="card-body">
            <h5 class="card-title">{{ $p->nome}}</h5>
            <p class="card-text">{{ $p->descricao}}</p>
            <p class="fw-bold">R$ 99,90</p>
            <a href="#" class="btn btn-primary">Comprar</a>
          </div>
        </div>
      </div>
    @endforeach
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>