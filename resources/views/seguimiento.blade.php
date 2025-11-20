@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/seguimiento.js') }}"></script>

<div class="title">
    <<a href="{{ route('pacientes') }}" class="btn-back">
     Regresar
</a>
    <h3>Detalle del paciente</h3>
</div>

<div class="patient-dashboard">

   <aside class="patient-list-wrapper">
        <div class="search-outside">
            <div class="search-box">
                <input type="text" placeholder="Buscar">
            </div>
        </div>

        <div class="patient-list">
            <ul class="patients-ul">
                <li class="patient-item" data-id="1">Maria Lopez <span>24/04/12</span></li>
                <li class="patient-item" data-id="2">Maria Lopez <span>24/04/12</span></li>
                <li class="patient-item" data-id="3">Maria Lopez <span>24/04/12</span></li>
                <li class="patient-item" data-id="4">Maria Lopez <span>24/04/12</span></li>
            </ul>
        </div>
    </aside>


    <main class="patient-content">

        <div class="tabs">
            <a href="?tab=seguimiento" class="tab {{ request('tab')=='seguimiento' || !request('tab') ? 'active' : '' }}">Seguimiento</a>
            <a href="?tab=antecedentes" class="tab {{ request('tab')=='antecedentes' ? 'active' : '' }}">Antecedentes</a>
            <a href="?tab=habitos" class="tab {{ request('tab')=='habitos' ? 'active' : '' }}">Hábitos</a>
        </div>

        <div class="content-card">

        {{-- ===================== --}}
        {{--     TAB SEGUIMIENTO   --}}
        {{-- ===================== --}}
        @if(request('tab') == 'seguimiento' || !request('tab'))

            <div id="seguimiento-normal">
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
            </div>

            <div id="seguimiento-detalle" style="display:none;">

                <button onclick="volverSeguimiento()" class="btn-back">← Regresar</button>

                <div class="det-header-row">
                    <h3>Detalles consulta</h3>
                    <span class="det-date" id="dc_fecha"></span>
                </div>

                <div class="det-grid-3">
                    <div class="det-item">
                        <span class="det-label">Glucosa ayunas:</span>
                        <span class="det-value" id="dc_glucosa"></span>
                    </div>
                    <div class="det-item">
                        <span class="det-label">Presión sistólica:</span>
                        <span class="det-value" id="dc_sistolica"></span>
                    </div>
                    <div class="det-item">
                        <span class="det-label">Peso:</span>
                        <span class="det-value" id="dc_peso"></span>
                    </div>

                    <div class="det-item">
                        <span class="det-label">HbA1c:</span>
                        <span class="det-value" id="dc_hba1c"></span>
                    </div>
                    <div class="det-item">
                        <span class="det-label">Presión diastólica:</span>
                        <span class="det-value" id="dc_diastolica"></span>
                    </div>
                    <div class="det-item">
                        <span class="det-label">IMC:</span>
                        <span class="det-value" id="dc_imc"></span>
                    </div>
                </div>

                <h3 class="det-section-title">Tratamiento</h3>
                <div class="det-grid-custom-tratamiento">
                    <div class="det-item">
                        <span class="det-label">Tipo de tratamiento:</span>
                        <div class="det-value-block" id="dc_tipo"></div>
                    </div>
                    <div class="det-item">
                        <span class="det-label">Duracion:</span>
                        <div class="det-value-block" id="dc_duracion"></div>
                    </div>
                </div>

                <h3 class="det-section-title">Medicacion</h3>
                <div class="det-grid-4">
                    <div class="det-item">
                        <span class="det-label">Medicamento:</span>
                        <div class="det-value-block" id="dc_medicamento"></div>
                    </div>
                    <div class="det-item">
                        <span class="det-label">Dosis:</span>
                        <div class="det-value-block" id="dc_dosis"></div>
                    </div>
                    <div class="det-item">
                        <span class="det-label">Frecuencia:</span>
                        <div class="det-value-block" id="dc_frecuencia"></div>
                    </div>
                    <div class="det-item">
                        <span class="det-label">Via de administración:</span>
                        <div class="det-value-block" id="dc_via"></div>
                    </div>
                </div>

                <div class="det-comments-wrapper">
                    <p class="det-label" style="margin-bottom: 10px;">Comentarios</p>
                    <div class="det-comment-box">
                        <p id="dc_comentarios"></p>
                    </div>
                </div>

            </div>

        @endif


        {{-- ===================== --}}
        {{--     TAB ANTECEDENTES  --}}
        {{-- ===================== --}}
        @if(request('tab') == 'antecedentes')
           <div class="antecedentes-wrapper">
                <div class="antecedentes-header">
                    <div class="header-col">Personales</div>
                    <div class="header-col">Familales</div>
                </div>
                <div class="antecedentes-grid">
                    <div class="antecedentes-col">
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


        {{-- ===================== --}}
        {{--     TAB HABITOS       --}}
        {{-- ===================== --}}
        @if(request('tab') == 'habitos')
            <div class="habitos-wrapper">
                <div class="habitos-header">
                    <div class="header-col">Hábitos</div>
                    <div class="header-col">Alergias</div>
                </div>
                <div class="habitos-grid">
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
                            </p>
                        </div>
                    </div>
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


