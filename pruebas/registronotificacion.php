<?php
include('functions.php');

$identificador = $_GET['identificador'];
$mesero = $_GET['mesero'];
$mesa = $_GET['mesa'];

$folio = $_GET['folio'];
$color1 = $_GET['color1'];
$color2 = $_GET['color2'];
$color3 = $_GET['color3'];
$color4 = $_GET['color4'];
$color5 = $_GET['color5'];
$color6 = $_GET['color6'];
$color7 = $_GET['color7'];
$color8 = $_GET['color8'];
$color9 = $_GET['color9'];
$color10 = $_GET['color10'];
$pregunta1 = $_GET['pregunta1'];
$pregunta2 = $_GET['pregunta2'];
$pregunta3 = $_GET['pregunta3'];
$pregunta4 = $_GET['pregunta4'];
$pregunta5 = $_GET['pregunta5'];
$pregunta6 = $_GET['pregunta6'];
$pregunta7 = $_GET['pregunta7'];
$pregunta8 = $_GET['pregunta8'];
$pregunta9 = $_GET['pregunta9'];
$pregunta10 = $_GET['pregunta10'];
$eval1 = $_GET['eval1'];
$eval2 = $_GET['eval2'];
$eval3 = $_GET['eval3'];
$eval4 = $_GET['eval4'];
$eval5 = $_GET['eval5'];
$eval6 = $_GET['eval6'];
$eval7 = $_GET['eval7'];
$eval8 = $_GET['eval8'];
$eval9 = $_GET['eval9'];
$eval10 = $_GET['eval10'];
$correo = $_GET['correo'];
$comentarios = $_GET['comentarios'];
$sucursal = $_GET['sucursal'];
$activado = '1';
$fecha = date("D/M/Y g:i A");
$delimitador = '--';

$mensaje = '
%nCalificacion de encuesta recibida%n
Mesero: '.$mesero.'%n
Mesa: '.$mesa.'%n
Ticket: '.$folio.'%n
'.$pregunta1.': '.$eval1.'%n
'.$pregunta2.': '.$eval2.'%n
'.$pregunta3.': '.$eval3.'%n
'.$pregunta4.': '.$eval4.'%n
'.$pregunta5.': '.$eval5.'%n
'.$pregunta6.': '.$eval6.'%n
'.$pregunta8.': '.$eval8.'%n
'.$pregunta9.': '.$eval9.'%n
'.$pregunta10.': '.$eval10.'%n
Correo: '.$correo.'%n
Comentarios: '.$comentarios.'%n%n%n'.$fecha.'%n'.$delimitador;

ejecutarSQLCommand("INSERT INTO mensajes(identificador,sucursal,activado,mensaje) 
VALUES('$identificador','$sucursal','$activado','$mensaje')");
?>