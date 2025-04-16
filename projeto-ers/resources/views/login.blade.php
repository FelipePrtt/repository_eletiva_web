<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
      <h2 class="text-center mb-4">Login</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $e)
                <p>{{ $e }}</p>
            @endforeach
        </div>
    @endif

      <form action="/login" method="post">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input name="email" type="email" class="form-control" id="email" placeholder="seuemail@exemplo.com" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Senha</label>
          <input name="password" type="password" class="form-control" id="password" placeholder="Sua senha" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
