<?php
header('Content-Type: application/json;');
include 'conexionN1.php';

$sucursal = $_GET['sucursal'];

$query = "SELECT comentarios FROM calificaciones WHERE sucursal = '$sucursal' AND comentarios != '\"\"' AND comentarios != '\".\"' AND comentarios != '\"..\"' ORDER BY id DESC LIMIT 3";
$resultado = $conexion-> query($query);

//echo 'Query: '.$query.'<br>';

$arreglo_comentarios = array();

while ($fila = $resultado -> fetch_object()) {

	//$array[] = str_replace("\"","",array_map('utf8_encode', $fila));
	$replaced = preg_replace("/\\\\u([0-9A-F]{1,4})/i", "&#x$1;", $fila->comentarios);
	$result = mb_convert_encoding($replaced, "UTF-16", "HTML-ENTITIES");
	$result = mb_convert_encoding($result, 'utf-8', 'utf-16');

	array_push($arreglo_comentarios, array('comentarios' => $result));
}

echo json_encode($arreglo_comentarios);
$resultado -> close();

?>