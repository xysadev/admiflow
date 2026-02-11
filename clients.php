<?php

require 'vendor/autoload.php';
require 'system/user_functions.php';

use Xysdev\Admiflow\Config;

// Obtener valores de configuración
$pageTitle = Config::getTemplateConfig('app_name');

// Definir roles permitidos para el módulo "income_list"
$allowedRoles = ['admin']; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List - <?= htmlspecialchars($pageTitle); ?></title>

    <?= include_layout('template/ui8/layouts/stylesheets.layout.php'); ?>

    <!-- Estilo para evitar el ajuste de texto en las celdas -->
    <style>
        .table td, .table th {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
.dataTables_wrapper .dataTables_length select,
.dataTables_wrapper .dataTables_filter input {
    color: white;
}
    </style>
</head>

<body>
    <!-- PreLoader Start -->
    <?= include_layout('template/ui8/layouts/preloader.layout.php'); ?>
    <!-- PreLoader End -->

    <!-- App Start -->
    <div class="d-flex flex-column flex-root">
        <!-- Page -->
        <div class="page d-flex flex-row flex-column-fluid">
            <!-- Page Sidebar -->
            <?= include_layout('template/ui8/layouts/aside.layout.php'); ?>
            <!-- Page Sidebar End -->

            <!-- Page Content Wrapper -->
            <main class="page-content d-flex flex-column flex-row-fluid">
                <!-- Page Header -->
                <?= include_layout('template/ui8/layouts/header.layout.php'); ?>
                <!-- Page Header End -->

                <!-- Chat Offcanvas -->
                <?= include_layout('template/ui8/layouts/offcanvasChat.layout.php'); ?>
                <!-- Chat Offcanvas End -->

                <!-- Page Toolbar -->
                <div class="toolbar p-4 bg-body">
                    <div class="position-relative container-fluid px-0">
                        <div class="row align-items-center position-relative">
                            <div class="col-md-8 mb-4 mb-lg-0">
                                <h3 class="mb-2">Client List</h3>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#!">Home</a></li>
                                        <li class="breadcrumb-item active">Pages</li>
                                        <li class="breadcrumb-item active">Client List</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Toolbar End -->

                <!-- Page Content -->
                <div class="content p-4 d-flex flex-column-fluid">
                    <div class="container-fluid px-0" id="pageContent">
                        <h5>Loading...</h5>
                        <p>Please wait while we load the content.</p>
                    </div>
                </div>
                <!-- Page Content End -->

                <!-- Page Footer -->
                <?= include_layout('template/ui8/layouts/footer.layout.php'); ?>
                <!-- Page Footer End -->
            </main>
            <!-- Page Content Wrapper End -->
        </div>
    </div>

    <!-- Theme Core Scripts -->
    <?= include_layout('template/ui8/layouts/coreScripts.layout.php'); ?>



<script>
document.addEventListener('DOMContentLoaded', () => {

    let table;
    const contentDiv = document.getElementById('pageContent');

    fetch('module/user/actions/getUserName.php')
        .then(r => r.json())
        .then(user => {

            if (!user.success || !<?= json_encode($allowedRoles); ?>.includes(user.role)) {
                contentDiv.innerHTML = `
                    <div class="alert alert-danger">
                        <h4>Acceso denegado</h4>
                        <a href="index.php" class="btn btn-primary">Volver</a>
                    </div>`;
                throw new Error();
            }

            return fetch('module/client/actions/getClientList.php');
        })
        .then(r => r.json())
        .then(json => render(json.data || []));

    function render(data) {

        contentDiv.innerHTML = `
            <h5>Listado de Clientes</h5>
            <button id="btnNewClient" class="btn btn-success mb-3">Nuevo cliente</button>
            <div class="table-responsive">
                <table id="clientTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        `;

        table = $('#clientTable').DataTable({
            data,
            responsive: true,
            autoWidth: false,
            order: [[0, 'desc']],
            columns: [
                { data: 'id' },
                { data: 'nombre' },
                { data: 'dni', defaultContent: 'N/A' },
                { data: 'celular', defaultContent: 'N/A' },
                { data: 'email', defaultContent: 'N/A' },
                { data: 'direccion', defaultContent: 'N/A' },
                {
                    data: null,
                    orderable: false,
                    render: () => '<button class="btn btn-sm btn-primary btn-edit">Editar</button>'
                }
            ]
        });
    }

    $(document).on('click', '#btnNewClient', () => {
        $('#modalMode').val('create');
        $('#editId').val('');
        $('#btnDeleteClient').addClass('d-none');
        $('#editClientModal input:not([type="hidden"])').val('');
        $('#editClientModal').modal('show');
    });

    $('#pageContent').on('click', '.btn-edit', function () {
        const row = table.row($(this).closest('tr'));
        const data = row.data();

        $('#modalMode').val('edit');
        $('#editId').val(data.id);
        $('#editNombre').val(data.nombre);
        $('#editDni').val(data.dni ?? '');
        $('#editCelular').val(data.celular ?? '');
        $('#editEmail').val(data.email ?? '');
        $('#editDireccion').val(data.direccion ?? '');
        $('#btnDeleteClient').removeClass('d-none');

        $('#editClientModal').modal('show');
    });

    $(document).on('click', '#saveClient', () => {

        const mode = $('#modalMode').val();

        const payload = {
            nombre: $('#editNombre').val().trim(),
            dni: $('#editDni').val().trim(),
            celular: $('#editCelular').val().trim(),
            email: $('#editEmail').val().trim(),
            direccion: $('#editDireccion').val().trim()
        };

        if (!payload.nombre) return;

        if (mode === 'create') createClient(payload);
        else optimisticEdit(payload);
    });

function createClient(payload) {

  Admiflow.secureFetch('module/client/actions/createClient.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': Admiflow.csrfToken
    },
    body: JSON.stringify(payload)
}).then(r => r.json())
    .then(json => {

        console.log('RESPUESTA CREATE:', json);

        if (!json.success) {
            alert(json.message || 'Error al crear');
            return;
        }

        table.row.add(json.data).draw(false);
        $('#editClientModal').modal('hide');
    })
    .catch(err => {
        console.error(err);
        alert('Error crítico al crear');
    });
}


    function optimisticEdit(payload) {

        const id = Number($('#editId').val());
        if (!id) return;

        payload.id = id;

        const row = table.row((idx, data) => data.id === id);
        const oldData = { ...row.data() };

        row.data({ ...oldData, ...payload }).draw(false);

        Admiflow.secureFetch('module/client/actions/updateClient.php', {
            method: 'POST',
            body: JSON.stringify(payload)
        })
        .then(r => r.json())
        .then(json => {

            if (!json.success) throw new Error();

            row.data(json.data ?? { ...oldData, ...payload }).draw(false);
            $('#editClientModal').modal('hide');
        })
        .catch(() => {
            row.data(oldData).draw(false);
            alert('Error al actualizar');
        });
    }

    $(document).on('click', '#btnDeleteClient', () => {

        const id = Number($('#editId').val());
        if (!id) return;

        const row = table.row((idx, data) => data.id === id);
        const backup = row.data();

        row.remove().draw(false);

        Admiflow.secureFetch('module/client/actions/deleteClient.php', {
            method: 'POST',
            body: JSON.stringify({ id })
        })
        .then(r => r.json())
        .then(json => {
            if (!json.success) throw new Error();
            $('#editClientModal').modal('hide');
        })
        .catch(() => {
            table.row.add(backup).draw(false);
            alert('Error al eliminar');
        });
    });

});
</script>



<div class="modal fade" id="editClientModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Cliente</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <input type="hidden" id="modalMode" value="create">
        <input type="hidden" id="editId">

        <div class="mb-3">
          <label>Nombre</label>
          <input id="editNombre" class="form-control">
        </div>

        <div class="mb-3">
          <label>DNI</label>
          <input id="editDni" class="form-control">
        </div>

        <div class="mb-3">
          <label>Teléfono</label>
          <input id="editCelular" class="form-control">
        </div>

        <div class="mb-3">
          <label>Email</label>
          <input id="editEmail" class="form-control">
        </div>

        <div class="mb-3">
          <label>Dirección</label>
          <input id="editDireccion" class="form-control">
        </div>
      </div>

      <div id="deleteClientZone" class="px-3 pb-3">

    <button
        id="btnDeleteClient"
        class="btn btn-danger w-100 d-none"
        type="button"
    >
        Eliminar cliente
    </button>
</div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-success" id="saveClient">Guardar</button>
      </div>

    </div>
  </div>
</div>

</body>
</html>
