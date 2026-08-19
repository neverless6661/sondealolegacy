<?php
include('functions.php');
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
$user = $_GET['user'];

if($resultset=getSQLResultSet("SELECT COUNT(usuario) FROM registros WHERE usuario='$user'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>