{{-- SCRIPT SEGUIMIENTO DINÁMICO --}}
@if(request('tab') == 'seguimiento' || !request('tab'))
<script>
/* Consultas simuladas */
const consultas = {
    1: { glucosa: "105.4", hba1c: "5.8", sistolica: "120", diastolica: "80", peso: "68.5", imc: "24.3", fecha: "27/10/24", tipo: "Medicación", duracion: "60 min", medicamento: "Paracetamol", dosis: "500mg", frecuencia: "Cada 8 horas", via: "Oral", comentarios: "Paciente estable, mantener dieta y control mensual." },
    2: { glucosa: "110", hba1c: "6.1", sistolica: "118", diastolica: "79", peso: "70.2", imc: "24.8", fecha: "15/09/24", tipo: "Revisión general", duracion: "45 min", medicamento: "Metformina", dosis: "850mg", frecuencia: "Cada 12 horas", via: "Oral", comentarios: "Ajustar dieta." },
    3: { glucosa: "99", hba1c: "5.4", sistolica: "119", diastolica: "81", peso: "67.1", imc: "23.9", fecha: "02/08/24", tipo: "Control", duracion: "30 min", medicamento: "N/A", dosis: "-", frecuencia: "-", via: "-", comentarios: "Sin novedades." },
    4: { glucosa: "130", hba1c: "6.5", sistolica: "125", diastolica: "90", peso: "72.0", imc: "26.1", fecha: "01/07/24", tipo: "Urgencia", duracion: "20 min", medicamento: "Insulina", dosis: "10u", frecuencia: "Única dosis", via: "Subcutánea", comentarios: "Control inmediato requerido." }
};

/* Evento Click */
document.querySelectorAll(".patient-item").forEach(item => {
    item.addEventListener("click", () => {
        const id = item.dataset.id;
        const data = consultas[id];
        if (!data) return;

        // Rellenar campos
        document.getElementById("dc_glucosa").textContent = data.glucosa;
        document.getElementById("dc_hba1c").textContent = data.hba1c;
        document.getElementById("dc_sistolica").textContent = data.sistolica;
        document.getElementById("dc_diastolica").textContent = data.diastolica;
        document.getElementById("dc_peso").textContent = data.peso;
        document.getElementById("dc_imc").textContent = data.imc;
        document.getElementById("dc_fecha").textContent = data.fecha;
        document.getElementById("dc_tipo").textContent = data.tipo;
        document.getElementById("dc_duracion").textContent = data.duracion;
        document.getElementById("dc_medicamento").textContent = data.medicamento;
        document.getElementById("dc_dosis").textContent = data.dosis;
        document.getElementById("dc_frecuencia").textContent = data.frecuencia;
        document.getElementById("dc_via").textContent = data.via;
        document.getElementById("dc_comentarios").textContent = data.comentarios;

        // Cambiar vista
        document.getElementById("seguimiento-normal").style.display = "none";
        document.getElementById("seguimiento-detalle").style.display = "block";
    });
});

/* Función Volver */
function volverSeguimiento() {
    document.getElementById("seguimiento-detalle").style.display = "none";
    document.getElementById("seguimiento-normal").style.display = "block";
}
</script>

{{-- GRAFICA --}}
<script>
const ctx = document.getElementById('hba1cChart');
if (ctx) {
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
        options: { responsive: true, plugins: { legend: { display: false }}, scales: { y: { min: 0, max: 9 }} }
    });
}
</script>
@endif
@endsection