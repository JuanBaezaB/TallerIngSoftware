<?php
include("middleware/auth.php");
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class=" p-5 rounded text-center">
        <h2 class="fw-normal">Gestión de usuarios</h1>
    </div>
</div>



<main class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center">

                </div>
                <div>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        Agregar nuevo
                    </button>
                    <!-- <a class="btn btn-sm btn-primary" href="index.php?p=users/create" role="button">Agregar nuevo</a> -->
                </div>
            </div>
        </div>
        <div class="card-body table-responsive ">
            <table id="userTable" class="table table-hover" style="width:100%">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</main>



<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Agregar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" form="addUserForm" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
</div>



<!-- DataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        const table = $('#userTable').DataTable({
            "processing": true,
            "ajax": {
                "url": "api/users/users.php",
                "dataType": "json",
                "type": "POST"
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "username"
                },
                {
                    "data": "email"
                },
                {
                    "data": "options"
                }
            ]
        });
    });


    $(document).on('click', '#delete', function() {
        const id = $(this).data("id");

        Swal.fire({
            title: "Estas seguro de eliminar este usuario?",
            text: "No podras revertir esta accion!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "api/users/delete.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        const result = JSON.parse(response);
                        if (result.success) {
                            Swal.fire({
                                icon: 'success',
                                title: result.message,
                                timer: 1500,
                                showCancelButton: false,
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false,
                            }).then(() => {
                                $('#userTable').DataTable().ajax.reload();
                            });

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: result.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                });
            }
        });
    });

    const addUserForm = document.querySelector("#addUserForm");

    addUserForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const username = document.querySelector("#username").value;
        const email = document.querySelector("#email").value;
        const password = document.querySelector("#password").value;
        const confirmPassword = document.querySelector("#confirmPassword").value;

        if (password !== confirmPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Las contraseñas no coinciden',
                showConfirmButton: false,
                timer: 1500
            });
            return;
        }

        $.ajax({
            url: "api/users/create.php",
            type: "POST",
            data: {
                username: username,
                email: email,
                password: password
            },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: result.message,
                        timer: 1500,
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Aceptar",
                        allowOutsideClick: false,
                    }).then(() => {
                        $('#addUserModal').modal('hide');
                        addUserForm.reset();
                        $('#userTable').DataTable().ajax.reload();
                    });

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: result.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });

    });

</script>