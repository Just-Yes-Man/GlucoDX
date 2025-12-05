@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@php
    // Obtener el parámetro 'status' de la URL
    $status = request()->query('status');
    $message = '';
    
    if ($status === 'login_success') {
        $message = '¡Bienvenido de nuevo! Sesión iniciada correctamente.';
    } elseif ($status === 'register_success') {
        $message = '¡Cuenta creada con éxito! Bienvenido a GLUCO DX.';
    }
@endphp

@if ($message)
<div id="globalConfirmation" class="global-confirmation-message">
    <i class="fas fa-check-circle"></i> {{ $message }}
</div>
@endif
<div class="dashboard">
    <section class="summary">
        <h2>Hola Dr. Sam</h2>
        <p class="subtitle">Resumen de pacientes</p>
        
 
        <div class="cards">
            <div class="card">
                <p>Pacientes</p>
                <h3>129</h3>
            </div>
            <div class="card">
                <p>En riesgo (prediabetes)</p>
                <h3>4</h3>
            </div>
            <div class="card">
                <p>En riesgo (diabetes)</p>
                <h3>5</h3>
            </div>
        </div>

        <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#pacienteModal">
            Asignar nuevo paciente
        </button>
    </section>

    <section class="patients-section">
        <div class="patients-card">
            <h3>Pacientes recientes</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Última HbA1c</th>
                        <th>Ultima diagnosis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Maria Lopez</td><td>52</td><td>6.4%</td><td><span class="badge pre">Pre diabetes</span></td>
                    </tr>
                    <tr>
                        <td>Maria Lopez</td><td>52</td><td>1.4%</td><td><span class="badge normal">Normal</span></td>
                    </tr>
                    <tr>
                        <td>Maria Lopez</td><td>52</td><td>9.4%</td><td><span class="badge diabetes">Diabetes</span></td>
                    </tr>
                    <tr>
                        <td>Maria Lopez</td><td>52</td><td>6.4%</td><td><span class="badge diabetes">Diabetes</span></td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('pacientes') }}" class="btn-pacientes" class="view-all">Ver todas →</a>
        </div>

        <div class="chart">
            <canvas id="riskChart"></canvas>
        </div>
    </section>

    <section class="diagnostics">
        <h3>Diagnósticos recientes</h3>
        <div class="diagnostics-card">
            <p>Paciente: Maria Lopez tuvo HbA1c de 6.4 y se le diagnosticó con pre diabetes</p>
            <p>Paciente: Maria Lopez tuvo HbA1c de 6.4 y se le diagnosticó con pre diabetes</p>
            <p>Paciente: Maria Lopez tuvo HbA1c de 6.4 y se le diagnosticó con pre diabetes</p>
        </div>
    </section>
</div>

@include('components.popup_pacientes')

@if ($message)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const confirmation = document.getElementById('globalConfirmation');
        
        // Muestra y anima el mensaje
        confirmation.style.display = 'flex'; 
        confirmation.classList.add('show');
        
        // Oculta el mensaje después de 3 segundos
        setTimeout(() => {
            confirmation.style.display = 'none';
        }, 3000);
        
        // OPCIONAL: Eliminar el parámetro 'status' de la URL para que no se muestre al refrescar
        if (window.history.replaceState) {
            const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
            window.history.replaceState({path:cleanUrl},'',cleanUrl);
        }
    });
</script>
@endif

@endsection