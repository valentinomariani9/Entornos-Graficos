<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Ingreso</title>
    </head>
    <body>
        <h1>Formulario de Ingreso</h1>
        <form action="crear_sesion.php" method="POST">
            <label for="nombre">Nombre usuario:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br><br>
            <label for="clave">Clave:</label>
            <input type="password" id="clave" name="clave" required>
            <br><br>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>

