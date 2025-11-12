<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gluco DX</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Fuente Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@vite(['resources/css/styles.css', 'resources/js/main.js'])

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
