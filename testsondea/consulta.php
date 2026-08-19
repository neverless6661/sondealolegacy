<?php
include('functions.php');
//$idusr = $_GET["idusr"];
$usuario = $_GET['usuario'];
$password1 = $_GET['password1'];

if($resultset=getSQLResultSet("SELECT sucursal,pass,tipousr,identificador,activo,sucursal,lang_en FROM sucursales WHERE sucursal='$usuario' AND pass='$password1'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>