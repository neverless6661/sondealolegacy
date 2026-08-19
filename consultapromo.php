<?php
include('functions.php');
$id = $_GET['id'];
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
if($resultset=getSQLResultSet("SELECT nombre,ruta,valor2 FROM promoimagen WHERE valor1='$id' AND identificador='$identificador' AND sucursal='$sucursal'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row, JSON_UNESCAPED_UNICODE);
	}
}
?>