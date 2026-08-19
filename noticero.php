<?php
include('functions.php');
//$idusr = $_GET['idusr'];
$token = $_GET['token'];
$sucursal = $_GET['sucursal'];

ejecutarSQLCommand("UPDATE notificaciones SET badge = 0 WHERE token = '$token' AND sucursal = '$sucursal'");
?>