<?php
    include 'conexion.php';

    $consulta = "SELECT * FROM catalogo";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
    echo "<h1>Catálogo de Productos</h1>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<div>";
        echo "<h2>" . $fila['nombre'] . "</h2>";
        echo "<p>Precio: " . $fila['precio'] . "</p>";
        echo "<a href='carrito.php?id=" . $fila['id'] . "'>Añadir al carrito</a>";
        echo "</div>";
    }
    echo "<a href='ver_carrito.php'>Ver Carrito</a>";
    mysqli_close($conexion);
?>
