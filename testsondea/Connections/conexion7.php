<?php
//variables
$hostname = "34.55.77.19";
$database = "base1";
$username = "sondeadmin";
$password = "srk142536";

//Creamos conexión
$conexion = mysqli_connect($hostname,$username,$password,$database);



//error 
if (!$conexion) { echo mysqli_connect_error(); }

if ($resultado = mysqli_query($conexion, "SELECT usuario FROM registros WHERE usuario = 'admin'")) {
   // printf("La selección devolvió %d filas.\n", mysqli_num_rows($resultado));

    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
}

//Cerramos conexión
//mysqli_close($conexion);
?>