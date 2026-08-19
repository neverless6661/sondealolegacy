<?php
include('functions.php');
//$idusr = $_GET['idusr'];
$ticket = $_GET['ticket'];
$mesero = $_GET['mesero'];
$mesa = $_GET['mesa'];
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
$estado = $_GET['estado'];

ejecutarSQLCommand("INSERT INTO tickets(
ticket,
mesero,
mesa,
identificador,
sucursal,
estado) 
VALUES(
'$ticket',
'$mesero',
'$mesa',
'$identificador',
'$sucursal',
'$estado')");
?>