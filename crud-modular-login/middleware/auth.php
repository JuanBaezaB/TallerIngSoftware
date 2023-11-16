<?php
    require("database/connection.php");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Comprueba si el usuario está logueado
    if(!isset($_SESSION["username"])){
        header("Location: index.php?p=auth/login");
    }

    