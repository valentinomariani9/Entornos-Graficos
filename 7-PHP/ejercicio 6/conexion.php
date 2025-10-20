<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "base2";

// Crear conexión
$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}