<?php
include '../../database/connection.php';

try {

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {

        $username = stripslashes($_REQUEST['username']); // removes backslashes
        $username = mysqli_real_escape_string($connection, $username); //escapes special characters in a string
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($connection, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);

        $roleQuery = "SELECT * FROM `roles` WHERE `name` = 'user'";
        $roleResult = mysqli_query($connection, $roleQuery);
        $role = mysqli_fetch_assoc($roleResult);
        $roleId = $role['id'];

        $query = "INSERT into `users` (username, password, email, role_id) VALUES ('$username', '" . md5($password) . "', '$email', '$roleId')";
        $result = mysqli_query($connection, $query);

        $response = array(
            'success' => true,
            'message' => 'Registro exitoso'
        );
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