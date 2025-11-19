@extends('layouts.app')

@section('content')
@php
    // Pacientes simulados (10 registros)
    // *** NOTA: Añadí 'peso' y 'altura' para que el modal funcione ***
    $pacientes = [
        ['nombre' => 'Evaristo Orea Gil', 'edad' => 20, 'curp' => 'OEGA051011HVZRLDA1', 'sexo' => 'Masculino', 'tipo' => 'A+', 'riesgo' => 'diabetes', 'peso' => 75.5, 'altura' => 170],
        ['nombre' => 'Lucía Pérez Soto', 'edad' => 35, 'curp' => 'PESL900421MDFRTN09', 'sexo' => 'Femenino', 'tipo' => 'O-', 'riesgo' => 'pre', 'peso' => null, 'altura' => null],
        ['nombre' => 'Juan Morales Díaz', 'edad' => 42, 'curp' => 'MODJ830902HDFRTN03', 'sexo' => 'Masculino', 'tipo' => 'B+', 'riesgo' => 'normal', 'peso' => 88.1, 'altura' => 180],
        ['nombre' => 'María López Cruz', 'edad' => 28, 'curp' => 'LOCM950712MDFRTN05', 'sexo' => 'Femenino', 'tipo' => 'AB+', 'riesgo' => 'normal', 'peso' => 68.5, 'altura' => 170],
        ['nombre' => 'Fernando García', 'edad' => 50, 'curp' => 'GAFR730515HDFRTN08', 'sexo' => 'Masculino', 'tipo' => 'O+', 'riesgo' => 'diabetes', 'peso' => 95.3, 'altura' => 172],
        ['nombre' => 'Paula Hernández', 'edad' => 22, 'curp' => 'HEGP020415MDFRTN07', 'sexo' => 'Femenino', 'tipo' => 'A-', 'riesgo' => 'pre', 'peso' => 55.0, 'altura' => 160],
        ['nombre' => 'Luis Torres', 'edad' => 31, 'curp' => 'TOGL940221HDFRTN04', 'sexo' => 'Masculino', 'tipo' => 'B-', 'riesgo' => 'normal', 'peso' => 79.0, 'altura' => 178],
        ['nombre' => 'Carmen Ruiz Pérez', 'edad' => 47, 'curp' => 'RUCP770911MDFRTN02', 'sexo' => 'Femenino', 'tipo' => 'O+', 'riesgo' => 'diabetes', 'peso' => 73.2, 'altura' => 163],
        ['nombre' => 'Miguel Sánchez Vega', 'edad' => 38, 'curp' => 'SAVM870216HDFRTN05', 'sexo' => 'Masculino', 'tipo' => 'A+', 'riesgo' => 'pre', 'peso' => 81.7, 'altura' => 176],
        ['nombre' => 'Sandra López Mora', 'edad' => 26, 'curp' => 'LOMS990715MDFRTN09', 'sexo' => 'Femenino', 'tipo' => 'AB-', 'riesgo' => 'normal', 'peso' => 59.8, 'altura' => 168],
        ['nombre' => 'Evaristo Orea Gil', 'edad' => 20, 'curp' => 'OEGA051011HVZRLDA1', 'sexo' => 'Masculino', 'tipo' => 'A+', 'riesgo' => 'diabetes', 'peso' => 75.5, 'altura' => 170],
    ];
@endphp

<div class="patients-container">
    <div class="patients-header">
        <a href="{{ route('home') }}" class="back-btn">←</a>
        <h2>Lista de Pacientes</h2>

        <div class="search-add">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Buscar por nombre o CURP" />
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
            <tbody id="patients-body">
                 
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        <button id="prevPage">Anterior</button>
        <span id="pageInfo"></span>
        <button id="nextPage">Siguiente</button>
    </div>
</div>

{{--         HTML DEL MODAL DE OPCIONES      --}}
 
<div id="modalOverlay" class="modal-overlay"></div>

