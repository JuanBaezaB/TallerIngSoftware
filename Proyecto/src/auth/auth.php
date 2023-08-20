<?php
require_once __DIR__ . '/../database/connection.php';

session_start();

// function for checking if the user is logged in
function is_authenticated()
{
    return isset($_SESSION['user_id']);
}

// function for logging in
function login($email, $password)
{
    global $conn;

    $query = "SELECT * FROM `users` WHERE email='$email' and password='" . md5($password) . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role_id'] = $row['role_id'];

        if ($row['role_id'] == 1) {
            header("Location: ../modules/admin/index.php");
        } else if ($row['role_id'] == 2) {
            header("Location: ../modules/public/index.php");
        }

        exit();
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos.')</script>";
    }
}

// Función para el registro de usuarios
function register()
{

    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    global $conn;

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $idRolUsuario = 2;

    // Insertar el nuevo usuario en la base de datos
    $query = "INSERT into `users` (name, password, email, role_id) VALUES ('$name', '".md5($password)."', '$email', '$idRolUsuario')";

    $result = mysqli_query($conn ,$query);

    if($result){
        header("Location: ../modules/public/index.php");
    }else{
        echo "<script>alert('Error al registrar el usuario.')</script>";
    }

}

// function for logging out
function logout()
{
    unset($_SESSION['user_id'], $_SESSION['role_id']);
    session_destroy();
    header("Location: ../public/index.php");
    exit();
}
