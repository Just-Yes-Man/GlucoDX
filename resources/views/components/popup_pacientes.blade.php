<div class="modal fade" id="pacienteModal" tabindex="-1" aria-labelledby="pacienteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pacienteModalLabel">Seleccionar Paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">

        <!-- BUSCADOR -->
        <div class="input-group mb-3">
          <input type="text" id="busquedaPaciente" class="form-control" placeholder="Buscar por nombre o CURP">
          <button class="btn btn-outline-secondary" type="button" id="btnBuscarPaciente">Buscar</button>
        </div>

        <!-- TABLA PACIENTES -->
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>CURP</th>
              <th>Sexo</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody id="tablaPacientes">
            
          </tbody>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<div class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
  <div id="alertaPaciente" class="alert alert-success alert-dismissible fade" role="alert">
    <strong>¡Paciente añadido correctamente!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const pacientes = [
      {id: 1, nombre: 'Juan Pérez', curp: 'PEJJ010101HDFRRN09', sexo: 'Hombre'},
      {id: 2, nombre: 'María López', curp: 'LOPM900101MDFRRR05', sexo: 'Mujer'},
      {id: 3, nombre: 'Carlos Gómez', curp: 'GOMC850501HDFRTR02', sexo: 'Hombre'}
    ];

    const tabla = document.getElementById('tablaPacientes');
    const input = document.getElementById('busquedaPaciente');
    const alerta = new bootstrap.Alert(document.getElementById('alertaPaciente'));
    const alertaDiv = document.getElementById('alertaPaciente');

    
    function renderTabla(lista) {
      tabla.innerHTML = '';
      lista.forEach(p => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${p.id}</td>
          <td>${p.nombre}</td>
          <td>${p.curp}</td>
          <td>${p.sexo}</td>
          <td><button class="btn btn-primary btn-sm seleccionar-btn" data-id="${p.id}">Seleccionar</button></td>
        `;
        tabla.appendChild(tr);
      });
    }

    renderTabla(pacientes);

  
    document.getElementById('btnBuscarPaciente').addEventListener('click', () => {
      const q = input.value.toLowerCase();
      const filtrados = pacientes.filter(p => p.nombre.toLowerCase().includes(q) || p.curp.toLowerCase().includes(q));
      renderTabla(filtrados);
    });


    tabla.addEventListener('click', (e) => {
      if (e.target.classList.contains('seleccionar-btn')) {
        const id = e.target.getAttribute('data-id');
        const seleccionado = pacientes.find(p => p.id == id);
        console.log(`Paciente ${seleccionado.nombre} asignado al médico (simulado)`);

  
        alertaDiv.classList.add('show');
        setTimeout(() => alertaDiv.classList.remove('show'), 2500);

        const modal = bootstrap.Modal.getInstance(document.getElementById('pacienteModal'));
        modal.hide();
      }
    });
  });
</script>
