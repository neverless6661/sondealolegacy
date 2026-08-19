<?php
date_default_timezone_set('America/Mexico_City');
require_once('Connections/conexion7.php');
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
$desde = date('Y-m-d');
$desde = $desde.' 05:00:00';
$hoy = date('Y-m-d');
$hasta = strtotime(' +1 day ', strtotime( $hoy ));
$hasta = date( 'Y-m-d' , $hasta );
$hasta = $hasta.' 05:00:00';

$conexion = mysqli_connect($hostname,$username,$password,$database);

$sql = "SELECT AVG(encuesta_prom) as 'promedio' FROM promedios_encuestas WHERE sucursal_prom = '$sucursal' AND fecha_reg BETWEEN '$desde' AND '$hasta'";
$result = mysqli_query($conexion, $sql);

//echo 'INSTRUCCION SQL: '.$sql.'<br>';

$row = mysqli_fetch_row($result);

$calif = $row[0];

if($calif == ''){
	$calif = "0";
}

// echo 'Promedio: '.$calif.'<br>';

echo "[".json_encode($calif)."]";

?>