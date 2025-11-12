@extends('layouts.app')

@section('content')
<div class="patients-container">
    <div class="patients-header">
        <a href="{{ route('home') }}" class="back-btn">←</a>
        <h2>Lista de Pacientes</h2>

        <div class="search-add">
            <div class="search-box">
                <input type="text" placeholder="Buscar" />
                <i class="fas fa-search"></i>
            </div>
            <button class="add-btn">+ Agregar</button>
        </div>
    </div>

    <div class="patients-table">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>CURP</th>
                    <th>Sexo</th>
                    <th>Tipo sanguíneo</th>
                    <th>Riesgo</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Evaristo Orea Gil</td>
                    <td>20</td>
                    <td>OEGA051011HVZRLD A1</td>
                    <td>Masculino</td>
                    <td>A+</td>
                    <td><span class="badge diabetes">Diabetes</span></td>
                    <td>
                        <button class="btn-action btn-delete" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <td>
                        <button class="btn-action btn-edit" title="Editar">
                            <i class="fas fa-pen"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
.patients-container {
    background-color: #f3f3f3;
    padding: 30px;
    min-height: 100vh;
}

.patients-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 25px;
}

.patients-header h2 {
    font-weight: 600;
    color: #333;
}

.back-btn {
    text-decoration: none;
    color: #000;
    font-size: 22px;
    margin-right: 10px;
}

.search-add {
    display: flex;
    align-items: center;
    gap: 15px;
}

.search-box {
    display: flex;
    align-items: center;
    background: white;
    padding: 8px 15px;
    border-radius: 10px;
    box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
}

.search-box input {
    border: none;
    outline: none;
    background: transparent;
    font-size: 14px;
}

.search-box i {
    color: #666;
    margin-right: 5px;
}

.add-btn {
    background-color: #eee;
    color: #777;
    border: none;
    padding: 8px 16px;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
}

.patients-table {
    background: white;
    border-radius: 15px;
    padding: 15px;
    box-shadow: 0px 3px 6px rgba(0,0,0,0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

th {
    font-weight: 600;
    color: #555;
    font-size: 14px;
}

td {
    font-size: 14px;
    color: #333;
}

.badge.diabetes {
    background-color: #ff8a8a;
    color: white;
    padding: 4px 10px;
    border-radius: 10px;
    font-size: 13px;
}

.action-btn {
    background: #fff;
    border: none;
    border-radius: 10px;
    padding: 6px 10px;
    box-shadow: 0px 2px 4px rgba(0,0,0,0.15);
    cursor: pointer;
}

.action-btn i {
    color: #444;
}

.action-btn.delete:hover i {
    color: red;
}

.action-btn.edit:hover i {
    color: #5a40ff;
}


/* --- Botones de acción --- */
.btn-action {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border: none;
    border-radius: 12px;
    box-shadow: 0px 2px 6px rgba(0,0,0,0.15);
    cursor: pointer;
    transition: all 0.25s ease;
}

.btn-action i {
    font-size: 15px;
    color: #555;
}

/* Efecto hover */
.btn-action:hover {
    transform: translateY(-1px);
    box-shadow: 0px 3px 8px rgba(0,0,0,0.2);
}

/* Específicos */
.btn-delete:hover i {
    color: #ff3b3b;
}

.btn-edit:hover i {
    color: #2b00ff;
}


/* Colores principales */
:root {
    --primary: #2b00ff;
    --secondary: #f3f3f3;
}

</style>
@endsection
