<?php
include_once '../../auth/auth.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    logout();
}
?>


<!-- head -->
<?php
$title = 'Página de Inicio';
$css = '<link rel="stylesheet" href="../../../assets/css/style.css">';
include_once '../../common/public/header.php';
?>


<!-- Content -->
<h1>Bienvenido a la Página de Inicio</h1>
<p>Contenido público visible para todos los usuarios.</p>

<?php if (is_authenticated()) : ?>
    <p>Contenido privado visible solo para usuarios autenticados.</p>
    <form name="delete" method="post">
        <button type="submit">Cerrar Sesión</button>
    </form>

<?php else : ?>
    <a href="../../auth/login.php">Iniciar Sesión</a>
<?php endif; ?>



<!-- scripts -->
<?php
$script = '<script src="../../../assets/js/main.js"></script>';
include_once '../../common/public/footer.php';
?>