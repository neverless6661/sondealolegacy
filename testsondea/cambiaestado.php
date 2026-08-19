<?php
//include('functions.php');
require_once('Connections/conexion.php');
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
$valor = $_GET['estado'];
$valor = $valor+1;
$tokens = array();
$comentarios = $_GET['comentarios'];


mysql_connect($hostname, $username, $password);
mysql_select_db($database);


if(strpos(strtolower($comentarios),'pesimo')!== false or 
strpos(strtolower($comentarios),'pésimo')!== false or 
strpos(strtolower($comentarios),'malo')!== false or 
strpos(strtolower($comentarios),'mal')!== false or 
strpos(strtolower($comentarios),'lento')!== false or 
strpos(strtolower($comentarios),'fatal')!== false or 
strpos(strtolower($comentarios),'feo')!== false or 
strpos(strtolower($comentarios),'falla')!== false or 
strpos(strtolower($comentarios),'fallando')!== false or 
strpos(strtolower($comentarios),'fallar')!== false or 
strpos(strtolower($comentarios),'fallo')!== false or 
strpos(strtolower($comentarios),'falló')!== false or 
strpos(strtolower($comentarios),'mala')!== false or 
strpos(strtolower($comentarios),'malos')!== false or 
strpos(strtolower($comentarios),'malas')!== false or 
strpos(strtolower($comentarios),'pesima')!== false or 
strpos(strtolower($comentarios),'pesimas')!== false or 
strpos(strtolower($comentarios),'pésimas')!== false or 
strpos(strtolower($comentarios),'pesimos')!== false or 
strpos(strtolower($comentarios),'pésimos')!== false or 
strpos(strtolower($comentarios),'lentos')!== false or 
strpos(strtolower($comentarios),'lenta')!== false or 
strpos(strtolower($comentarios),'lentas')!== false or 
strpos(strtolower($comentarios),'tarda')!== false or 
strpos(strtolower($comentarios),'tardan')!== false or 
strpos(strtolower($comentarios),'tardaron')!== false or 
strpos(strtolower($comentarios),'tardaban')!== false or 
strpos(strtolower($comentarios),'pelo')!== false or 
strpos(strtolower($comentarios),'pelos')!== false or 
strpos(strtolower($comentarios),'cabello')!== false or 
strpos(strtolower($comentarios),'cabellos')!== false or 
strpos(strtolower($comentarios),'falta')!== false or 
strpos(strtolower($comentarios),'faltan')!== false or 
strpos(strtolower($comentarios),'falto')!== false or 
strpos(strtolower($comentarios),'faltó')!== false or 
strpos(strtolower($comentarios),'faltaba')!== false or 
strpos(strtolower($comentarios),'faltaron')!== false or
strpos(strtolower($comentarios),'seco')!== false or
strpos(strtolower($comentarios),'reseco')!== false or
strpos(strtolower($comentarios),'congelado')!== false or
strpos(strtolower($comentarios),'congelada')!== false or
strpos(strtolower($comentarios),'frio')!== false or
strpos(strtolower($comentarios),'asco')!== false or
strpos(strtolower($comentarios),'tardada')!== false or
strpos(strtolower($comentarios),'tardado')!== false or
strpos(strtolower($comentarios),'sucio')!== false or
strpos(strtolower($comentarios),'sucios')!== false or
strpos(strtolower($comentarios),'sucia')!== false or
strpos(strtolower($comentarios),'sucias')!== false or
strpos(strtolower($comentarios),'mosca')!== false or
strpos(strtolower($comentarios),'moscas')!== false or
strpos(strtolower($comentarios),'mosquito')!== false or
strpos(strtolower($comentarios),'mosquitos')!== false or
strpos(strtolower($comentarios),'mosco')!== false or
strpos(strtolower($comentarios),'moscos')!== false or
strpos(strtolower($comentarios),'cucaracha')!== false or
strpos(strtolower($comentarios),'cucarachas')!== false or
strpos(strtolower($comentarios),'desabrida')!== false or
strpos(strtolower($comentarios),'desabridas')!== false or
strpos(strtolower($comentarios),'desabrido')!== false or
strpos(strtolower($comentarios),'desabridos')!== false or
strpos(strtolower($comentarios),'duro')!== false or
strpos(strtolower($comentarios),'duros')!== false or
strpos(strtolower($comentarios),'dura')!== false or
strpos(strtolower($comentarios),'duras')!== false or
strpos(strtolower($comentarios),'quemado')!== false or
strpos(strtolower($comentarios),'quemados')!== false or
strpos(strtolower($comentarios),'quemada')!== false or
strpos(strtolower($comentarios),'quemadas')!== false or
strpos(strtolower($comentarios),'kemado')!== false or
strpos(strtolower($comentarios),'kemados')!== false or
strpos(strtolower($comentarios),'kemada')!== false or
strpos(strtolower($comentarios),'kemadas')!== false or
strpos(strtolower($comentarios),'volumen')!== false or
strpos(strtolower($comentarios),'porcion')!== false or
strpos(strtolower($comentarios),'porciones')!== false or
strpos(strtolower($comentarios),'tardados')!== false or
strpos(strtolower($comentarios),'tardadas')!== false or
strpos(strtolower($comentarios),'incomodo')!== false or
strpos(strtolower($comentarios),'incómodo')!== false or
strpos(strtolower($comentarios),'incomodos')!== false or
strpos(strtolower($comentarios),'incómodos')!== false or
strpos(strtolower($comentarios),'incomoda')!== false or
strpos(strtolower($comentarios),'incómoda')!== false or
strpos(strtolower($comentarios),'incomodas')!== false or
strpos(strtolower($comentarios),'incómodas')!== false or
strpos(strtolower($comentarios),'peor')!== false or
strpos(strtolower($comentarios),'peores')!== false or 
strpos(strtolower($comentarios),'nunca')!== false or
strpos(strtolower($comentarios),'salado')!== false or
strpos(strtolower($comentarios),' salada ')!== false or
strpos(strtolower($comentarios),'sal ')!== false or
strpos(strtolower($comentarios),'crudo')!== false or
strpos(strtolower($comentarios),'crudos')!== false or
strpos(strtolower($comentarios),'cruda')!== false or
strpos(strtolower($comentarios),'crudas')!== false or
strpos(strtolower($comentarios),'menos')!== false or
strpos(strtolower($comentarios),'excepto')!== false or
strpos(strtolower($comentarios),'exepto')!== false or
strpos(strtolower($comentarios),'excepcion')!== false or
strpos(strtolower($comentarios),'excepción')!== false or
strpos(strtolower($comentarios),'exepcion')!== false or
strpos(strtolower($comentarios),'exepción')!== false or
strpos(strtolower($comentarios),'pero')!== false or
strpos(strtolower($comentarios),'embargo')!== false or
strpos(strtolower($comentarios),'mejorar')!== false or
strpos(strtolower($comentarios),'mejoraran')!== false or
strpos(strtolower($comentarios),'faltaban')!== false or
strpos(strtolower($comentarios),'poco')!== false or
strpos(strtolower($comentarios),'poca')!== false or

strpos(strtolower($comentarios),'ofrecer')!== false or
strpos(strtolower($comentarios),' no ')!== false or
strpos(strtolower($comentarios),'viejo')!== false or
strpos(strtolower($comentarios),'vieja')!== false or
strpos(strtolower($comentarios),'presion')!== false or
strpos(strtolower($comentarios),'incluir')!== false or
strpos(strtolower($comentarios),'habia')!== false or
strpos(strtolower($comentarios),'insecto')!== false or
strpos(strtolower($comentarios),'salio')!== false or
strpos(strtolower($comentarios),'diferente')!== false or
strpos(strtolower($comentarios),'deberia')!== false or
strpos(strtolower($comentarios),'debería')!== false or

strpos(strtolower($comentarios),'pero')!== false or
strpos(strtolower($comentarios),'horrible')!== false or
   
strpos(strtolower($comentarios),'pongan')!== false or 
strpos(strtolower($comentarios),'excesiv')!== false or   
strpos(strtolower($comentarios),'exesiv')!== false or 
strpos(strtolower($comentarios),'excesib')!== false or
strpos(strtolower($comentarios),'exesib')!== false or
   
strpos(strtolower($comentarios),'agregar')!== false or
strpos(strtolower($comentarios),'cuidar')!== false or
strpos(strtolower($comentarios),'incomible')!== false or
   
strpos(strtolower($comentarios),'huele')!== false or
strpos(strtolower($comentarios),'ojala')!== false or
strpos(strtolower($comentarios),'ojalá')!== false or
strpos(strtolower($comentarios),'solo')!== false or 
strpos(strtolower($comentarios),'calor')!== false or
strpos(strtolower($comentarios),'recoger')!== false or
strpos(strtolower($comentarios),'basura')!== false or
   
strpos(strtolower($comentarios),' mas ')!== false or
strpos(strtolower($comentarios),'gotea')!== false or
strpos(strtolower($comentarios),'hechado')!== false or
strpos(strtolower($comentarios),'echado')!== false or
strpos(strtolower($comentarios),'perder')!== false or
strpos(strtolower($comentarios),'pequeño')!== false or
strpos(strtolower($comentarios),'pequeña')!== false or
strpos(strtolower($comentarios),'pequeno')!== false or
strpos(strtolower($comentarios),'pequena')!== false or
strpos(strtolower($comentarios),'pequeñito')!== false or
strpos(strtolower($comentarios),'pequeñita')!== false or
strpos(strtolower($comentarios),'pequenito')!== false or 
strpos(strtolower($comentarios),'pequenita')!== false or
strpos(strtolower($comentarios),'olvidan')!== false or
strpos(strtolower($comentarios),'olvidaron')!== false or
strpos(strtolower($comentarios),'olviden')!== false or 
strpos(strtolower($comentarios),' van ')!== false or
strpos(strtolower($comentarios),'tamaño')!== false or
strpos(strtolower($comentarios),'tamano')!== false    
   
   

){

mysql_query("UPDATE estadomsj SET estado=$valor WHERE identificador=$identificador AND sucursal='$sucursal'");

$sql = "SELECT token FROM notificaciones WHERE identificador=$identificador AND sucursal='$sucursal'";
$result = mysql_query($sql);
echo 'Inst. SQL: '.$sql.'<br>';

while($row = mysql_fetch_array($result)){
    $token = $row['token'];
    
    echo 'Token: '.$token.'<br>';
    $tokens[] = $token;
    
}
//echo 'Tokens Array: '.$tokens[].'<br>';
#API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AAAAryQC3Bo:APA91bGXnR7fvPEW5kovmSJj_ZspYRCEnfWT3DGpn3fW1Ro6OzJWo6ybKF8n_HOdB-b6fKUOF6ajg5R7nmOf4gJL3oM617vqfCqw-qxUCGanibHSUQy8N5vMx7jJMLEThxjKKh1ObAtM' );
    $registrationIds = $tokens;
    echo 'RegistrationIds: '.$registrationIds.'<br>';
#prep the bundle
     $msg = array
          (
		'body' 	=> $comentarios,
		'title'	=> $sucursal,
             	'icon'	=> 'myicon',/*Default Icon*/
              	'sound' => 'mySound',/*Default sound*/
                'badge' => '1'
          );
	$fields = array
        (
        'registration_ids' => $registrationIds,
        'notification'	=> $msg);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
#Echo Result Of FireBase Server
echo $result;

}
?>