<div id="optionsModal" class="modal-content">
    
    <div class="modal-header">
        <h2>Opciones</h2>
        <button id="closeModalBtn" class="modal-close-btn">&times;</button>
    </div>

    <div class="modal-body">
        <div class="modal-patient-info">
            <span id="modalPatientName">Nombre del Paciente</span>
            <span id="modalPatientPeso">Peso: --</span>
            <span id="modalPatientAltura">Altura: --cm</span>
        </div>
        <button onclick="window.location='{{ route('seguimiento') }}'" class="modal-option-btn">Información del paciente</button>
        <button id="btnGenerarPrediccion" class="modal-option-btn">Generar prediccion</button>
        <button id="btnGenerarConsulta" class="modal-option-btn">Generar consulta</button>
    </div>

    <div class="modal-footer">
        <button class="modal-next-btn">
            Siguiente
            <i class="fas fa-arrow-right"></i>
        </button>
    </div>
</div>
 
{{--   FIN DEL HTML DEL MODAL  DE OPCIONES   --}}
 


{{-- MODAL DE RESULTADO (ÉXITO) --}}
<div id="predictionResultModal" class="modal-content modal-content-prediction">
    <div class="modal-header">
        <h2>Resultados</h2>
        <button id="closeResultModalBtn" class="modal-close-btn">&times;</button>
    </div>
    <div class="modal-body-prediction">
        <h3>Fecha del diagnóstico</h3>
        <p id="resultDate">--/--/----</p>
        
        <h3>Resultado</h3>
        <p><span id="resultBadge" class="badge pre">Pre diabetes</span></p>
        
        <h3>Probabilidad</h3>
        <p id="resultProbability">0.0000</p>
        
        <h3>Observaciones</h3>
        <p id="resultObservations">Sin observaciones.</p>
    </div>
</div>

{{-- MODAL DE INFORMACIÓN INSUFICIENTE (ERROR) --}}
<div id="predictionErrorModal" class="modal-content modal-content-prediction">
    <div class="modal-header">
        <h2>Información Insuficiente</h2>
        <button id="closeErrorModalBtn" class="modal-close-btn">&times;</button>
    </div>
    <div class="modal-body-prediction" style="text-align: center;">
        <div class="warning-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <p id="errorMessageText" style="margin-top: 20px; font-size: 16px;">
            No se puede generar el diagnóstico.
        </p>
    </div>
