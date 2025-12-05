<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gluco DX</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@vite(['resources/css/styles.css', 'resources/js/main.js','resources/css/seguimiento.css','resources/css/login.css','resources/css/registro.css','resources/css/pacientes.css'])

</head>
<body>

   <nav class="navbar">
    <div class="navbar-left">
        <button class="menu-btn" onclick="openSidebar()">☰</button>
        <img src="{{ asset('images/logo_glucoDX.jpeg') }}" alt="Logo" class="logo">
        <span class="brand">GLUCO DX</span>
    </div>


    </div>
</nav>

<div id="sidebar" class="sidebar">
    <button class="close-btn" onclick="closeSidebar()">×</button>
     <div class="sidebar-header">
        <img src="{{ asset('images/logo_glucoDX.jpeg') }}" class="logo-si" alt="Logo">
        <span class="sidebar-title">GLUCO DX</span>
    </div>
        

    <a href="{{ route('home') }}" class="sidebar-link">Inicio</a>
    <a href="{{ route('pacientes') }}" class="sidebar-link">Pacientes</a>
    <a href="{{ route('perfil') }}" class="sidebar-link">Perfil</a>
</div>

<div id="overlay" class="overlay" onclick="closeSidebar()"></div>


    <main class="content">
        @yield('content')
    </main>

</body>
</html>
<script>
function openSidebar() {
    document.getElementById('sidebar').style.left = '0';
    document.getElementById('overlay').style.display = 'block';
}

function closeSidebar() {
    document.getElementById('sidebar').style.left = '-260px';
    document.getElementById('overlay').style.display = 'none';
}
</script>