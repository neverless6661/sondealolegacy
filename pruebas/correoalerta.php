<?php ob_start();?>
<?php 
require_once('Connections/conexion7.php');
require("lib2/class.phpmailer.php");

/*
mysql_connect($hostname,$username,$password);
mysql_select_db($database);

$sql = "SELECT valor1,valor2,valor3,valor4,valor5 FROM correos WHERE identificador='$identificador'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
*/

$identificador = $_GET['identificador'];

//$mail1 = $row[0];
//$mail2 = $row[1];
//$mail3 = $row[2];
//$mail4 = $row[3];
//$mail5 = $row[4];
$mail1 = $_GET['correouno'];
$mail2 = $_GET['correodos'];
$mail3 = $_GET['correotres'];
$mail4 = $_GET['correocuatro'];
$mail5 = $_GET['correocinco'];

//$destinatario = $row[0].",".$row[1].",".$row[2].",".$row[3].",".$row[4]; 
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

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.live.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "sondealo1@outlook.com"; // Correo completo a utilizar
$mail->Password = "srk142536"; // Contraseña
$mail->Port = 587; // Puerto a utilizar
$mail->From = "sondealo1@outlook.com"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "Sondealo Alerta";
$mail->AddAddress($mail1); // Esta es la dirección a donde enviamos
$mail->AddAddress($mail2);
$mail->AddAddress($mail3);
$mail->AddAddress($mail4);
$mail->AddAddress($mail5);
$mail->AddCC("sondealo1@gmail.com"); // Copia
$mail->AddBCC("lsca_lubani@hotmail.com");
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Evaluacion de encuesta"; // Este es el titulo del email.

$body = ' 
<html> 
<head> 
   <title>Se recibió la alerta de una encuesta</title> 
</head> 
<body> 
<h1>Calificacion de encuesta recibida</h1>
Mesero: '.$mesero.'<br>
Mesa: '.$mesa.'<br>
Ticket: '.$folio.'<br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color1.'">'.$pregunta1.': '.$eval1.'</label><br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color2.'">'.$pregunta2.': '.$eval2.'</label><br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color3.'">'.$pregunta3.': '.$eval3.'</label><br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color4.'">'.$pregunta4.': '.$eval4.'</label><br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color5.'">'.$pregunta5.': '.$eval5.'</label><br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color6.'">'.$pregunta6.': '.$eval6.'</label><br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color7.'">'.$pregunta7.': '.$eval7.'</label><br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color8.'">'.$pregunta8.': '.$eval8.'</label><br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color9.'">'.$pregunta9.': '.$eval9.'</label><br>
<label style="COLOR: #000000; BACKGROUND-COLOR:'.$color10.'">'.$pregunta10.': '.$eval10.'</label><br>
Correo: '.$correo.'<br>
Comentarios: '.$comentarios.'
 
<br><br><br><br>
<img src="http://sondealo.com/logo/sondealogo.png" width=298px height="118px" border="0">
<br>
Encuesta creada por Sondealo.com

</body> 
</html> 
'; 

$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.

if($exito){
echo 'El correo fue enviado correctamente.';
}else{
echo 'Hubo un inconveniente. Contacta a un administrador.';
}	

?>