</div>
{{--  FIN DEL HTML DE LOS NUEVOS MODALES    --}}
 
 
{{--    HTML DEL MODAL DE REGISTRO DE CONSULTA (NUEVO) --}}
<div id="consultaModal" class="modal-content">
    
    <div class="modal-header">
        <h2>REGISTRO DE CONSULTA</h2>
        <button id="closeConsultaModalBtn" class="modal-close-btn">&times;</button>
    </div>

    <div class="step-indicator">
        <div id="stepIndicator1" class="step-item active" data-step="1">
            <span class="step-dot"></span>
            <span class="step-label">DATOS</span>
        </div>
        <div id="stepIndicator2" class="step-item" data-step="2">
            <span class="step-dot"></span>
            <span class="step-label">TRATAMIENTO</span>
        </div>
        <div id="stepIndicator3" class="step-item" data-step="3">
            <span class="step-dot"></span>
            <span class="step-label">MEDICACION</span>
        </div>
    </div>

    <div class="modal-body modal-body-form">
        
        <div id="consultaStep1" class="modal-step active">
            <div class="form-grid">
                <div class="form-group">
                    <label for="peso">Peso</label>
                    <input type="text" id="peso">
                </div>
                <div class="form-group">
                    <label for="glucosa">Glucosa en ayunas</label>
                    <input type="text" id="glucosa">
                </div>
                <div class="form-group">
                    <label for="presion_sis">Presion sistolica</label>
                    <input type="text" id="presion_sis">
                </div>
                <div class="form-group">
                    <label for="presion_dia">Presion diastolica</label>
                    <input type="text" id="presion_dia">
                </div>
                <div class="form-group">
                    <label for="hba1c">hbA1c</label>
                    <input type="text" id="hba1c">
                </div>
                <div class="form-group">
                    <label for="imc">IMC</label>
                    <input type="text" id="imc">
                </div>
                <div class="form-group form-group-date">
                    <label for="fecha_consulta">Fecha consulta</label>
                    <input type="text" id="fecha_consulta" placeholder="dd/mm/yy">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
        </div>
        
        <div id="consultaStep2" class="modal-step">
            <div class="form-group">
                <label for="tipo_tratamiento">Tipo de tratamiento</label>
                <textarea id="tipo_tratamiento" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea id="observaciones" rows="6"></textarea>
            </div>
        </div>
        
        <div id="consultaStep3" class="modal-step">
            <div class="form-grid-meds">
                <div class="form-group">
                    <label>Medicamento</label>
                    <input type="text" id="med_nombre">
                </div>
                <div class="form-group">
                    <label>Dosis</label>
                    <input type="text" id="med_dosis">
                </div>
                <div class="form-group">
                    <label>Frecuencia</label>
                    <input type="text" id="med_frecuencia">
                </div>
                <div class="form-group">
                    <label>Via de administracion</label>
                    <input type="text" id="med_via">
                </div>
                <button id="btnAddMedicacion" class="btn-add-med">
                    <i class="fas fa-plus"></i> Agregar
                </button>
            </div>
            
            <div class="meds-list-header">
                <span>Medicamento</span>
                <span>Dosis</span>
                <span>Frecuencia</span>
                <span>Via de administracion</span>
                <span></span>
            </div>
            <div id="medsListContainer" class="meds-list-container">
                </div>
        </div>
        
    </div>

    <div class="modal-footer" style="justify-content: space-between;">
    
    <button id="consultaBackBtn" class="btn-form-action btn-back">
        <i class="fas fa-arrow-left"></i> Atrás
    </button>
    
    <div class="footer-right-buttons">
        <button id="consultaNextBtn" class="modal-next-btn">
            Siguiente <i class="fas fa-arrow-right"></i>
        </button>
        <button id="consultaGuardarBtn" class="btn-form-action btn-guardar">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</div>
</div>
 
{{--    FIN DEL HTML DEL MODAL DE REGISTRO DE CONSULTA   --}}



