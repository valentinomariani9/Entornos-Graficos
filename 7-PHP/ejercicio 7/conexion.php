<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "compras";

// Crear conexión
$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}