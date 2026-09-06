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


// ==========================================
// 1. CONFIGURACIÓN Y CREDENCIALES
// ==========================================
// Reemplaza con los datos dentro de tu archivo .json descargado de Firebase

$client_email = "firebase-adminsdk-fbsvc@sondealopush.iam.gserviceaccount.com";
$private_key  = "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDSpDtwsLxRSp/P\nXoAgEN5YAnU5eJ+2GqXHnV5JEG0lq/Peh1x1UeYu42GLYIkK7M/kpN81QMcCRipP\nZtzHpAl9odD05JbJ+peqZz9sqicjAA8sGwUx0cUylVFXssXW3fsMFUSNHRpL7S8Q\nPVV6VFDPC38Ge06u4M4OjFYFJ5j1KKa9FT71TB9DhwE0DQdgdW+PrFQOERbl8Ziw\nAEaRrvj9opjVo7IxRe8u30mtMctowUYCVBUfVWyTpwGMl3pE33EeA0tYJSRHvD8S\nBkkW7+RqRfw9YcVQFyyME5YHTFLW/G6ijpODohOFwRibAJ1+kc/fcKXEQnVC1Bij\nIFhghMDbAgMBAAECggEAD/11oa1Y7lba4NQMp+J/7nBpU66LeTh2ozuX/7XmgziV\nb6wY4bMQ5ThPnFP8sz6c3X+CjjlXoh2Pcq2dTu5t5gKVqTF9HOIQB1iFIQudovOL\nM07tywVgkeFx5lVk3VXGi/lFVe0CpQbhTrtJNNsXs0/tGaHcrDvWiJYwpX2HB/0l\nnob81tAONVICkQGiVlDN2xM0WAnClc7eghRv2Fcr1IPbH4wwsXlUk4cQ8qn+dAgl\nOoLkdcmV2K0WyS9oGdSEay77zj06w7ZIwBbW4g0H/Zmz0MvqXcjxfPzAuRYztqIc\nJODRA3Tc2/8owWZ/RAe8VNMA0e6gaubtnEIfRDY+SQKBgQD9nG+hZ5w03JHQBtK7\nr/UEyfeCuAncyQKLtJNDGln31Vah3jNIwyEWsDo+9M+WuGeu7nY/C5co5Lo9Q7Nx\n4uiQAEbSDJlHK19wV6DT9LhiXocpt39sk2slpwoli32y59O3Vf5q8LvHR6cIiRiI\nqlnmuzM63dcBdOyodoakEzINZQKBgQDUoC2mT7zu6TyEiWCdGPPg33u642BEemiG\nbIgiqSRRMIvKVRNDAknKGA6owmu4KTE79uPOh4UQDuVic0gaOeYXa0L71K2el9uF\n5ZcQVaCHuaKnYEhgx53Ph7t/GxI/+ZAAkyofz+ICt6SZOe1mDYqv1z4a1ftcQtlC\n1Kx1jvTRPwKBgFl45EUsOYbIvkSG87e1hxquajza0tfqrpQ9G6sT0+PEhzDKJIuq\nE7VebN4jHk2NNz8W7+6kFysdLrtIdDlclTGgd1vJiBX8rkoDEEFW1+oUcVj9XN4g\nUC/Tc5f1U15XvXCzzPNLhOP0WnB/dYFZoCfvqU4+T4k7B/cTAcNG5mSlAoGAfBV2\nToZeNfa7MIWTclqriGIjrO8gsRXWhgw0bjXTUeZIzi1T7lkZgu0DMQ01G+Y+K0Zr\nr4164+Itj4TDYTrEwooAL0Lwh4sLu1o/DHNMGakF+TPBSWl0+TW2//hmcBtOJGe9\nv47r0LYnQpyBpHrmorO0NKkH5dHFRLEka/6fdLUCgYBnMpf21nE3Zo68RR3L/u6e\nLJuYJ5inwdm64YbhkGC7cqcjRJQ9A4Kbmsq/4HMtFLUr7DMjCeCWr3X4MLT+pYDI\n42UBhod/3n2FKOIHa6YiJ8gh5PXolQTKy7JKchZg/HtVuy9NsyU3h4WTR+gvWVDS\nCt1yEMbXBXfIzI4U/coDfA==\n-----END PRIVATE KEY-----\n";
$project_id   = "sondealopush";

// Token del dispositivo móvil o web que recibirá la notificación
$device_token = "e0gOrfFKTX-5XJhlmoTb_5:APA91bGq54ev0VqXPdwqJHYDYodjGUJ3bz8Xf9-o4nKUa_EwPpxnQgInwdR482J3ccg6ifwx7VLqLdxE7hbYOxrwVI4FIU_U56Zmq-BfNbM4xWqtUBAOrAo";

// ==========================================
// 2. GENERAR JWT Y OBTENER ACCESS TOKEN OAUTH2
// ==========================================
function getAccessToken($client_email, $private_key) {
    $now = time();
    $header = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
    $payload = json_encode([
        'iss' => $client_email,
        'sub' => $client_email,
        'aud' => 'https://oauth2.googleapis.com/token',
        'iat' => $now,
        'exp' => $now + 3600,
        'scope' => 'https://www.googleapis.com/auth/firebase.messaging'
    ]);

    // Codificación Base64Url
    $base64UrlHeader  = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

    // Firmar con OpenSSL utilizando la clave privada
    $signature = '';
    openssl_sign($base64UrlHeader . "." . $base64UrlPayload, $signature, $private_key, OPENSSL_ALGO_SHA256);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

    // Solicitar Bearer Token a Google mediante cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
        'assertion'  => $jwt
    ]));

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    return $data['access_token'] ?? null;
}

$fecha_formato_diagonal = date('d/m/Y');
$hora_formato           = date('H:i:s');

// ==========================================
// 3. ENVIAR LA NOTIFICACIÓN A FCM v1
// ==========================================
function sendFcmNotification($project_id, $access_token, array $deviceTokens, $title, $body, $customData = []) {
    $url = "https://fcm.googleapis.com/v1/projects/{$project_id}/messages:send";

    $headers = [
        'Authorization: Bearer ' . $access_token,
        'Content-Type: application/json'
    ];

    $results = [];

    // Inicializar cURL una sola vez fuera del bucle para mejor rendimiento
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    foreach ($deviceTokens as $token) {
        $payload = [
            'message' => [
                'token' => $token,
                'notification' => [
                    'title' => $title,
                    'body'  => $body
                ],
                'data' => $customData
            ]
        ];

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $results[$token] = [
            'status' => $httpCode,
            'response' => json_decode($response, true)
        ];
    }

    curl_close($ch);

    return $results;
}

// ==========================================
// 4. EJECUCIÓN
// ==========================================
$accessToken = getAccessToken($client_email, $private_key);

if ($accessToken) {
    $resultado = sendFcmNotification(
        $project_id,
        $accessToken,
        $arreglo_tokens_enviar,
        'Se registró una mala calificación en ' . $sucursal . ' a las ' . $hora_formato,
        'Mala calificación ' . $fecha_formato_diagonal,
        ["click_action" => "ABRIR_PERFIL", "id" => "99"]
    );

    echo "Respuesta HTTP: " . $resultado['status'] . "\n";
    print_r($resultado['response']);
} else {
    echo "Error al obtener el Access Token de OAuth2.";
}

?>

/*

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

*/
