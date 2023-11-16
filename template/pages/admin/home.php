<?php
include("middleware/auth.php");
?>
<div class="container">
    <h1 class="text-center my-5">Bienvenido Administrador</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">Administra los usuarios de la plataforma.</p>
                    <a href="index.php?p=admin/users/index" class="btn btn-primary">Ir a Usuarios</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">Administra los productos de la plataforma.</p>
                    <a href="#" class="btn btn-primary">Ir a Productos</a>
                </div>
            </div>
        </div>
    </div>
</div>