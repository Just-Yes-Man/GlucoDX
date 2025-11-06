@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <th>Riesgo</th>
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
            <a href="#" class="view-all">Ver todas →</a>
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
@endsection