{{-- SCRIPT DE PAGINACIÓN + BÚSQUEDA + LÓGICA DE MODALES --}}
<script>
    const pacientes = @json($pacientes);
    const rowsPerPage = 10;
    let currentPage = 1;
    let filteredPacientes = [...pacientes];
    
     
    let currentPatient = null; // Guardará el paciente al que le dimos clic
    let currentConsultaStep = 1; // Guardará el paso actual del form de consulta

    // selectores de elementos
    const tbody = document.getElementById('patients-body');
    const overlay = document.getElementById('modalOverlay');
    
    // modal 1 (Opciones)
    const optionsModal = document.getElementById('optionsModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const btnGenerarPrediccion = document.getElementById('btnGenerarPrediccion');
    const btnGenerarConsulta = document.getElementById('btnGenerarConsulta'); // NUEVO
    
    // modal 2 (Resultados)
    const resultModal = document.getElementById('predictionResultModal');
    const closeResultModalBtn = document.getElementById('closeResultModalBtn');
    
    // modal 3 (Error)
    const errorModal = document.getElementById('predictionErrorModal');
    const closeErrorModalBtn = document.getElementById('closeErrorModalBtn');

    // modal 4 (Consulta)
    const consultaModal = document.getElementById('consultaModal');
    const closeConsultaModalBtn = document.getElementById('closeConsultaModalBtn');
    const consultaNextBtn = document.getElementById('consultaNextBtn');
    const consultaBackBtn = document.getElementById('consultaBackBtn');
    const consultaGuardarBtn = document.getElementById('consultaGuardarBtn');
    const consultaSteps = document.querySelectorAll('.modal-step');
    const stepIndicators = document.querySelectorAll('.step-indicator .step-item');
    const btnAddMedicacion = document.getElementById('btnAddMedicacion');
    const medsListContainer = document.getElementById('medsListContainer');


    // logica de paginación y búsqueda
     
    function renderTable() {
        tbody.innerHTML = '';
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageData = filteredPacientes.slice(start, end);
        for (const p of pageData) {
            let riesgoTexto = '';
            if (p.riesgo === 'pre') riesgoTexto = 'Pre diabetes';
            else if (p.riesgo === 'diabetes') riesgoTexto = 'Diabetes';
            else riesgoTexto = 'Normal';
            tbody.innerHTML += `
                <tr>
                    <td class="patient-name" data-curp="${p.curp}">${p.nombre}</td>
                    <td>${p.edad}</td>
                    <td>${p.curp}</td>
                    <td>${p.sexo}</td>
                    <td>${p.tipo}</td>
                    <td><span class="badge ${p.riesgo}">${riesgoTexto}</span></td>
                    <td><button class="btn-action btn-delete" title="Eliminar"><i class="fas fa-trash"></i></button></td>
                    <td><button class="btn-action btn-edit" title="Editar"><i class="fas fa-pen"></i></button></td>
                </tr>`;
        }
        document.getElementById('pageInfo').textContent = `Página ${currentPage} de ${Math.ceil(filteredPacientes.length / rowsPerPage)}`;
    }
    document.getElementById('prevPage').onclick = () => { if (currentPage > 1) { currentPage--; renderTable(); } };
    document.getElementById('nextPage').onclick = () => { if (currentPage < Math.ceil(filteredPacientes.length / rowsPerPage)) { currentPage++; renderTable(); } };
    document.getElementById('searchInput').addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase();
        filteredPacientes = pacientes.filter(p => p.nombre.toLowerCase().includes(query) || p.curp.toLowerCase().includes(query));
        currentPage = 1;
        renderTable();
    });
    renderTable();


    // logica del modal de opciones

    function openOptionsModal(curp) {
        currentPatient = pacientes.find(p => p.curp === curp);
        if (!currentPatient) return;
        document.getElementById('modalPatientName').textContent = currentPatient.nombre;
        document.getElementById('modalPatientPeso').textContent = `Peso: ${currentPatient.peso || '--'}`;
        document.getElementById('modalPatientAltura').textContent = `Altura: ${currentPatient.altura || '--'}cm`;
        optionsModal.style.display = 'block';
        overlay.style.display = 'block';
    }

    function closeOptionsModal() {
        optionsModal.style.display = 'none';
         
    }

    tbody.addEventListener('click', (e) => {
        const nameCell = e.target.closest('.patient-name');
        if (nameCell) {
            openOptionsModal(nameCell.dataset.curp);
        }
    });
    closeModalBtn.addEventListener('click', () => {
        closeOptionsModal();
        overlay.style.display = 'none';  
        currentPatient = null;
    });

    //   logica del modal de predicción (resultado y error)

    function openPredictionResultModal() {
        document.getElementById('resultDate').textContent = '09/11/2025';
        document.getElementById('resultBadge').textContent = 'Pre diabetes';
        document.getElementById('resultProbability').textContent = '0.7523';
        document.getElementById('resultObservations').textContent = 'Se detectó factores de riesgo...';
        resultModal.style.display = 'block';
    }
    function openPredictionErrorModal() {
        document.getElementById('errorMessageText').innerHTML = `No se puede generar el diagnóstico de <strong>${currentPatient.nombre}</strong>. No existe suficiente información.`;
        errorModal.style.display = 'block';
    }
    function closePredictionModals() {
        resultModal.style.display = 'none';
        errorModal.style.display = 'none';
    }
    btnGenerarPrediccion.addEventListener('click', () => {
        closeOptionsModal();
        if (currentPatient && currentPatient.peso && currentPatient.altura) {
            openPredictionResultModal();
        } else {
            openPredictionErrorModal();
        }
    });
    closeResultModalBtn.addEventListener('click', () => {
        closePredictionModals();
        overlay.style.display = 'none';
        currentPatient = null;
    });
    closeErrorModalBtn.addEventListener('click', () => {
        closePredictionModals();
        overlay.style.display = 'none';
        currentPatient = null;
    });


    //      Lógica del modal de consulta
    
    // función para mostrar un paso específico (VERSIÓN MEJORADA) ---
    function showConsultaStep(stepNumber) {
        currentConsultaStep = stepNumber;
    
        // oculta todos los paneles de steps
        consultaSteps.forEach(step => step.classList.remove('active'));

        // actualiza los indicadores de paso
        stepIndicators.forEach(ind => {
            const step = parseInt(ind.dataset.step);
            if (step <= stepNumber) {
                ind.classList.add('active');  
            } else {
                ind.classList.remove('active'); 
            }
        });
    
        // mostrar el panel de step correcto
        document.getElementById(`consultaStep${stepNumber}`).classList.add('active');
    
        // actualizar la visibilidad de los botones del footer
        if (stepNumber === 1) {
            consultaBackBtn.style.display = 'none'; // Oculto en el paso 1
            consultaNextBtn.style.display = 'block';
            consultaGuardarBtn.style.display = 'none';
        } else if (stepNumber === 2) {
            consultaBackBtn.style.display = 'block'; // Visible
            consultaNextBtn.style.display = 'block';
            consultaGuardarBtn.style.display = 'none';
        } else if (stepNumber === 3) {
            consultaBackBtn.style.display = 'block'; // Visible
            consultaNextBtn.style.display = 'none';
            consultaGuardarBtn.style.display = 'block';
        }
    }

    // función para ABRIR el modal de consulta
    function openConsultaModal() {
        closeOptionsModal();  
        consultaModal.style.display = 'block';
        showConsultaStep(1);  
    }

    // --- Función para CERRAR el modal de consulta ---
    function closeConsultaModal() {
        consultaModal.style.display = 'none';
        overlay.style.display = 'none';  
        currentPatient = null;  
        medsListContainer.innerHTML = '';  
    }


    // botón "Generar Consulta"  
    btnGenerarConsulta.addEventListener('click', openConsultaModal);
    
    // botón 'X' para cerrar
    closeConsultaModalBtn.addEventListener('click', closeConsultaModal);

    // botón "Siguiente"
    consultaNextBtn.addEventListener('click', () => {
        if (currentConsultaStep < 3) {
            showConsultaStep(currentConsultaStep + 1);
        }
    });

    // clic en los indicadores de paso (para navegar)
    stepIndicators.forEach(indicator => {
        indicator.addEventListener('click', () => {
            const step = parseInt(indicator.dataset.step);
            showConsultaStep(step);
        });
    });

    // botones "Regregar" y "Guardar"  
    consultaBackBtn.addEventListener('click', () => {
        if (currentConsultaStep > 1) {
            showConsultaStep(currentConsultaStep - 1); // Va al paso anterior
        }
    });
    
    consultaGuardarBtn.addEventListener('click', () => {
        //lógica para guardar la consulta (simulación)
        alert('¡Consulta guardada (simulación)!');
        closeConsultaModal();
    });

    // lógica para "Agregar Medicación"
    btnAddMedicacion.addEventListener('click', () => {
        const nombre = document.getElementById('med_nombre').value;
        const dosis = document.getElementById('med_dosis').value;
        const frecuencia = document.getElementById('med_frecuencia').value;
        const via = document.getElementById('med_via').value;
        
        if (!nombre || !dosis || !frecuencia || !via) {
            alert('Por favor, complete todos los campos de medicación.');
            return;
        }
        
        // HTML para la nueva fila
        const medItemHTML = `
            <div class="meds-list-item">
                <span>${nombre}</span>
                <span>${dosis}</span>
                <span>${frecuencia}</span>
                <span>${via}</span>
                <div class="meds-actions">
                    <button class="btn-action-med" onclick="this.closest('.meds-list-item').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn-action-med"><i class="fas fa-pen"></i></button>
                </div>
            </div>`;
            
        medsListContainer.innerHTML += medItemHTML;
        
        // limpiar inputs
        document.getElementById('med_nombre').value = '';
        document.getElementById('med_dosis').value = '';
        document.getElementById('med_frecuencia').value = '';
        document.getElementById('med_via').value = '';
    });


    // listener general
    overlay.addEventListener('click', () => {
        // cierra todos los modales
        closeOptionsModal();
        closePredictionModals();
        closeConsultaModal();  
    });

