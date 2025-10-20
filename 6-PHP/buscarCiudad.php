<html>
    <head>
    <title>Modificar Ciudad</title>
    </head>
    <body bgcolor="#FFFFFF" text="#000000">
        <form action="" method="POST" name="buscarForm">
            <table>
                <tr>
                    <td> Ciudad a modificar : </td>
                    <td>
                    <input type="TEXT" name="Ciudad" size="20" maxlength="40">
                    </td>
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

<?php
    function ciudad_existe($ciudad){
        include("conexion.php");
        $vSql = "SELECT Count(ciudad) as canti FROM ciudades WHERE ciudad='$ciudad'";
        $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
        $vCantiCiudades = mysqli_fetch_assoc($vResultado);
        mysqli_free_result($vResultado);
        mysqli_close($link);
        return $vCantiCiudades == 0 ? false : true;
    }

    //Captura datos desde el Form
    if(isset($_POST['Submit'])) {
        $vCiudad = $_POST['Ciudad'];
        if (ciudad_existe($vCiudad)){
            header("Location: FormModify.php?ciudad=$vCiudad");
            exit();
        } else {
            echo ("La ciudad no Existe<br>");
            echo ("<A href='ejercicio2.php'>VOLVER AL ABM</A>");
        }
    }
  
?>