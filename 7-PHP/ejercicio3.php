<?php
session_start();

// Verificamos si se ha enviado el formulario
$mensaje = "";
if (isset($_POST['nombre_usuario']) && !empty($_POST['nombre_usuario'])) {
   
    $nombre_usuario = $_POST['nombre_usuario'];
    
    setcookie('ultimo_usuario', $nombre_usuario, time() + (86400 * 30), "/");
}

$ultimo_usuario = isset($_COOKIE['ultimo_usuario']) ? $_COOKIE['ultimo_usuario'] : "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordar Usuario</title>
</head>
<body>
    <div class="container">
        <h1>Formulario de Usuario</h1>
    
        <form action="" method="POST">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" 
                    placeholder="Ingresa tu nombre de usuario">
            <button type="submit">Guardar Usuario</button>
        </form>
        
        <?php if (!empty($ultimo_usuario)): ?>
            <div class="ultimo-usuario">
                <p>Último usuario guardado: <strong><?php echo $ultimo_usuario; ?></strong></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
