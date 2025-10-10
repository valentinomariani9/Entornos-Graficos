Ejercicio 1
<?php 
function doble($i) { 
    return $i*2; 
} 
$a = TRUE;    
$b = "xyz";    
$c = 'xyz';   
$d = 12;      
echo gettype($a);   
echo gettype($b);    
echo gettype($c); 
echo gettype($d);  
if (is_int($d)) { 
    $d += 4; 
} 
if (is_string($a)) { 
    echo "Cadena: $a"; 
} 
$d = $a ? ++$d : $d*3; 
$f = doble($d++); 
$g = $f += 10; 
echo $a, $b, $c, $d, $f , $g; 
?>  

Ejercicio 2
a
<?php 
$matriz = array("x" => "bar", 12 => true); 
echo $matriz["x"];  
echo $matriz[12];      
?> 
b
<?php 
$matriz = array("unamatriz" => array(6 => 5, 13 => 9, "a" => 42)); 
echo $matriz["unamatriz"][6];      
echo $matriz["unamatriz"][13];    
echo $matriz["unamatriz"]["a"];  
?>

c
<?php 
$matriz = array(5 => 1, 12 => 2); 
$matriz[] = 56;      
$matriz["x"] = 42;  unset($matriz[5]);  unset($matriz);  
?> 

Ejercicio 3
a
<?php 
$fun = getdate(); 
echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds] 
segundos, del $fun[mday]/$fun[mon]/$fun[year]"; 
?> 
b
<?php 
function sumar($sumando1,$sumando2){  
  $suma=$sumando1+$sumando2;   
  echo $sumando1."+".$sumando2."=".$suma;  
}  
sumar(5,6); 
?> 