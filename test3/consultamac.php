<?php
//include('functions.php');
require_once('Connections/conexion7.php');
//$idusr = $_GET["idusr"];
$usuario = $_GET['usuario'];
$password1 = $_GET['password1'];

/*
if($resultset=getSQLResultSet("SELECT usuario,password1,tipousr,identificador,activado,sucursal FROM usuarios WHERE usuario='$usuario' AND password1='$password1'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}
*/

$conexion = mysqli_connect($hostname,$username,$password,$database);		

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password1='$password1'";
$result = mysqli_query($conexion, $sql);
while($row = mysqli_fetch_object($result)){
	$mensaje=$row;
    //$mensajenew=$mensajenew.$mensaje;
  // $mensajet = json_encode($mensaje);
    // $mensajenew = $mensajenew.$mensajet;
    echo json_encode($mensaje);
	}

?>