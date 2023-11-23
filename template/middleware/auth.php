<?php

require_once __DIR__ . '/../config/config.php';
include __DIR__ . '/../utils/functions.php';

// Iniciar la sesión (si no está iniciada)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Comprueba si el usuario está logueado
if (!isset($_SESSION["username"])) {
    header("Location: index.php?p=auth/login");
} else {
    $username = $_SESSION["username"];
    $user = get_user_by_username($username);

    if (!$user) {
        session_destroy();
        header("Location: index.php?p=auth/login");
    }
}
