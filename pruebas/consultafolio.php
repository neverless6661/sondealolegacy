<?php
include('functions.php');
$folio = $_GET['folio'];
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];

if($resultset=getSQLResultSet("SELECT folio,promocion,estado,ruta FROM promocion WHERE folio='$folio' AND identificador='$identificador' AND sucursal='$sucursal'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>