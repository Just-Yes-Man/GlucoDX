@extends('layouts.app')

@section('content')
<style>
.menu-btn, .sidebar, #overlay {
    display: none !important;
}
.navbar-left {
    padding-left: 5px; 
}
</style>

<div class="auth-container">
    
    {{-- El ícono de usuario grande --}}
    <img src="{{ asset('images/icon_user.svg') }}" alt="" class="auth-user-icon">
    
    {{-- Card 1: El formulario --}}
    <div class="auth-card">
        <h2>Inicia sesion</h2>

        <form>
            @csrf

            <div class="input-group">
                <label for="cedula">Cedula</label>
                <input id="cedula" type="text" name="cedula" placeholder="S2342424422" required autofocus>
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="*********" required>
            </div>
            
        </form>
    </div>

    {{-- Card 2: El footer con el botón y el enlace --}}
    <div class="auth-card-footer">
        {{-- Asumimos una ruta 'login' --}}
        <a href="{{ route('registro') }}">No tienes una cuenta? Haz clic aqui</a>
        
        <button onclick="window.location='{{ route('home') }}?status=login_success'" type="submit" form="registerForm" class="btn-submit">
            Continuar &raquo;
        </button>
    </div>
    
</div>
@endsection