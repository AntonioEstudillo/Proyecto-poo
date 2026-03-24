
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gimnasio</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Gym System</a>

            <div>
                <a class="nav-link text-white" href="/clientes">Clientes</a>
                <a class="nav-link text-white" href="/membresias">Membresías</a>
                <a class="nav-link text-white" href="/entrenadores">Entrenadores</a>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>