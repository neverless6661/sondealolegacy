<?php
die;

/*
function getUserIpAddr()
{
	$ip ='0.0.0.0';
	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function validarTelefono($phone)
{
	return preg_match('/^[0-9]{10}+$/', $phone);
}


$request = $_REQUEST;
if(count($request) != 8)
{	
	echo json_encode(getUserIpAddr());
	die;
}

$keys = array_keys($request);

for($i=0;$i<count($request);$i++)
{
	if( trim( $request[$keys[$i]] )  == ''){
		echo json_encode('empty '.getUserIpAddr());
		die;
	}
}
*/


$nombre        = mb_strtolower($_GET['nombre'], 'UTF-8');
$usuario       = mb_strtolower($_GET['usuario'], 'UTF-8');
$password      = $_GET['contrasena'];
$pass          = sha1(trim($password));
$passnocifrado = $_GET['nocifrado'];
$correo		   = mb_strtolower($_GET['correo'], 'UTF-8');
$telefono      = $_GET['telefono'];
$activador     = '1';
$empresa       = mb_strtolower($_GET['empresa'], 'UTF-8');

/*
if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
	echo json_encode('email is not valid');
	die;
}
if(!validarTelefono($telefono)){
	echo json_encode('phone is not valid');
	die;
}
*/

$conexion = new mysqli("127.0.0.1","root","cuervo","base1");

$query_usuario = $conexion->query("SELECT id FROM registros WHERE usuario = '$usuario' LIMIT 1");

if(mysqli_num_rows($query_usuario) > 0){
	echo json_encode('user already exists');
	die;
}

$query_identificador = $conexion->query("select identificador from registros where poder = 1 order by identificador desc limit 1");
$info = mysqli_fetch_object($query_identificador);
$identificador = (int)$info->identificador + 1;

$conexion->query("INSERT INTO registros (usuario,contra,nombre,correo,identificador,telefono,activado,empresa,poder,customer_id,inicia,cuenta) VALUES('$usuario','$pass','$nombre','$correo',$identificador,'$telefono',$activador,'$empresa', 1, '', 1 ,'local')");

$conexion->query("INSERT INTO usuarios(usuario, nombre, password1, tipousr, identificador, sucursal, activado, facultad1, facultad2, facultad3, facultad4, facultad5,facultad6,facultad7,facultad8,facultad9,facultad10,poder) VALUES('$usuario','$nombre','$password',1,$identificador,'sucursal',1,'1','1','1','1','1','1','1','1','1','1',1)");

echo json_encode(1);

mysqli_free_result($query_usuario);
mysqli_free_result($query_identificador);
$conexion->close();