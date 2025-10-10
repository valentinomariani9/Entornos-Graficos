<?php
$destinatario = "bochataymauricio01@gmail.com";
$asunto = "Prueba con HTML";

// Cabeceras para indicar que el contenido es HTML
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: bochataymauricio01@gmail.com" . "\r\n";

$mensaje = "
<html>
<head><title>Correo de Prueba</title></head>
<body>
    <h2 style='color:blue;'>¡Hola!</h2>
    <p>Este es un correo con <b>formato HTML</b>.</p>
</body>
</html>
";

if (mail($destinatario, $asunto, $mensaje, $headers)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
}
?>