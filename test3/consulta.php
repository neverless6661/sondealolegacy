<?php
include('functions.php');
//$idusr = $_GET["idusr"];
$usuario = $_GET['usuario'];
$password1 = $_GET['password1'];

if($resultset=getSQLResultSet("SELECT usuario,password1,tipousr,identificador,activado,sucursal,facultad1,facultad2,facultad3,facultad4,facultad5,facultad6,facultad7,facultad8,facultad9,facultad10,poder FROM usuarios WHERE usuario='$usuario' AND password1='$password1'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>