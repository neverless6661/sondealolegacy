<?php

include('functions.php');

$folio = $_GET['folio'];
$identificador = $_GET['identificador'];
$mesero = $_GET['mesero'];
$mesa = $_GET['mesa'];
$sucursal = $_GET['sucursal'];

if($resultset=getSQLResultSet("UPDATE promocion SET estado='inactivo',meserocanje='$mesero',mesacanje='$mesa' WHERE folio='$folio' AND identificador='$identificador'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>