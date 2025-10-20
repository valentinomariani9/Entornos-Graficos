<html>
    <head>
    <title>Alta de ciudades</title>
    </head>
    <body>
        <FORM action="" method="POST" name="FormAlta">
        <TABLE width="225">
            <TR>
                <TD> Ciudad:</TD>
                <TD> <input type="TEXT" name="Ciudad" size="20" maxlength="40">
            </TR>
            <TR>
                <TD> Pais:</TD>
                <TD> <input type="text" name="Pais" size="20" maxlength="40"> </TD>
            </TR>
            <TR>
                <TD> Habitantes: </TD>
                <TD> <input type="number" name="Habitantes" size="20"></TD>
            </TR>
            <TR>
                <TD> Superficie: </TD>
                <TD> <INPUT TYPE="number" name="Superficie" size="20"> </TD>
            </TR>
            <TR>
                <TD>TieneMetro:</TD>
                <TD> <INPUT TYPE="CHECKBOX" name="TieneMetro" value="1"> </TD>
            </TR>
            <TR>
                <TD colspan="2" align="center"> <INPUT TYPE="SUBMIT" name="Submit"
                value="Agregar">
                <p><a href="ejercicio2.php">Volver al menu; del ABM</a></p>
                </TD>
            </TR>
        </TABLE>
        </FORM>
    </body>
</html>

<?php
    include("conexion.php");
    //Captura datos desde el Form anterior
    if(isset($_POST['Submit'])) {
        $vCiudad = $_POST['Ciudad'];
        $vPais = $_POST['Pais'];
        $vHabitantes = $_POST['Habitantes'];
        $vSuperficie = $_POST['Superficie'];
        $vTieneMetro = isset($_POST['TieneMetro']) ? 1 : 0;
        //Arma la instrucción SQL y luego la ejecuta
        $vSql = "SELECT Count(ciudad) as canti FROM ciudades WHERE ciudad='$vCiudad'";
        $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
        $vCantiCiudades = mysqli_fetch_assoc($vResultado);
        if ($vCantiCiudades ['canti']!=0){
        echo ("La ciudad ya Existe<br>");
        echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
        }
        else {
        $vSql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
        values ('$vCiudad','$vPais', '$vHabitantes', '$vSuperficie', '$vTieneMetro')";
        mysqli_query($link, $vSql) or die (mysqli_error($link));
        echo("<La ciudad fue Registrada<br>");
        echo ("<A href='ejercicio2.php'>VOLVER AL MENU</A>");
        // Liberar conjunto de resultados
        mysqli_free_result($vResultado);
        }
        // Cerrar la conexion
        mysqli_close($link);
    }
   
?>