<?php
    session_start();
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        include 'conexion.php';

        $consulta = "SELECT * FROM catalogo WHERE id = $id";
        $resultado = mysqli_query($conexion, $consulta);

        if (!$resultado) {
            die("Error en la consulta: " . mysqli_error($conexion));
        }

        if ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<div>";
            echo "<h2>" . $fila['nombre'] . "</h2>";
            echo "<p>Precio: " . $fila['precio'] . "</p>";
            echo "<p>Producto añadido al carrito.</p>";
            echo "</div>";

            // Añadir el producto al carrito
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = array();
            }
            $_SESSION['carrito'][] = $fila;
        } else {
            echo "<p>Producto no encontrado.</p>";
        }

        mysqli_close($conexion);
    } else {
        echo "<p>ID de producto no proporcionado.</p>";
    }
?>