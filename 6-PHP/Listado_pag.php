
<html>
    <head>
    <title> Listado Paginado </title>
    </head>
        <body>
        <?php
            $cantidad_ciudades_por_pagina = 5;
            $pagina_actual = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;

            if (!$pagina_actual) {
                $inicio = 0;
                $pagina_actual=1;
            }
            else {
                $inicio = ($pagina_actual - 1) * $cantidad_ciudades_por_pagina;
            }// total de páginas
            include("conexion.php");
            $vSql = "SELECT * FROM Ciudades";
            $vResultado = mysqli_query($link, $vSql);
            $total_registros=mysqli_num_rows($vResultado);
            $total_paginas = ceil($total_registros / $cantidad_ciudades_por_pagina);
            echo "Numero de registros encontrados: " . $total_registros . "<br>";
            echo "Se muestran paginas de " . $cantidad_ciudades_por_pagina . " registros cada una<br>";
            echo "Mostrando la pagina " . $pagina_actual . " de " . $total_paginas . "<p>";
            mysqli_free_result($vResultado);

            $vSql = "SELECT * FROM Ciudades LIMIT $inicio, $cantidad_ciudades_por_pagina";
            $vResultado = mysqli_query($link, $vSql);
            $total_registros_pag=mysqli_num_rows($vResultado);
        
            echo "Numero de registros encontrados en la pagina actual: " . $total_registros_pag . "<br>";

        ?>
        <table border="1" style="border-collapse: collapse;">
            <tr bgcolor="#CCCCCC">
                <td><b>Ciudad</b></td>
                <td><b>País</b></td>
                <td><b>Habitantes</b></td>
                <td><b>Superficie</b></td>
                <td><b>Tiene Metro</b></td>
            </tr>
            <?php
            while ($fila = mysqli_fetch_array($vResultado))
            {
                ?>
                <tr>
                    <td><?php echo ($fila['ciudad']); ?></td>
                    <td><?php echo ($fila['pais']); ?></td>
                    <td><?php echo ($fila['habitantes']); ?></td>
                    <td><?php echo ($fila['superficie']); ?></td>
                    <td><?php echo ($fila['tieneMetro'] ? 'Sí' : 'No'); ?></td>
                </tr>
                <tr>
                    <td colspan="5">
                    <?php
            }
                ?>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <?php
            if ($total_registros > $cantidad_ciudades_por_pagina) {
                if ($pagina_actual > 1) {
                    echo "<a href='Listado_pag.php?pagina=".($pagina_actual-1)."'>Anterior</a> ";
                }
                for ($i=1; $i<=$total_paginas; $i++) {
                    if ($pagina_actual == $i) {
                        echo $pagina_actual . " ";
                    } else {
                        echo "<a href='Listado_pag.php?pagina=".$i."'>".$i."</a> ";
                    }
                }
                if ($pagina_actual < $total_paginas) {
                    echo "<a href='Listado_pag.php?pagina=".($pagina_actual+1)."'>Siguiente</a> ";
                }
            }
            mysqli_free_result($vResultado);
            mysqli_close($link);
        ?>
        <p align="center"><a href="ejercicio2.php">Volver al menu; del ABM</a></p>
        </body>
</html>