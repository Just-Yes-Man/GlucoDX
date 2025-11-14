<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gluco DX</title>

    {{-- Fuente Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@vite(['resources/css/styles.css', 'resources/js/main.js','resources/css/login.css','resources/css/registro.css'])

</head>
<body>

    <nav class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo">
            <span class="brand">GLUCO DX</span>
        </div>
        <div class="navbar-right">
            <a href="#" class="nav-link">Pacientes</a>
            <a href="#" class="nav-link">Diagnóstico</a>
            <div class="profile">
                <img src="{{ asset('images/user-icon.svg') }}" alt="Usuario" class="profile-icon">
            </div>
        </div>
    </nav>

    <main class="content">
        @yield('content')
    </main>

</body>
</html>