</script>

<style>
 
.patients-container {
    background-color: #f3f3f3;
    padding: 30px;
    min-height: 100vh;
}


/* colores principales */
:root {
    --primary: #2b00ff;
    --secondary: #f3f3f3;
}

/* estilos para el nombre clickeable */
.patient-name {
    color: #333; 
    font-weight: 600;
    cursor: pointer;
}
.patient-name:hover {
    text-decoration: underline;
}


/* ESTILOS DEL MODAL       */ 

.modal-overlay {
    display: none;  
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1000;
}

.modal-content {
    display: none;  
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    width: 420px;
    max-width: 90%;
    z-index: 1001;
    font-family: 'Inter', sans-serif;  
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 25px;
    background-color: #2b00ff;  
    border-top-left-radius: 16px;
    border-top-right-radius: 16px;
}

.modal-header h2 {
    color: white;
    font-size: 20px;
    font-weight: 600;
    margin: 0;
}

.modal-close-btn {
    background: transparent;
    border: none;
    color: white;
    font-size: 28px;
    font-weight: 300;
    cursor: pointer;
    padding: 0;
    line-height: 1;
}

.modal-body {
    padding: 25px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.modal-patient-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 5px;
    margin-bottom: 10px;
}

.modal-patient-info span {
    font-size: 15px;
    color: #333;
}

