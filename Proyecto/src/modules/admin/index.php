<?php
    include_once '../../auth/auth.php';

    if (!is_authenticated()) {
        header("Location: ../../auth/login.php");
    }

    echo "Bienvenido a la página de administración.";

?>