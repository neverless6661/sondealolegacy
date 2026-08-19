<?php

include('functions.php');

$id = $_GET['id'];
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];

if($resultset=getSQLResultSet("SELECT valor FROM cuestionario WHERE id='$id' AND identificador='$identificador' AND sucursal='$sucursal'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>