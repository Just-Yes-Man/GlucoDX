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

            <button class="btn-edit">
                <i class="fas fa-pen"></i>
                Editar
            </button>
        </div>

        <form class="account-form">

            <label>Cédula</label>
            <input type="text" value="Maria Lopez">

            <div class="row-3">
                <div>
                    <label>Nombre</label>
                    <input type="text">
                </div>
                <div>
                    <label>Apellido paterno</label>
                    <input type="text">
                </div>
                <div>
                    <label>Apellido materno</label>
                    <input type="text">
                </div>
            </div>

            <label>Correo</label>
            <input type="email">

            <label>Contraseña</label>
            <input type="password">

        </form>

    </div>
</div>

<style>
 

 
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
}

.account-form input:focus {
    border-color: #2b00ff;
}

 
.row-3 {
    display: flex;
    gap: 15px;
}

.row-3 div {
    flex: 1;
}
</style>
@endsection
