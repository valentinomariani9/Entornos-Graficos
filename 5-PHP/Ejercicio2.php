<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Contacto</title></head>
<body>
<h2>Formulario de Contacto</h2>
<form method="post" action="procesar_contacto.php">
    Nombre: <input type="text" name="nombre" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Mensaje: <br>
    <textarea name="mensaje" rows="5" cols="40" required></textarea><br><br>
    <input type="submit" value="Enviar">
</form>
</body>
</html>