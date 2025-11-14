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
          <tbody id="tablaPacientes"></tbody>
        </table>

        <!-- PAGINACIÓN -->
        <nav>
          <ul class="pagination justify-content-center" id="paginacion"></ul>
        </nav>

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
    const pacientes = [];
    // Generamos más datos de ejemplo
    for (let i = 1; i <= 42; i++) {
      pacientes.push({
        id: i,
        nombre: `Paciente ${i}`,
        curp: `CURP${i.toString().padStart(4, '0')}`,
        sexo: i % 2 === 0 ? 'Hombre' : 'Mujer'
      });
    }

    const tabla = document.getElementById('tablaPacientes');
    const input = document.getElementById('busquedaPaciente');
    const alertaDiv = document.getElementById('alertaPaciente');
    const paginacion = document.getElementById('paginacion');

    const itemsPorPagina = 5;
    let paginaActual = 1;
    let listaFiltrada = [...pacientes];

    function renderTabla(lista) {
      tabla.innerHTML = '';
      const inicio = (paginaActual - 1) * itemsPorPagina;
      const fin = inicio + itemsPorPagina;
      const paginaDatos = lista.slice(inicio, fin);

      paginaDatos.forEach(p => {
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

      renderPaginacion(lista.length);
    }

    function renderPaginacion(totalItems) {
      const totalPaginas = Math.ceil(totalItems / itemsPorPagina);
      paginacion.innerHTML = '';

      for (let i = 1; i <= totalPaginas; i++) {
        const li = document.createElement('li');
        li.className = `page-item ${i === paginaActual ? 'active' : ''}`;
        li.innerHTML = `<button class="page-link">${i}</button>`;
        li.addEventListener('click', () => {
          paginaActual = i;
          renderTabla(listaFiltrada);
        });
        paginacion.appendChild(li);
      }
    }

    document.getElementById('btnBuscarPaciente').addEventListener('click', () => {
      const q = input.value.toLowerCase();
      listaFiltrada = pacientes.filter(p =>
        p.nombre.toLowerCase().includes(q) || p.curp.toLowerCase().includes(q)
      );
      paginaActual = 1;
      renderTabla(listaFiltrada);
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

    renderTabla(listaFiltrada);
  });
</script>
