<?php
while ($fila = mysqli_fetch_array($vResultado))
{
?>
<tr>
 <td><?php echo ($fila[0]); ?></td>
 <td><?php echo ($fila[1]); ?></td>
 <td><?php echo ($fila[2']); ?></td>
</tr>
<tr>
 <td colspan="5">
<?php
}
mysqli_free_result($vResultado);
mysqli_close($link);
?>

while ($fila = mysqli_fetch_array($vResultado)) → itera cada fila del conjunto de resultados ($vResultado) retornado por una consulta mysqli.
Dentro del bucle se imprime una fila (<tr>) con tres celdas (<td>) mostrando los campos $fila[0], $fila[1], $fila[2].
Después del bucle se libera la memoria del resultado con mysqli_free_result($vResultado) y se cierra la conexión con mysqli_close($link).