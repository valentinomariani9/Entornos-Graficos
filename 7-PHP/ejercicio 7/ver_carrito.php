<?php

    session_start();
    echo "<h1>Carrito de Compras</h1>";
    if (empty($_SESSION['carrito'])) {
        echo "<p>El carrito está vacío.</p>";
    } else {
        echo "<ul>";
        foreach ($_SESSION['carrito'] as $producto) {
            echo "<li>Producto ID: " . htmlspecialchars($producto) . "</li>";
        }
        echo "</ul>";
    }

    echo "<a href='catalogo.php'>Volver al catálogo</a>";
?>