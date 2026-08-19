<?php
require_once('Connections/conexion7.php');
$cookie = $_GET['cookie'];
$sucursal = $_GET['sucursal'];
$identificador = $_GET['identificador'];
$folio = $_GET['folio'];
$vendedor = $_GET['vendedor'];
$cliente = $_GET['cliente'];
$repartidor = $_GET['repartidor'];
$clave = $_GET['clave'];
//$clave = md5($sucursal.$cookie);
//$clave2 = $sucursal.$cookie;

$conexion = mysqli_connect($hostname,$username,$password,$database);

$query = "SELECT identificador FROM sucursales WHERE sucursal = '$sucursal'";
echo 'Query: '.$query.'<br>';
$result = mysqli_query($conexion,$query);
$row = mysqli_fetch_row($result);
$identificador = $row[0];


mysqli_query($conexion,"INSERT INTO estadoencuesta(cookie,estado,sucursal) VALUES('$cookie','activo','$sucursal')");

mysqli_query($conexion,"INSERT INTO estadoencuestaPrueba(cookie,estado,identificador,sucursal,folio,vendedor,cliente,repartidor,clave) VALUES('$cookie','activo',$identificador,'$sucursal','$folio','$vendedor','$cliente','$repartidor','$clave')");
/*
if($resultset=getSQLResultSet("INSERT INTO estadoencuesta(cookie,estado,sucursal) VALUES('$cookie','activo','$sucursal')")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	} */
$sql1 = "INSERT INTO estadoencuesta(cookie,estado,sucursal) VALUES('$cookie','activo','$sucursal')";	
$sql2 = "INSERT INTO estadoencuestaPrueba(cookie,estado,identificador,sucursal,clave) VALUES('$cookie','activo',$identificador,'$sucursal','$clave')";
echo 'SQL1: '.$sql1.'<br>';
echo 'SQL2: '.$sql2.'<br>';
//echo 'Clave: '.$clave2;
?>