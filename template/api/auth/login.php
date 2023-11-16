<?php
include '../../database/connection.php';

try {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }   

    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = stripslashes($_REQUEST['username']); // removes backslashes
        $username = mysqli_real_escape_string($connection, $username); //escapes special characters in a string
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM `users` WHERE username='$username' and password='" . md5($password) . "'";

        $result = mysqli_query($connection, $query);

        $user = mysqli_num_rows($result);

        if ($user == 1) {

            $userData = mysqli_fetch_assoc($result);
            $userRole = $userData['role_id'];

            $roleQuery = "SELECT * FROM `roles` WHERE `name` = 'user'";
            $roleResult = mysqli_query($connection, $roleQuery);
            $role = mysqli_fetch_assoc($roleResult);
            $roleId = $role['id'];

            $_SESSION['username'] = $username;

            $response = array(
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'redirect' => $roleId === $userRole ? 'index.php?p=home' : 'index.php?p=admin/home'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Nombre de usuario o contraseña incorrectos. Intente de nuevo.'
            );
        }
    } else {
        $response = array(
            'success' => false,
            'message' => 'Error en los datos recibidos'
        );
    }
    
} catch (PDOException $e) {

    $response = array(
        'success' => false,
        'message' => 'Error en el servidor. Intente de nuevo más tarde.'
    );

}

echo json_encode($response);
