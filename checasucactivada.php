<?php

include('functions.php');

$sucursal = $_GET['sucursal'];

if($resultset=getSQLResultSet("SELECT activo FROM sucursales WHERE sucursal='$sucursal'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
	}
}

?>