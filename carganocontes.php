<?php
include('functions.php');
//$idusr = $_GET['idusr'];

$nocontesta = $_GET['nocontesta'];
$fecha = date('Y-m-d');
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
$mesero = $_GET['mesero'];

ejecutarSQLCommand("INSERT INTO nocontestadas(cantidad,fecha,identificador,sucursal,meseros) VALUES('$nocontesta','$fecha','$identificador','$sucursal','$mesero')");







?>