<?php
include('functions.php');
$mesero = $_GET['mesero'];
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];

if($resultset=getSQLResultSet("SELECT COUNT(nombre) FROM meseros1 WHERE nombre='$mesero' AND identificador='$identificador' AND sucursal='$sucursal'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
	}
}
?>