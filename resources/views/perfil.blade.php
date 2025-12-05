@extends('layouts.app')

@section('content')
<div class="account-container">

     <div class="header-blue"></div>

     <div class="profile-picture">
        <div class="circle">
            <i class="fas fa-user"></i>
        </div>
    </div>

     <div class="account-card">

        <div class="account-header">
            <h2>Tu cuenta</h2>

            <button id="btnEditProfile" class="btn-edit">
                <i class="fas fa-pen"></i>
                Editar
            </button>
        </div>

        <form id="accountForm" class="account-form">

            <label>Cédula</label>
            <input type="text" id="cedula" value="A123456789" disabled>

            <div class="row-3">
                <div>
                    <label>Nombre</label>
                    <input type="text" id="nombre" value="Maria" disabled>
                </div>
                <div>
                    <label>Apellido paterno</label>
                    <input type="text" id="apPaterno" value="Lopez" disabled>
                </div>
                <div>
                    <label>Apellido materno</label>
                    <input type="text" id="apMaterno" value="Garcia" disabled>
                </div>
            </div>

            <label>Correo</label>
            <input type="email" id="correo" value="Lopez2222@gmail.com" disabled>

            <label>Contraseña</label>
            <input type="password" id="password" disabled>
            
            <div class="form-actions">
                <button type="button" id="btnSaveProfile" class="btn-primary-action" style="display: none;">Guardar Cambios</button>
            </div>

        </form>

        <div class="logout-section">
            <a href="{{ route('login') }}" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </div>

    </div>
</div>

<div id="confirmationMessage" class="confirmation-message">
    <i class="fas fa-check-circle"></i> Cambios guardados correctamente.
</div>

<style>
 
/* ESTILOS ORIGINALES */
 
.account-container {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

 
.profile-picture {
    margin-top: 40px;
}

.profile-picture .circle {
    width: 140px;
    height: 140px;
    background: white;
    border-radius: 20px;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-picture i {
    font-size: 70px;
    color: black;
}

 
.account-card {
    margin-top: 30px;
    width: 700px;
    background: #fff;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0px 3px 12px rgba(0,0,0,0.18);
}

 
.account-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.account-header h2 {
    font-size: 22px;
    font-weight: 600;
}

/* Estilo del botón Editar/Cerrar Sesión */
.btn-edit {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    background: white;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    box-shadow: 0px 2px 6px rgba(0,0,0,0.15);
    transition: 0.2s;
}

.btn-edit i {
    font-size: 14px;
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0px 3px 8px rgba(0,0,0,0.25);
    color: #2b00ff;
}

 
.account-form {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.account-form label {
    font-size: 14px;
    font-weight: 600;
}

.account-form input {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ccc;
    outline: none;
    transition: .2s;
    background-color: #f7f7f7;
    color: #555;
    cursor: not-allowed;
}

.account-form input:focus {
    border-color: #1800ad;
}

/* Estilo para inputs habilitados (modo edición) */
.account-form input:enabled {
    background-color: white;
    cursor: text;
    color: black;
}

 
.row-3 {
    display: flex;
    gap: 15px;
}

.row-3 div {
    flex: 1;
}

/* NUEVOS ESTILOS AÑADIDOS (Botones de acción, Logout, y Notificación) */
.form-actions {
    margin-top: 10px;
    text-align: right;
}

.btn-primary-action {
    background-color: #2b00ff; /* Primary color */
    color: white;
    border: none;
    padding: 10px 18px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 15px;
    font-weight: 600;
    transition: background-color 0.2s, box-shadow 0.2s;
}

.btn-primary-action:hover {
    background-color: #1a00b3; /* Darker shade of primary */
    box-shadow: 0 4px 10px rgba(43, 0, 255, 0.3);
}

.logout-section {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #eee;
    text-align: center;
}

.btn-logout {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background-color: #dc3545; /* Rojo para acciones críticas/de salida */
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.2s, box-shadow 0.2s;
}

.btn-logout:hover {
    background-color: #c82333;
    box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
    color: white; 
}

/* Estilos para el mensaje de confirmación */
.confirmation-message {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #d4edda;
    color: #155724;
    padding: 15px 25px;
    border-radius: 8px;
    border: 1px solid #c3e6cb;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    font-weight: 600;
    z-index: 5000;
    display: none; /* Oculto por defecto */
    animation: slideIn 0.5s ease-out forwards;
}

.confirmation-message i {
    margin-right: 10px;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnEdit = document.getElementById('btnEditProfile');
    const btnSave = document.getElementById('btnSaveProfile');
    const form = document.getElementById('accountForm');
    const inputs = form.querySelectorAll('input');
    const confirmationMessage = document.getElementById('confirmationMessage');
    let isEditing = false;

    // Función para alternar el estado de los campos
    function toggleEditMode(enable) {
        inputs.forEach(input => {
            // Solo se habilita si no es el campo Cédula (que se supone es fijo)
            if (input.id !== 'cedula') {
                input.disabled = !enable;
            }
        });
        
        isEditing = enable;
        
        if (enable) {
            btnEdit.innerHTML = '<i class="fas fa-times"></i> Cancelar';
            btnSave.style.display = 'block';
            btnEdit.classList.add('editing');
        } else {
            btnEdit.innerHTML = '<i class="fas fa-pen"></i> Editar';
            btnSave.style.display = 'none';
            btnEdit.classList.remove('editing');
        }
    }

    // El modo inicial es Lectura
    toggleEditMode(false); 

    // Evento para Editar/Cancelar
    btnEdit.addEventListener('click', function() {
        if (isEditing) {
            // Cancelar: Deshabilita y revierte el estado
            toggleEditMode(false);
            // Aquí se debería añadir lógica para revertir valores a los originales si fuera necesario
        } else {
            // Editar: Habilita campos
            toggleEditMode(true);
        }
    });

    // Evento para Guardar
    btnSave.addEventListener('click', function() {
        // Simulación de guardado
        
        // 1. Deshabilitar campos y salir del modo edición
        toggleEditMode(false); 
        
        // 2. Mostrar mensaje de confirmación
        confirmationMessage.style.display = 'block';
        
        // 3. Ocultar mensaje después de 3 segundos
        setTimeout(() => {
            confirmationMessage.style.display = 'none';
        }, 3000);

        // Previene el envío real del formulario ya que usamos type="button"
    });
});
</script>
@endsection