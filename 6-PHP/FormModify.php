<?php

    if(isset($_GET['ciudad'])) {
        $vCiudad = $_GET['ciudad'];
        include("conexion.php");
        $vSql = "SELECT * FROM ciudades WHERE ciudad='$vCiudad'";
        $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
        if ($fila = mysqli_fetch_assoc($vResultado)) {
            $vPais = $fila['pais'];
            $vHabitantes = $fila['habitantes'];
            $vSuperficie = $fila['superficie'];
            $vTieneMetro = $fila['tieneMetro'];
            mysqli_free_result($vResultado);
            mysqli_close($link);
        } else {
            echo ("La ciudad no Existe<br>");
            echo ("<A href='ejercicio2.php'>VOLVER AL ABM</A>");
            mysqli_free_result($vResultado);
            mysqli_close($link);
            exit();
        }
    } 

    if(isset($_POST['Submit'])) {
        $vCiudad = $_POST['Ciudad'];
        $vPais = $_POST['Pais'];
        $vHabitantes = $_POST['Habitantes'];
        $vSuperficie = $_POST['Superficie'];
        $vTieneMetro = isset($_POST['TieneMetro']) ? 1 : 0;
        include("conexion.php");
        $vSql = "UPDATE ciudades SET pais='$vPais', habitantes='$vHabitantes', superficie='$vSuperficie', tieneMetro='$vTieneMetro' WHERE ciudad='$vCiudad'";
        mysqli_query($link, $vSql) or die (mysqli_error($link));
        echo("La ciudad fue Modificada<br>");
        echo ("<A href='ejercicio2.php'>VOLVER AL MENU</A>");
        mysqli_close($link);
        exit();
    }

?>

<html>
    <head>
    <title>Modificar Ciudad</title>
    </head>
    <body bgcolor="#FFFFFF" text="#000000">
        <form action="" method="POST" name="FormModi">
            <table>
                <tr>
                    <td> Ciudad:</td>
                    <td> <input type="TEXT" name="Ciudad" size="20" maxlength="40"
                    value="<?php echo htmlspecialchars($vCiudad); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td> Pais:</td>
                    <td> <input type="text" name="Pais" size="20" maxlength="40" value="<?php echo htmlspecialchars($vPais); ?>"> </TD>
                </tr>
                <tr>
                    <td> Habitantes: </TD>
                    <TD> <input type="number" name="Habitantes" size="20" value="<?php echo htmlspecialchars($vHabitantes); ?>"> </TD>
                </tr>
                <tr>
                    <td> Superficie: </TD>
                    <TD> <INPUT TYPE="number" name="Superficie" size="20" value="<?php echo htmlspecialchars($vSuperficie); ?>"> </TD>
                </tr>
                <tr>
                    <td>TieneMetro:</TD>
                    <TD> <INPUT TYPE="CHECKBOX" name="TieneMetro" value="1" <?php if($vTieneMetro) echo "checked"; ?>> </TD>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                    <input type="SUBMIT" name="Submit" value="Modificar">
                    <p><a href="ejercicio2.php">Volver al men&uacute; del ABM</a></p>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>