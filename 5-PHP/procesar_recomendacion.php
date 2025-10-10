<?php
if ($_POST) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $amigo = $_POST['amigo'];

    $asunto = "$nombre quiere recomendarte este sitio";
    $mensaje = "
    <html><body>
    <h2>¡Hola!</h2>
    <p>Tu amigo <b>$nombre</b> ($email) quiere recomendarte visitar este sitio:</p>
    <a href='https://www.tusitio.com'>Haz clic aquí para visitarlo</a>
    </body></html>
    ";

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    if (mail($amigo, $asunto, $mensaje, $headers)) {
        echo "La recomendación fue enviada a tu amigo.";
    } else {
        echo "Error al enviar la recomendación.";
    }
}
?>