#modalPatientName {
    font-weight: 600;
    font-size: 18px;
}

.modal-option-btn {
    background: #f0f0f0;
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 16px;
    width: 100%;
    text-align: center;
    font-size: 16px;
    color: #444;
    cursor: pointer;
    transition: background-color 0.2s;
}

.modal-option-btn:hover {
    background: #e0e0e0;
}

.modal-footer {
    padding: 0 25px 25px 25px;
    display: flex;
    justify-content: flex-end;
}

.modal-next-btn {
    background: #f0f0f0;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px 20px;
    font-size: 15px;
    color: #333;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}

.modal-next-btn:hover {
    background: #e0e0e0;
}

.pagination-container {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
}
.pagination-container button {
    background-color: var(--primary);
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
}
.pagination-container button:hover {
    background-color: #1a00b3;
}


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

/* badges de riesgo */
.badge {
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 500;
}
.badge.normal {
    background: #d9ffd9;
    color: #006d00;
    border: 1px solid #8fdc8f;
}
.badge.pre {
    background: #fff6cc;
    color: #b8860b;
    border: 1px solid #f5d96a;
}
.badge.diabetes {
    background: #ffd6d6;
    color: #a30000;
    border: 1px solid #f57a7a;
}

/* Botones */
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
.btn-action:hover {
    transform: translateY(-1px);
    box-shadow: 0px 3px 8px rgba(0,0,0,0.2);
}
.btn-delete:hover i {
    color: #ff3b3b;
}
.btn-edit:hover i {
    color: #2b00ff;
}

 
/* ESTILOS DE LOS MODALES DE PREDICCIÓN */

.modal-content-prediction {
    display: none;  
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    width: 400px;
    max-width: 90%;
    z-index: 1002;  
    font-family: 'Inter', sans-serif;
}

 
.modal-content-prediction .modal-header {
     
}

.modal-body-prediction {
    padding: 25px 30px;
}

.modal-body-prediction h3 {
    font-size: 14px;
    font-weight: 600;
    color: #555;
    margin-bottom: 4px;
}

.modal-body-prediction p {
    font-size: 15px;
    color: #333;
    margin-top: 0;
    margin-bottom: 16px;
}

/* estilos para el modal de Error */
.warning-icon {
    font-size: 80px;
    color: #FBC02D;  
    margin-top: 20px;
    margin-bottom: 15px;
     
    line-height: 1; 
}

 
/* ESTILOS DEL MODAL DE CONSULTA */

/* indicador de pasos */
.step-indicator {
    display: flex;
    justify-content: space-around;
    padding: 20px 30px;
    background-color: #f7f7f7;
    border-bottom: 1px solid #ddd;
}
.step-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
    color: #aaa;
}
.step-dot {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #ccc;
    border: 3px solid #f7f7f7;  
    margin-bottom: 5px;
    transition: all 0.3s ease;
}
.step-label {
    font-size: 12px;
    font-weight: 600;
}
.step-item.active .step-dot {
    background-color: var(--primary);  
    border-color: #f7f7f7;
}
.step-item.active .step-label {
    color: var(--primary);
}

