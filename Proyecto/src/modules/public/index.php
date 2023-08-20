<?php
include_once '../../auth/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    logout();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
</head>

<body>

    <h1>Bienvenido a la Página de Inicio</h1>
    <p>Contenido público visible para todos los usuarios.</p>

    <?php if (is_authenticated()) : ?>
        <p>Contenido privado visible solo para usuarios autenticados.</p>
        <form name="delete" method="post">
            <button type="submit" >Cerrar Sesión</button>
        </form>
      
    <?php else : ?>
        <a href="../../auth/login.php">Iniciar Sesión</a>
    <?php endif; ?>



</body>

</html>