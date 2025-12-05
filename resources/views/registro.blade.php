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
    
   
    <div class="form-card">
        <h2>Crea tu cuenta</h2>

        <form  id="registerForm">
            @csrf

            <div class="input-group">
                <label for="cedula">Cedula</label>
                <input id="cedula" type="text" name="cedula" required placeholder="S233553535"autofocus>
            </div>

            
                <div class="input-row">
                <div class="input-group">
                    <label for="nombre">Nombres </label>
                    <input id="nombre" type="text" name="nombre" placeholder="Ejemplo: Ander" required>
                </div>
                <div class="input-group">
                    <label for="apellido_paterno">Apellidos</label>
                    <input id="apellido_paterno" type="text" name="apellido_paterno" placeholder="Ejemplo: Orea" required>
                </div>
               
            </div>
              
           

            <div class="input-group">
                <label for="correo">Correo</label>
                <input id="correo" type="email" name="correo" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="*********"required>
            </div>

            <div class="input-group">
                <label for="password_confirmation">Repetir</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="*********" required>
            </div>
            
        </form>
    </div>

    <div class="form-card-footer">
        <a href="{{ route('login') }}" class="auth-link">Tienes una cuenta? Haz clic aqui</a>
        
        <button onclick="window.location='{{ route('home') }}?status=register_success'" type="submit" form="registerForm" class="btn-submit">
            Crear Cuenta &raquo;
        </button>
    </div>
    
</div>
@endsection