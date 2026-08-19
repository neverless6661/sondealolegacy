<?php
include('functions.php');
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
if($resultset=getSQLResultSet("SELECT estado FROM estadomsj WHERE identificador='$identificador' AND sucursal='$sucursal'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}
?>