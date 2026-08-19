<?php
include('functions.php');
//require_once('Connections/conexion.php');
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
$mensaje = array();


if($resultset=getSQLResultSet("SELECT mensaje FROM mensajes WHERE identificador='$identificador' AND sucursal='$sucursal' ORDER BY id DESC LIMIT 50")){
	
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		
		echo json_encode($row);
	  // $mensaje[]=$row;
		
		}
		
	//echo json_encode($mensaje);	
	}

	
/*	
mysql_connect($hostname, $username, $password);
mysql_select_db($database);		

$sql = "SELECT mensaje FROM mensajes WHERE identificador='$identificador' AND sucursal='$sucursal'";
$result = mysql_query($sql);
while($row = mysql_fetch_object($result)){
	$mensaje[]=$row;
	}
	echo json_encode($mensaje);	
*/	
	
?>