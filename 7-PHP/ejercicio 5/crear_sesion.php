<?php
    session_start();
    if (isset($_POST['nombre']) && isset($_POST['clave'])) {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        
        $_SESSION['nombre'] = $nombre;
        $_SESSION['clave'] = $clave;

        header('Location: ver_sesion.php');
        exit();
    } else {
        header('Location: formulario.php');
        exit();
    }
?>