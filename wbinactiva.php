<?php
require_once('Connections/conexion7.php');

$identificador = $_GET['identificador'];
$estado = $_GET['estado'];

$conexion = mysqli_connect("34.55.77.19","sondeadmin","srk142536","base1");

mysqli_query($conexion, "UPDATE sucursales SET activo='$estado' WHERE identificador=$identificador");
mysqli_query($conexion, "UPDATE meseros1 SET activado='$estado' WHERE identificador=$identificador");

?>