<?php ob_start();
require_once('Connections/conexion.php'); 
if (!isset($_SESSION)) {
  session_start();
  isset($_SESSION['MM_Identi']);
  $identificador = $_SESSION['MM_Identi'];
}

$folio=$_POST['folio'];
$sucursal = $_POST['sucursal'];

mysql_connect($hostname,$username,$password);
mysql_select_db($database);
mysql_query("UPDATE promocion SET estado='inactivo', meserocanje='Administrador', mesacanje='Admin' WHERE folio=$folio AND identificador=$identificador AND sucursal='$sucursal'");


header("Location:promousada.php");

?>