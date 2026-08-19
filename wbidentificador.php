<?php
include('functions.php');
$usuario = $_GET['usuario'];

if($resultset=getSQLResultSet("SELECT identificador FROM registros WHERE usuario='$usuario'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}
?>