<?php
include('functions.php');
//$idusr = $_GET["idusr"];
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
$id = $_GET['id'];

if($resultset=getSQLResultSet("SELECT textos FROM cuestionario WHERE identificador='$identificador' AND sucursal='$sucursal' AND id='$id'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>