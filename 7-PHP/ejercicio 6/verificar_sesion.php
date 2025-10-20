<?php
    session_start();
    if(isset($_SESSION['alumno'])) {
        $nombre = $_SESSION['alumno'];
        echo "<h1>Bienvenido de nuevo, $nombre</h1>";
    }
    else {
        echo "<h1>No puedes visitar esta pagina. Por favor, <a href='formulario.php'>inicia sesión</a>.</h1>";
    }
?>