/* --- estilos del formulario --- */
#consultaModal {
    width: 650px; 
}

.modal-body-form {
    padding: 25px 30px;
}
.modal-step {
    display: none;  
}
.modal-step.active {
    display: block;  
}

/* grid para campos de formulario */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}
/* grid para campos de medicación */
.form-grid-meds {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px 20px;
    align-items: flex-end;  
}

.form-group {
    display: flex;
    flex-direction: column;
}
.form-group label {
    font-size: 13px;
    color: #555;
    margin-bottom: 5px;
    font-weight: 500;
}
.form-group input[type="text"],
.form-group textarea {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px 12px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.2s;
}
.form-group input[type="text"]:focus,
.form-group textarea:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 2px rgba(43, 0, 255, 0.1);
}
.form-group textarea {
    resize: vertical;
    font-family: inherit;
}

/* campo de fecha con ícono */
.form-group-date {
    position: relative;
}
.form-group-date i {
    position: absolute;
    right: 12px;
    top: 36px;  
    color: #777;
}

/* paso 3 medicación */
.btn-add-med {
    background: #e0e0e0;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px;
    cursor: pointer;
    font-size: 14px;
    color: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    height: 40px;  
}
.btn-add-med:hover {
    background: #d0d0d0;
}

.meds-list-header {
    display: grid;
    grid-template-columns: 1fr 0.5fr 0.8fr 1fr 0.5fr;
    gap: 10px;
    font-size: 12px;
    font-weight: 600;
    color: #555;
    padding: 15px 10px 5px 10px;
    border-bottom: 2px solid #eee;
}
.meds-list-container {
    max-height: 150px;
    overflow-y: auto;
    border: 1px solid #eee;
    border-top: none;
    border-radius: 0 0 8px 8px;
}
.meds-list-item {
    display: grid;
    grid-template-columns: 1fr 0.5fr 0.8fr 1fr 0.5fr;
    gap: 10px;
    padding: 10px;
    font-size: 13px;
    border-bottom: 1px solid #f0f0f0;
    align-items: center;
}
.meds-list-item:last-child {
    border-bottom: none;
}
.meds-actions {
    display: flex;
    gap: 5px;
}
.btn-action-med {
    border: none;
    background: none;
    cursor: pointer;
    color: #777;
}
.btn-action-med:hover i.fa-trash { color: #ff3b3b; }
.btn-action-med:hover i.fa-pen { color: var(--primary); }


/* botones del Footer */
.btn-form-action {
    border: none;
    border-radius: 8px;
    padding: 10px 16px;
    font-size: 15px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}
.btn-back {
    background-color: #f0f0f0;
    color: #333;
}
.btn-back:hover { background-color: #e0e0e0; }
.btn-guardar {
    background-color: var(--primary);
    color: white;
}
.btn-guardar:hover { background-color: #1a00b3; }
.footer-right-buttons {
    display: flex;
    gap: 10px;
}

</style>
@endsection