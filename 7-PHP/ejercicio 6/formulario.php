<html>
    <head>
        <title>Formulario de busqueda</title>
    </head>
    <body>
        <h1>Buscar Usuario</h1>
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br><br>
            <button type="submit">Buscar</button>
        </form>

        <a href="verificar_sesion.php">verificar sesion</a>
    </body>
</html>

<?php
   if(isset($_POST['email'])){
       session_start();
       $email = $_POST['email'];
       if(filter_var($email, FILTER_VALIDATE_EMAIL)){
           include 'conexion.php';
           $sql = "SELECT * FROM alumnos WHERE mail = '$email'";
           $resultado = mysqli_query($conexion, $sql);
              if(mysqli_num_rows($resultado) > 0){
                $fila = mysqli_fetch_assoc($resultado);
                echo "<h2>Usuario encontrado: " . $fila['nombre'] . "</h2>";
                $_SESSION['alumno'] = $fila['nombre'];
              } else {
                echo "<h2>No se encontro ningun usuario con ese email</h2>";
              }

       } else {
           echo "<h2>El email no es valido</h2>";
       }
   }