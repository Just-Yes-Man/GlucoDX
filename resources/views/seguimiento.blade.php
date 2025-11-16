@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="title">
        <h3>Detalle del paciente</h3>
</div>

<div class="patient-dashboard">

    <!--  Lista de pacientes  -->
    
   <aside class="patient-list-wrapper">

    <div class="search-outside">
        <div class="search-box">
            <input type="text" placeholder="Buscar">
        </div>
    </div>

    <div class="patient-list">
        <ul class="patients-ul">
            <li class="patient-item">Maria Lopez <span>24/04/12</span></li>
            <li class="patient-item">Adrian Gil <span>24/04/12</span></li>
            <li class="patient-item">Emmanuel Sanchez <span>24/04/12</span></li>
            <li class="patient-item">Andryk Chama <span>24/04/12</span></li>
        </ul>
    </div>

</aside>


    <main class="patient-content">

        <!--  Tabs  -->
        <div class="tabs">
            <a href="?tab=seguimiento" class="tab {{ request('tab')=='seguimiento' || !request('tab') ? 'active' : '' }}">Seguimiento</a>
            <a href="?tab=antecedentes" class="tab {{ request('tab')=='antecedentes' ? 'active' : '' }}">Antecedentes</a>
            <a href="?tab=habitos" class="tab {{ request('tab')=='habitos' ? 'active' : '' }}">Hábitos</a>
        </div>

        <div class="content-card">
            
            @if(request('tab') == 'seguimiento' || !request('tab'))
                <h3>Evolución del paciente</h3>
                <p class="subtitle">HbA1c (%)</p>

                <div class="chart-container">
                    <canvas id="hba1cChart"></canvas>
                </div>

                <h3>Resumen del paciente</h3>
                <p><strong>Último resultado:</strong> 6.4% (Pre-diabetes)</p>
                <p>El paciente presenta valores estables. Se recomienda mantener control alimenticio y revisión médica en 3 meses.</p>

                <div class="actions">
                    <button class="btn btn-primary">Exportar informe</button>
                    <button class="btn btn-secondary">Historial completo</button>
                </div>
            @endif


            @if(request('tab') == 'antecedentes')

    <div class="antecedentes-wrapper">

        <div class="antecedentes-header">
            <div class="header-col">Personales</div>
            <div class="header-col">Familiares</div>
        </div>

        <div class="antecedentes-grid">

            <!--  personales  -->
            <div class="antecedentes-col">

                <!-- CARD 1 -->
                <div class="ante-card">
                    <p class="label">Enfermedad</p>
                    <p class="value">Diabetes tipo II</p>

                    <p class="label">Año de diagnóstico <span class="dots">---</span> <strong>2019</strong></p>

                    <p class="label">Tratamiento</p>
                    <p class="value">Metformina 850 mg<br>cada 12 h</p>

                    <p class="label">Notas</p>
                    <p class="value">Control glucémico estable</p>
                </div>

                <div class="ante-card">
                    <p class="label">Enfermedad</p>
                    <p class="value">Asma</p>

                    <p class="label">Año de diagnóstico <span class="dots">---</span> <strong>2015</strong></p>

                    <p class="label">Tratamiento</p>
                    <p class="value">Broncodilatadores</p>

                    <p class="label">Notas</p>
                    <p class="value">Estable</p>
                </div>

            </div>

            <!--  familiares  -->
            <div class="antecedentes-col">

                <div class="ante-card">
                    <p class="label">Parentesco <span class="dots">-----</span> <strong>Padre</strong></p>

                    <p class="label">Enfermedad</p>
                    <p class="value">Hipertensión</p>

                    <p class="label">Notas</p>
                    <p class="value">Murió a los 58 años<br>por un infarto</p>
                </div>

                <div class="ante-card">
                    <p class="label">Parentesco <span class="dots">-----</span> <strong>Madre</strong></p>

                    <p class="label">Enfermedad</p>
                    <p class="value">Diabetes tipo II</p>

                    <p class="label">Notas</p>
                    <p class="value">Vive, sin complicaciones</p>
                </div>

            </div>

        </div>

    </div>

@endif



@if(request('tab') == 'habitos')

<div class="habitos-wrapper">

    
    <div class="habitos-header">
        <div class="header-col">Hábitos</div>
        <div class="header-col">Alergias</div>
    </div>

    <div class="habitos-grid">

        <!--  habitos  -->
        <div class="habitos-col">

            <div class="habito-card">

                <div class="habitos-two-columns">

                    <div class="hab-col-left">
                        <p class="label">Alimentación</p>
                        <p class="value">3 comidas balanceadas diarias</p>

                        <p class="label">Alcohol</p>
                        <p class="value">Ocasional (2 veces al mes)</p>

                        <p class="label">Tabaquismo</p>
                        <p class="value">No fuma</p>
                    </div>

                    <div class="hab-col-right">
                        <p class="label">Actividad física</p>
                        <p class="value">3 veces por semana</p>

                        <p class="label">Horas de sueño</p>
                        <p class="value">7 horas por noche</p>
                    </div>

                </div>

                <p class="label mt-20">Observaciones generales</p>
                <p class="value">
                    Mantiene un estilo de vida saludable con actividad física regular y buena alimentación. 
                    Presenta niveles moderados de estrés laboral, sin consumo de tabaco y con adecuado descanso nocturno.
                </p>

            </div>

        </div>

        <!--  alergias  -->
        <div class="habitos-col">

            <div class="habito-card">

                <p class="dot-label">• Descripción</p>
                <p class="value">Mariscos (camarón, ostión)</p>

                <p class="dot-label">• Tipo de reacción</p>
                <p class="value">Urticaria leve y enrojecimiento</p>

                <p class="dot-label">• Medicamento</p>
                <p class="value">Loratadina 10 mg</p>

                <p class="dot-label">• Fecha de detección</p>
                <p class="value">12/05/2018</p>
            </div>

            <div class="habito-card">

                <p class="dot-label">• Descripción</p>
                <p class="value">Penicilina</p>

                <p class="dot-label">• Tipo de reacción</p>
                <p class="value">Inflamación y fiebre</p>

                <p class="dot-label">• Medicamento</p>
                <p class="value">Acetaminofén</p>

                <p class="dot-label">• Fecha de detección</p>
                <p class="value">08/09/2015</p>
            </div>

        </div>

    </div>

</div>

@endif


        </div>
    </main>
</div>



@if(request('tab') == 'seguimiento' || !request('tab'))
<script>
const ctx = document.getElementById('hba1cChart');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
        datasets: [{
            label: 'HbA1c',
            data: [1, 2, 2.5, 5.5, 3.2, 1.1],
            fill: false,
            tension: 0.4,
            borderColor: '#ff6b7a',
            backgroundColor: '#ff6b7a'
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false }},
        scales: {
            y: { min: 0, max: 9 }
        }
    }
});
</script>
@endif

@endsection
