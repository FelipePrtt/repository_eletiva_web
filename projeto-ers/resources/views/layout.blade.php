<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-2 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100">
                <a href="#"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-4">Ecommerce</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    @auth
                        @if (Auth::user()->role === 'ADM')
                            <li>
                                <a class="nav-link text-white" href="/home-adm">Dashboard</a>
                            </li>
                            <li>
                                <a href="/produtos" class="nav-link text-white">Produtos</a>
                            </li>
                            <li>
                                <a href="/clientes" class="nav-link text-white">Clientes</a>
                            </li>
                            <li>
                                <a href="/funcionarios" class="nav-link text-white">Funcionários</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <hr>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Sair</button>
                </form>
            </nav>

            <main class="col">
                @yield('principal')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
