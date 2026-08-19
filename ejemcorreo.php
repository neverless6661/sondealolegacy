<?php
//require_once 'Connections/conexion7.php';
//require "lib2/class.phpmailer.php";

$destinatario = $_GET['destinatario'];
//$asunto       = "Recibiste una promocion";
//$rutapromo    = $_GET['rutapromo'];
//$rutcom       = $rutapromo;
//$rutalogo     = $_GET['rutalogo'];
//$promo        = $_GET['promo'];
//$folio        = $_GET['folio'];
//$empresa      = $_GET['empresa'];
$sucursal     = $_GET['sucursal'];


if(trim($destinatario) != '')
{	
	$conexion = new mysqli("34.55.77.19","sondeadmin","srk142536","base1");
	$query_ultima_encuesta = $conexion->query("SELECT id FROM calificaciones WHERE sucursal = '$sucursal' ORDER BY id DESC LIMIT 1");
	if(mysqli_num_rows($query_ultima_encuesta) > 0)
	{
		$info_encuesta_reciente =  mysqli_fetch_object($query_ultima_encuesta);
		$id_encuesta_reciente = $info_encuesta_reciente->id;

		//Aqui enviamos el correo de cupones
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://sondealo.com/mail/cupon-send/$destinatario/$sucursal/$id_encuesta_reciente");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
	}
	
	mysqli_free_result($query_ultima_encuesta);
	$conexion->close();

}



//$conexion = mysqli_connect($hostname, $username, $password, $database);
//
//$sqlSelectCorreo = "SELECT correo FROM correos WHERE sucursal = '$sucursal'";
//$selectCorreo    = mysqli_query($conexion, $sqlSelectCorreo);
//$rowCorreo       = mysqli_fetch_object($selectCorreo);
//
//$correo = $rowCorreo->correo;
//
//$sqldia    = "SELECT valor2 FROM promoimagen WHERE ruta='$rutcom'";
//$resultdia = mysqli_query($conexion, $sqldia);
//$rowdia    = mysqli_fetch_row($resultdia);
//$numdia    = $rowdia[0];
//
//$sqlvar    = "SELECT valor2 FROM promoimagen WHERE ruta='$rutcom'";
//$resultvar = mysqli_query($conexion, $sqlvar);
//$rowvar    = mysqli_fetch_row($resultvar);
//$numdia    = $rowvar[0];
//
//if ($numdia != 'N/A') {
//    $textopromo = '*En caso de haberle llegado una promocion, muestresele este correo al encargado. <br>Este folio solo puede ser utilizado una vez. <p style="color:red;">Válido por los proximos ' . $numdia . ' dias.';
//}else{
//	$textopromo = '';
//}
//
//$mail = new PHPMailer();
//$mail->IsSMTP();
//$mail->CharSet    = 'UTF-8';
//$mail->SMTPDebug  = 1;
//$mail->SMTPAuth   = true;
//$mail->SMTPSecure = "ssl";
//
//$mail->Host = "smtp.gmail.com";
//
//$mail->Username = "sondealopromos@gmail.com";
//
//$mail->Password = "Srk142536";
//$mail->Port     = 465; // Puerto a utilizar
//$mail->From     = "promociones@sondealo.com"; // Desde donde enviamos (Para mostrar)
//$mail->FromName = $empresa;
//$mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos
////$mail->AddCC("sondealo1@hotmail.com"); // Copia
//$mail->AddBCC("lsca_lubani@hotmail.com"); // Copia oculta
//$mail->IsHTML(true); // El correo se envía como HTML
//$mail->Subject = $promo; // Este es el titulo del email.
//
//$arr_ruta_promo = explode('/', $rutapromo);
//$rutapromo      = $arr_ruta_promo[count($arr_ruta_promo) - 1];
//
//$body = '<!DOCTYPE html><html lang="es-MX"><head><meta type="utf-8"/><style type="text/css">*{margin:0;padding:0;box-sizing:border-box}body{width:220px;border:1px solid rgba(0,0,0,0.3)}.container{width:100%;padding:5px}header{height:80px;padding:5px;text-align:center;background-color:#0658c9}header img{max-height:60px;max-width:220px}section img{margin:auto;margin-top:10px;display:block;width:100%;max-width:210px}</style></head><body style="width:220px;"> <header><div class="container"> <img src="https://sondealo.com/assets/images/logos/logo_h_1900_800_blanco.png"/></div> </header> <section><div class="container"> <img src="https://sondealo.com/sitio/images/cupones/' . $rutapromo . '"/><p>Nuestro correo electrónico -> </p> <a href="mailto:' . $correo . '" style="color:blue;">' . $correo . '</a> <img src="https://sondealo.com/wslegacy/barcode.php?codetype=Code39&size=40&text=' . $folio . '&print=true"/><p>Folio: ' . $folio . ' <br/> ' . $textopromo . '</p></div> <img style="margin-top:5px;width:60px;max-height:60px; border-radius:50%;" src="https://sondealo.com/sitio/images/' . $rutalogo . '"/> </section></body></html>';
//
//


//$mail->Body = $body; // Mensaje a enviar
//$exito      = $mail->Send(); // Envía el correo.
//
//if ($exito) {
//    //echo 'El correo fue enviado correctamente.';
//} else {
//    echo 'Hubo un inconveniente. Contacta a un administrador.';
//}
