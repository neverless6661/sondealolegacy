<?php
date_default_timezone_set('America/Mazatlan');
include 'functions.php';
//$idusr = $_GET['idusr'];
$folio  = $_GET['folio'];
$mesa   = $_GET['mesa'];
$mesero = $_GET['mesero'];
$p1     = $_GET['p1'];
$p2     = $_GET['p2'];
$p3     = $_GET['p3'];
$p4     = $_GET['p4'];
$p5     = $_GET['p5'];
$p6     = $_GET['p6'];
$p7     = $_GET['p7'];
$p8     = $_GET['p8'];
$p9     = $_GET['p9'];
$p10    = $_GET['p10'];

//$tipousr = $_GET['tipousr'];
$comentarios = $_GET['comentarios'];
$hoy         = date("Y-m-d g:i a");
$hoy2        = date("Y-m-d");
$correo      = $_GET['correo'];
//$correo = str_replace(",","",$correo);
$eval1         = $_GET[eval1];
$eval2         = $_GET[eval2];
$eval3         = $_GET[eval3];
$eval4         = $_GET[eval4];
$eval5         = $_GET[eval5];
$eval6         = $_GET[eval6];
$eval7         = $_GET[eval7];
$eval8         = $_GET[eval8];
$eval9         = $_GET[eval9];
$eval10        = $_GET[eval10];
$identificador = $_GET['identificador'];
$sucursal      = $_GET['sucursal'];
$cliente       = $_GET['cliente'];
$repartidor    = $_GET['repartidor'];


/*informacion adicional capturada vendedor(bernini)*/

$fv1 = isset($_GET['fv1']) ? trim( $_GET['fv1'] ) : '';
$fv2 = isset($_GET['fv2']) ? trim( $_GET['fv2'] ) : '';
$fv3 = isset($_GET['fv3']) ? trim( $_GET['fv3'] ) : '';
$fv4 = isset($_GET['fv4']) ? trim( $_GET['fv4'] ) : '';
$fv5 = isset($_GET['fv5']) ? trim( $_GET['fv5'] ) : '';

/*------------------------*/




$comentarios = json_encode($comentarios);

$cadena2 = '';

for ($i = 0; $i < strlen($comentarios); $i++) {
	if ($comentarios[$i] == '\\') {
		$cadena2 .= '\\' . $comentarios[$i];
	} else {

		$cadena2 .= $comentarios[$i];
	}
}

$comentarios = $cadena2;
$conexion    = mysqli_connect("35.194.11.126", "usrsondealo", "srk142536", "base1");

$sqlte    = "SELECT tipousr FROM sucursales WHERE identificador=$identificador AND sucursal='$sucursal'";
$resultte = mysqli_query($conexion, $sqlte);
$rowte    = mysqli_fetch_array($resultte);
$tipo     = $rowte[0];

$sqlchk = "SELECT * FROM calificaciones WHERE folio='$folio' AND mesa='$mesa' AND mesero='$mesero' AND p1='$p1' AND p2='$p2' AND p3='$p3' AND p4='$p4' AND p5='$p5' AND p6='$p6' AND p7='$p7' AND recomen='$p8' AND p9='$p9' AND p10='$p10' AND comentarios='$comentarios' AND correo='$correo' AND identificador='$identificador' AND sucursal='$sucursal' AND fecha2='$hoy2'";
echo 'Query: ' . $sqlchk . '<br>';
$resultchk = mysqli_query($conexion, $sqlchk);
$fila      = mysqli_num_rows($resultchk);
echo 'fila: ' . $fila . '<br>';

