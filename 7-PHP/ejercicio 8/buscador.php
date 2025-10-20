<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Canciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        
        h1 {
            color: #333;
            text-align: center;
        }
        
        .buscador {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        .resultados {
            margin-top: 20px;
        }
        
        .cancion {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .no-resultados {
            color: #ff0000;
            font-style: italic;
        }
        
        .info {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Buscador de Canciones</h1>
    
    <div class="buscador">
        <form action="" method="post">
            <div class="form-group">
                <label for="busqueda">Buscar canción:</label>
                <input type="text" id="busqueda" name="busqueda" 
                       placeholder="Ingresa nombre de canción o artista" 
                       value="<?php echo isset($_POST['busqueda']) ? htmlspecialchars($_POST['busqueda']) : ''; ?>">
            </div>
            <button type="submit">Buscar</button>
        </form>
        
        <?php
        // Procesamiento de la búsqueda
        if(isset($_POST['busqueda'])) {
            
            include 'conexion.php';
            
            
            $busqueda = mysqli_real_escape_string($conexion, $_POST['busqueda']);
            
           
            $sql = "SELECT * FROM buscador WHERE canciones LIKE '%$busqueda%'";
            $resultado = mysqli_query($conexion, $sql);
            
            
            if(mysqli_num_rows($resultado) > 0) {
                echo "<div class='resultados'>";
                echo "<h3>Resultados de la búsqueda:</h3>";
                
                while($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<div class='cancion'>" . htmlspecialchars($fila['canciones']) . "</div>";
                }
                
                echo "</div>";
            } else {
                echo "<div class='resultados'>";
                echo "<p class='no-resultados'>No se encontraron canciones que coincidan con tu búsqueda.</p>";
                echo "</div>";
            }
            
           
            mysqli_close($conexion);
        }
        ?>
        
        <div class="info">
            <p>Este buscador permite encontrar canciones por nombre o artista en nuestra base de datos.</p>
            <p>Puedes ingresar palabras completas o parciales para realizar la búsqueda.</p>
        </div>
    </div>
</body>
</html>