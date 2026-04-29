
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gimnasio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!--CDN FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <!-- NAVBAR -->
<nav class="bg-gray-900 py-4">
    <div class="container mx-auto flex items-center justify-between px-4">
        <a class="text-xl font-bold text-white" href="#">Gym System</a>

        <div class="flex flex-1 justify-around ml-10">
            <a class="text-white hover:text-cyan-400 hover:bg-gray-800 px-4 py-2 rounded-lg transition-all duration-300 flex-1 text-center" href="/clientes">Clientes</a>
            <a class="text-white hover:text-cyan-400 hover:bg-gray-800 px-4 py-2 rounded-lg transition-all duration-300 flex-1 text-center" href="/membresias">Membresías</a>
            <a class="text-white hover:text-cyan-400 hover:bg-gray-800 px-4 py-2 rounded-lg transition-all duration-300 flex-1 text-center" href="/entrenadores">Entrenadores</a>
            <a class="text-white hover:text-cyan-400 hover:bg-gray-800 px-4 py-2 rounded-lg transition-all duration-300 flex-1 text-center" href="/asistencias">Asistencias</a>
        </div>
    </div>
</nav>

    <main class="container mx-auto mt-8 px-4">
        @yield('content')
    </main>

</body>
</html>