<?php
include '../../database/connection.php';

try {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $usuarios = array();

        if ($result->num_rows > 0) {
            // Obtener los datos de cada fila y agregarlos al array de usuarios
            while ($record = $result->fetch_array()) {
                $row = array();
                $row['id'] = $record['id'];
                $row['username'] = $record['username'];
                $row['email'] = $record['email'];
                $row['options'] = "<a id='delete' data-id=".$record['id']." class='btn btn-sm btn-outline-danger' >Eliminar</a>";

                $usuarios[] = $row;
            }
        }

        $response = array(
            'success' => true,
            'message' => 'Usuarios obtenidos correctamente',
            'data' => $usuarios
        );
        
    } else {
        $response = array(
            'success' => false,
            'message' => 'Error al obtener los usuarios. Intente de nuevo.'
        );
    }
} catch (PDOException $e) {
    $response = array(
        'success' => false,
        'message' => 'Error en el servidor. Intente de nuevo más tarde.'
    );
}

header('Content-Type: application/json');
echo json_encode($response);
