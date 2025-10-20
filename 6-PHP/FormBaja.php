<html>
    <head>
    <title>Baja de Ciudades</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>
    <body bgcolor="#FFFFFF" text="#000000">
        <form action="" method="POST" name="FormBajaIni">
            <table>
            <tr>
                <td> Ciudad a dar de baja: </td>
                <td>
                <input type="TEXT" name="Ciudad" size="20" maxlength="40">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <input type="SUBMIT" name="Submit" value="Borrar">
                <p><a href="ejercicio2.php">Volver al men&uacute; del ABM</a></p>
                </td>
            </tr>
            </table>
        </form>
    </body>
</html>

<?php
    include("conexion.php");
    //Captura datos desde el Form anterior
    if(isset($_POST['Submit'])) {
        $vCiudad = $_POST['Ciudad'];
        //Arma la instrucción SQL y luego la ejecuta
        $vSql = "SELECT Count(ciudad) as canti FROM ciudades WHERE ciudad='$vCiudad'";
        $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
        $vCantiCiudades = mysqli_fetch_assoc($vResultado);
        if ($vCantiCiudades ['canti']==0){
        echo ("La ciudad no Existe<br>");
        echo ("<A href='ejercicio2.php'>VOLVER AL ABM</A>");
        }
        else {
        $vSql = "DELETE FROM ciudades WHERE ciudad='$vCiudad'";
        mysqli_query($link, $vSql) or die (mysqli_error($link));
        echo("La ciudad fue Borrada<br>");
        echo ("<A href='ejercicio2.php'>VOLVER AL MENU</A>");
        // Liberar conjunto de resultados
        mysqli_free_result($vResultado);
        }
    }
    //Cerrar la conexion
    mysqli_close($link);
?>