<?php
if ($_POST) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $destinatario = "bochataymauricio01@gmail.com";
    $asunto = "Consulta desde el formulario de contacto";

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    $cuerpo = "
    <html><body>
    <h3>Consulta de $nombre</h3>
    <p><b>Email:</b> $email</p>
    <p><b>Mensaje:</b> $mensaje</p>
    </body></html>
";

    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "Tu consulta fue enviada correctamente.";
    } else {
        echo "Hubo un error al enviar tu consulta.";
    }
}
?>