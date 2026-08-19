<?php
include('functions.php');
//$idusr = $_GET["idusr"];
//$usuario = $_GET['usuario'];
$correo = $_GET['correo'];
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];

if($resultset=getSQLResultSet("SELECT valor1,valor2,valor3,valor4,valor5 FROM correos WHERE identificador='$identificador' AND sucursal='$sucursal'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>