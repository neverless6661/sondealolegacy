<?php
require_once('Connections/conexion7.php');
//include('functions.php');
$folio = $_GET['folio'];
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];

//$estado = array();

/*
if($resultset=getSQLResultSet("SELECT estado FROM estadomsj WHERE identificador='$identificador' AND sucursal='$sucursal'")){
	while($row['estado'] = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}
*/	

$conexion = mysqli_connect($hostname,$username,$password,$database);

$sql = "SELECT folio,promocion,estado,ruta FROM promocion WHERE folio='$folio' AND identificador='$identificador' AND sucursal='$sucursal'";
//echo 'Query: '.$sql.'<br>';
$result = mysqli_query($conexion, $sql);
while($row = mysqli_fetch_object($result)){
	$estado=$row;
	}
	echo json_encode($estado);	

?>