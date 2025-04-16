<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Ecomerce</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar escura com botão de logout -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Ecomerce</a>

      <!-- Botão toggle para mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarConteudo" aria-controls="navbarConteudo" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Conteúdo colapsável da navbar -->
      <div class="collapse navbar-collapse" id="navbarConteudo">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Recursos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contato</a>
          </li>
        </ul>

        <!-- Botão de logout vermelho -->
        <form method="POST" action="/logout" class="d-flex" role="logout">
          @csrf
          <button type="submit" class="btn btn-danger">Sair</button>
        </form>
      </div>
    </div>
  </nav>

  @yield('principal')
  <!-- Bootstrap 5 JS (opcional, mas necessário para o toggle funcionar) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
