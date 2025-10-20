<?php
session_start();

if (!isset($_COOKIE['contador'])) {

    setcookie('contador', 1, time() + 2592000);
    $mensaje = "¡Bienvenido! Esta es tu primera visita a esta página.";
    $visitas = 1;
} else {
    $visitas = $_COOKIE['contador'] + 1;
    setcookie('contador', $visitas, time() + 2592000);
    $mensaje = "Has visitado esta página $visitas veces.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
</head>
<body>
    <div class="container">
        <h1>Contador de Visitas</h1>
        
        <div style="background-color: '#333'; 
                  padding: 20px; 
                  border-radius: 10px; 
                  margin-top: 20px;
                  box-shadow: 0 0 10px rgba(0,0,0,0.1);">

            <h2><?php echo $mensaje; ?></h2>
            
            <?php if ($visitas > 1): ?>
                <p>Fecha y hora de tu última visita: 
                   <?php echo isset($_COOKIE['ultima_visita']) ? $_COOKIE['ultima_visita'] : 'No disponible'; ?>
                </p>
            <?php endif; ?>
            
            <?php
            $fecha_actual = date('d/m/Y H:i:s');
            setcookie('ultima_visita', $fecha_actual, time() + 2592000);
            ?>
            
            <p>Fecha y hora actual: <?php echo $fecha_actual; ?></p>
        </div>
    </div>
</body>
</html>
