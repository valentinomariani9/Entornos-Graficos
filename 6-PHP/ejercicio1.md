Consulta a una base de datos: Para comenzar la comunicación con un servidor de base de datos MySQL, es necesario abrir una conexión a ese servidor. Para inicializar esta conexión, PHP ofrece la función:
- mysqli_connect()
 
Todos sus parámetros son opcionales, pero hay tres de ellos que generalmente son necesarios:
- el nombre del host, el nombre de usuario y la contraseña.

Una vez abierta la conexión, se debe seleccionar una base de datos para su uso, mediante la función
- mysqli_select_db()

Esta función debe pasar como parámetro
- el identificador de la conexión (enlace) y el nombre de la base de datos a seleccionar.

La función mysqli_query () se utiliza para
- ejecutar una consulta SQL en la base de datos 

y requiere como parámetros
- el enlace de conexión y la sentencia SQL (por ejemplo: mysqli_query($link, $sql)).

La cláusula or die() se utiliza para
- detener la ejecución del script y mostrar un mensaje de error si la operación anterior falla.

y la función mysqli_error () se puede usar para
- obtener el mensaje de error detallado devuelto por MySQL (por ejemplo: mysqli_error($link)) y así mostrar la razón del fallo.