if ($fila != 0 && $tipo == 2) {
	echo 'El registro ya se encuentra';
} else {
	ejecutarSQLCommand("INSERT INTO calificaciones(
		folio,
		mesa,
		mesero,
		cliente,
		repartidor,
		p1,
		p2,
		p3,
		p4,
		p5,
		p6,
		p7,
		recomen,
		p9,
		p10,
		comentarios,
		fecha,
		fecha2,
		correo,
		eval,
		eval2,
		eval3,
		eval4,
		eval5,
		eval6,
		eval7,
		eval8,
		eval9,
		eval10,
		identificador,
		sucursal)
		VALUES(
		'$folio',
		'$mesa',
		'$mesero',
		'$cliente',
		'$repartidor',
		'$p1',
		'$p2',
		'$p3',
		'$p4',
		'$p5',
		'$p6',
		'$p7',
		'$p8',
		'$p9',
		'$p10',
		'$comentarios',
		'$hoy',
		'$hoy2',
		'$correo',
		$eval1,
		$eval2,
		$eval3,
		$eval4,
		$eval5,
		$eval6,
		$eval7,
		$eval8,
		$eval9,
		$eval10,
		'$identificador',
		'$sucursal')");

	$mysqlinserta = "INSERT INTO calificaciones(
	folio,
	mesa,
	mesero,
	cliente,
	repartidor,
	p1,
	p2,
	p3,
	p4,
	p5,
	p6,
	p7,
	recomen,
	p9,
	p10,
	comentarios,
	fecha,
	fecha2,
	correo,
	eval,
	eval2,
	eval3,
	eval4,
	eval5,
	eval6,
	eval7,
	eval8,
	eval9,
	eval10,
	identificador,
	sucursal)
	VALUES(
	'$folio',
	'$mesa',
	'$mesero',
	'$cliente',
	'$repartidor',
	'$p1',
	'$p2',
	'$p3',
	'$p4',
	'$p5',
	'$p6',
	'$p7',
	'$p8',
	'$p9',
	'$p10',
	'$comentarios',
	'$hoy',
	'$hoy2',
	'$correo',
	$eval1,
	$eval2,
	$eval3,
	$eval4,
	$eval5,
	$eval6,
	$eval7,
	$eval8,
	$eval9,
	$eval10,
	'$identificador',
	'$sucursal')";
	echo 'Query Inserta' . $mysqlinserta . '<br>';
	echo 'Registro insertado';
}

require 'phpEncuestaE/conexion.php';
$conexion_n = new conexion();

/* ----------------------- insertar en tabla promedios ----------------------------*/
$sumador_prom           = 0;
$contador_prom          = 0;
$sql_preguntas_promedio = "SELECT id, valor FROM cuestionario WHERE sucursal = '$sucursal' AND (  (valor = 0 OR valor = 5) OR (valor = 4 AND valor2 = 1) )  ORDER BY id ASC";
$preguntas_sacar_prom   = mysqli_query($conexion_n->getConexion(), $sql_preguntas_promedio);
while ($pregunta_prom = mysqli_fetch_object($preguntas_sacar_prom)) {
	$id = $pregunta_prom->id;

	$multiplicador = ($pregunta_prom->valor == 0 or $pregunta_prom->valor == 4) ? 10 : 1;
	$sumador_prom += ($multiplicador * ${'eval' . $id});
	$contador_prom++;
}

$promedio_general = ($contador_prom > 0) ? $sumador_prom / $contador_prom : 0;
mysqli_query($conexion_n->getConexion(), "INSERT INTO promedios_encuestas(sucursal_prom, encuesta_prom)VALUES('$sucursal', $promedio_general)");
/*--------------------------termina insercion promedio ------------------------------------*/
//
//
//
//
//
//
/*-------------------------formulario vendedor----------------------------------------------*/

