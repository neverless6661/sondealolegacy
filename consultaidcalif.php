<?php

include('functions.php');

$id = $_GET['id'];
$identificador = $_GET['identificador'];

if($resultset=getSQLResultSet("SELECT MAX(id) FROM calificaciones WHERE identificador='$identificador'")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}

?>