<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gluco DX</title>

    {{-- Fuente Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    {{-- Vinculamos tus archivos CSS y JS compilados por Vite --}}
    @vite(['resources/css/styles.css', 'resources/js/main.js'])

</head>
<body class="body-guest">

    {{-- Esta es la barra de navegación morada, solo con el logo --}}
    <nav class="navbar-guest">
         <div class="navbar-left">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo">
            <span class="brand">GLUCO DX</span>
        </div>
    </nav>

    <main class="content-guest">
        @yield('content')
    </main>

</body>
</html>