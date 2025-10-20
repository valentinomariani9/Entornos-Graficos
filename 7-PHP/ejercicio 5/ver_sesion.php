<?php
    session_start();
    if (isset($_SESSION['nombre']) && isset($_SESSION['clave'])) {
        $nombre = $_SESSION['nombre'];
        $clave = $_SESSION['clave'];
        echo "<h1>Bienvenido, $nombre</h1>";
        echo "<p>Tu clave es: $clave</p>";
    } else {
        header('Location: formulario.php');
        exit();
    }
?>