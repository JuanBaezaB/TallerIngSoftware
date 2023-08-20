<?php
require_once __DIR__ . '/../auth/auth.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    register();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration</title>
</head>

<body>

    <div class="form">
        <h1>Registrate Aquí</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="name" placeholder="Usuario" required />
            <input type="email" name="email" placeholder="Correo" required />
            <input type="password" name="password" placeholder="Contraseña" required />
            <input type="submit" name="submit" value="Registrarse" />
        </form>
    </div>

</body>

</html>