if($sucursal == 'bernini')
{
	$select_ultimo_id = mysqli_query($conexion_n->getConexion(),
									 "SELECT id FROM calificaciones WHERE sucursal='$sucursal' ORDER BY id DESC LIMIT 1");

	if (mysqli_num_rows($select_ultimo_id) > 0) {

		$info_encuesta = mysqli_fetch_object($select_ultimo_id);

		mysqli_query($conexion_n->getConexion(), "INSERT INTO formulario_vendedor
		(id_encuesta, p1, p2, p3, p4, p5)VALUES($info_encuesta->id, '$fv1', '$fv2', '$fv3', '$fv4', '$fv5')");
	}

	mysqli_free_result($select_ultimo_id);

}


/*--------------------- termina insercion de formulario vendedor----------------------------*/

//
//
//
//
//
//

/*-------------------------- inicia notificacion detallada ---------------------------------------------------*/

$arreglo_campos_bd = array('eval', 'eval2', 'eval3', 'eval4', 'eval5', 'eval6', 'eval7', 'eval8', 'eval9', 'eval10', 'eval11', 'eval12');

$sql_notificacion_detallada   = "SELECT notificacion_detallada FROM sucursales WHERE sucursal='$sucursal'";
$check_notificacion_detallada = mysqli_query($conexion_n->getConexion(), $sql_notificacion_detallada);

$result_check_notificacion = mysqli_fetch_object($check_notificacion_detallada);
$boolean_activado          = ($result_check_notificacion->notificacion_detallada == 1) ? true : false;

mysqli_free_result($check_notificacion_detallada);

if (!$boolean_activado) {
	die('sin notificacion detallada');
}

$sql_string_preguntas = "SELECT id, valor FROM cuestionario WHERE sucursal = '$sucursal' AND (valor = 0 OR valor = 5) ORDER BY id ASC";

$preguntas = mysqli_query($conexion_n->getConexion(), $sql_string_preguntas);

$boolean_enviar_alerta = false;
$contador              = 0;

while ($pregunta = mysqli_fetch_object($preguntas)) {

	$campo = $arreglo_campos_bd[(int) $pregunta->id - 1];
	$valor = $pregunta->valor;

	if ($contador == 0) {
		if ($valor == 0) {
			if ((float) ${$campo} <= 0.5) {
				$boolean_enviar_alerta = true;
				$contador++;
			}

		}
		if ($valor == 5) {
			if ((float) ${$campo} <= 5) {
				$boolean_enviar_alerta = true;
				$contador++;
			}
		}

	}

}

mysqli_free_result($preguntas);

if (!$boolean_enviar_alerta) {
	die('sin alertas');
}

$sql_string_tokens = "SELECT token FROM notificaciones WHERE token != '' AND  sucursal = '$sucursal' AND enviar = 1";
$tokens            = mysqli_query($conexion_n->getConexion(), $sql_string_tokens);

$arreglo_tokens_enviar = array();

while ($info_tokens = mysqli_fetch_object($tokens)) {
	$arreglo_tokens_enviar[] = $info_tokens->token;
}

if (count($arreglo_tokens_enviar) == 0) {
	die('sin tokens');
}

mysqli_free_result($tokens);

//declaramos una constante como llave de acceso al servidor firebase
define('API_ACCESS_KEY', 'AAAAryQC3Bo:APA91bGXnR7fvPEW5kovmSJj_ZspYRCEnfWT3DGpn3fW1Ro6OzJWo6ybKF8n_HOdB-b6fKUOF6ajg5R7nmOf4gJL3oM617vqfCqw-qxUCGanibHSUQy8N5vMx7jJMLEThxjKKh1ObAtM');

$registrationIds = array_values(array_unique($arreglo_tokens_enviar));

$fecha_formato_diagonal = date('d/m/Y');
$hora_formato           = date('H:i:s');

$msg = array
	(
	'body'  => 'Se registró una mala calificación en ' . $sucursal . ' a las ' . $hora_formato,
	'title' => 'Mala calificación ' . $fecha_formato_diagonal,
	'icon'  => 'myicon',
	'sound' => 'mySound',
	'badge' => '1',
);
$fields = array
	(
	'registration_ids' => $registrationIds,
	'notification'     => $msg);

$headers = array
	(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json',
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
curl_exec($ch);
curl_close($ch);

$conexion_n->closeConexion();
