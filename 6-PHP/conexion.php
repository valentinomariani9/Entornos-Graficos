<?php
    $link = mysqli_connect("localhost", "root", "root", "capitales") or die ("Problemas de conexión a la base de
    datos");
    mysqli_select_db($link, "capitales");
?>