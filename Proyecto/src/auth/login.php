<?php
require_once __DIR__ . '/../auth/auth.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    if (login($email, $password)) {
        // Usuario registrado correctamente, redirigir a la página de inicio de sesión
        header("Location: ../modules/public/index.php");
    } else {
        // Error al registrar el usuario, redirigir a una página de error o mostrar un mensaje
        echo "Error al registrar el usuario.";
    }
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
        <h1>Inicia Sesión</h1>
        <form action="" method="post" name="login">
            <input type="email" name="email" placeholder="Correo" required />
            <input type="password" name="password" placeholder="Contraseña" required />
            <input name="submit" type="submit" value="Entrar" />
        </form>
        <p>¿No tienes cuenta? <a href='register.php'>Registrate Aquí</a></p>
    </div>

</body>

</html>