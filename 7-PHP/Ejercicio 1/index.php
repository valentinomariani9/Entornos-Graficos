<?php
// Iniciar sesión para mantener datos entre páginas
session_start();

$estilos_disponibles = [
    'estilo1' => 'Tema Oscuro',
    'estilo2' => 'Tema Claro',
    'estilo3' => 'Tema Azul'
];

$estilo_actual = $_SESSION['estilo_preferido'] ?? 'estilo1'; 


if (isset($_POST['estilo'])) {
    $estilo_seleccionado = $_POST['estilo'];
    if (array_key_exists($estilo_seleccionado, $estilos_disponibles)) {
        $_SESSION['estilo_preferido'] = $estilo_seleccionado;
        $estilo_actual = $estilo_seleccionado;
    }
}


if (isset($_SESSION['estilo_preferido']) && array_key_exists($_SESSION['estilo_preferido'], $estilos_disponibles)) {
    $estilo_actual = $_SESSION['estilo_preferido'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurador de Estilos</title>
   
    <link rel="stylesheet" href="estilos/<?php echo $estilo_actual; ?>.css">
</head>
<body>
    <div class="container">
        <h1>Configurador de Estilos</h1>
        
        <form method="POST" action="">
            <label for="estilo">Selecciona tu estilo preferido:</label>
            <select name="estilo" id="estilo">
                <?php foreach ($estilos_disponibles as $id => $nombre): ?>
                    <option value="<?php echo $id; ?>" <?php echo ($id == $estilo_actual) ? 'selected' : ''; ?>>
                        <?php echo $nombre; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" value="Aplicar Estilo">
        </form>
    </div>
</body>
</html>