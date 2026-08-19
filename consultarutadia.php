<?php

include('functions.php');

$id = $_GET['id'];
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];

if($resultset=getSQLResultSet("SELECT ruta FROM promodia WHERE identificador='$identificador' AND sucursal='$sucursal' AND valor1=$id")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>