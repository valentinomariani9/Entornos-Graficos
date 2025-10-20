<?php
session_start();

$titulares = [
    'politica' => [
        'El gobierno anuncia nuevas medidas económicas',
        'Acuerdo entre partidos para reforma constitucional',
        'Resultados de las elecciones regionales'
    ],
    'economica' => [
        'El banco central reduce las tasas de interés',
        'Crecimiento económico del último trimestre',
        'Nuevos acuerdos comerciales firmados'
    ],
    'deportiva' => [
        'La selección nacional logra clasificarse',
        'Récord en el campeonato de atletismo',
        'El equipo local consigue otra victoria'
    ]
];


$preferencia = '';


if (isset($_POST['preferencia'])) {
    $preferencia = $_POST['preferencia'];
    
    setcookie('preferencia_titular', $preferencia, time() + (86400 * 30), "/");
}
elseif (isset($_COOKIE['preferencia_titular'])) {
    $preferencia = $_COOKIE['preferencia_titular'];
}
else {
    $preferencia = 'todas';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódico Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        h1 {
            text-align: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        
        form {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
        }
        
        label {
            margin-right: 15px;
        }
        
        .titulares {
            margin-top: 20px;
        }
        
        .seccion {
            margin-bottom: 15px;
        }
        
        .titulo-seccion {
            font-weight: bold;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        
        .politica {
            color: #d00;
        }
        
        .economica {
            color: #070;
        }
        
        .deportiva {
            color: #00d;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Periódico Online</h1>
    
    <form action="" method="POST">
        <p>Selecciona el tipo de noticias que prefieres ver:</p>
        
        <input type="radio" id="politica" name="preferencia" value="politica" 
               <?php echo ($preferencia == 'politica') ? 'checked' : ''; ?>>
        <label for="politica">Noticias Políticas</label>
        
        <input type="radio" id="economica" name="preferencia" value="economica" 
               <?php echo ($preferencia == 'economica') ? 'checked' : ''; ?>>
        <label for="economica">Noticias Económicas</label>
        
        <input type="radio" id="deportiva" name="preferencia" value="deportiva" 
               <?php echo ($preferencia == 'deportiva') ? 'checked' : ''; ?>>
        <label for="deportiva">Noticias Deportivas</label>
        
        <p><input type="submit" value="Aplicar preferencia"></p>
    </form>
    
    <div class="titulares">
        <?php
        if ($preferencia == 'todas' || $preferencia == 'politica') {
            echo '<div class="seccion">';
            echo '<p class="titulo-seccion politica">Política</p>';
            foreach ($titulares['politica'] as $titular) {
                echo '<p>- ' . $titular . '</p>';
            }
            echo '</div>';
        }
        
        if ($preferencia == 'todas' || $preferencia == 'economica') {
            echo '<div class="seccion">';
            echo '<p class="titulo-seccion economica">Economía</p>';
            foreach ($titulares['economica'] as $titular) {
                echo '<p>- ' . $titular . '</p>';
            }
            echo '</div>';
        }
        
        if ($preferencia == 'todas' || $preferencia == 'deportiva') {
            echo '<div class="seccion">';
            echo '<p class="titulo-seccion deportiva">Deportes</p>';
            foreach ($titulares['deportiva'] as $titular) {
                echo '<p>- ' . $titular . '</p>';
            }
            echo '</div>';
        }
        ?>
    </div>
    
    <div class="footer">
        <p>
            <a href="borrarPreferencia.php">Borrar preferencia de titulares</a>
        </p>
    </div>
</body>
</html>
