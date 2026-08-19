<?php
//include('functions.php');
require_once('Connections/conexion7.php');
$folio = $_GET['folio'];
$promocion = $_GET['promocion'];
$identificador = $_GET['identificador'];
$estado = 'activo';
$mesero = $_GET['mesero'];
$mesa = $_GET['mesa'];
$sucursal = $_GET['sucursal'];
$ruta = $_GET['ruta'];

$conexion = mysqli_connect($hostname,$username,$password,$database);

if($folio == 'null00'){
    $sql1 = "SELECT id FROM calificaciones WHERE identificador=$identificador AND sucursal='$sucursal' ORDER BY id DESC LIMIT 1";
    $result1 = mysqli_query($conexion, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $folb = $row1[0] ;
    $folb = $folb + 1;
    $folio = $folb;
}

//$sql2 = "INSERT INTO promocion(folio,promocion,identificador,estado,meserogenera,mesagenera,ruta,sucursal)VALUES('$folio','$promocion','$identificador','$estado','$mesero','$mesa','$ruta','$sucursal')";
//mysqli_query($conexion, $sql2);


//ejecutarSQLCommand("INSERT INTO promocion(folio,promocion,identificador,estado,meserogenera,mesagenera,ruta,sucursal)VALUES('$folio','$promocion','$identificador','$estado','$mesero','$mesa','$ruta','$sucursal')");

?>

