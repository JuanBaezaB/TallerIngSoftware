<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?p=admin/home">NavbarAdmin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <?php
            if (isset($_SESSION["username"])) {
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina == 'admin/home') ? 'active' : null ?>" aria-current="page" href="index.php?p=admin/home">Inicio</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'admin/users') !== false) ? 'active' : null ?>" href="index.php?p=admin/users/index">Usuarios</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="index.php?p=auth/profile" class="btn btn-sm btn-outline-primary me-2">Perfil</a>
                    <a id="logout" class="btn btn-sm btn-outline-danger">Cerrar Sesión</a>
                </div>
            <?php
            } else {
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home">Inicio</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="index.php?p=auth/login" class="btn btn-sm btn-outline-primary me-2">Iniciar Sesión</a>
                    <a href="index.php?p=auth/register" class="btn btn-sm btn-outline-success">Registrarse</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</nav>