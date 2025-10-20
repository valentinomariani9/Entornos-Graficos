<?php
session_start();

setcookie('preferencia_titular', '', time() - 3600, "/");
header('Location: ejercicio4.php');
exit();
?>