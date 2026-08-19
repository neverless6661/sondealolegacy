<?php ob_start();
require_once('Connections/conexion7.php'); 
if (!isset($_SESSION)) {
  session_start();
}
  $sucursal=$_GET['sucursal'];
  $nombre=$_GET['nombre'];
  $password=$_GET['contrasena'];
  $identificador = $_GET['identificador'];
  $error_message = "";
  $succes = 'failure';
  $tipousr = $_GET['tipousr'];
  $hoy = date ("Y-m-d"); 
  $hoy = $hoy.' 05:00:00';
  
$conexion = mysqli_connect("34.55.77.19","sondeadmin","srk142536","base1");

  $sqlreg = "SELECT sucursal FROM sucursales WHERE sucursal='$sucursal'";
  $resultreg = mysqli_query($conexion, $sqlreg);
  $numreg = mysqli_num_rows($resultreg);
  echo 'Query sucursal: '.$sqlreg.'<br>';

  $sqlcount = "SELECT count(sucursal) FROM sucursales WHERE sucursal='$sucursal'";
  $resultcount = mysqli_query($conexion, $sqlcount);
  $numcount = mysqli_fetch_row($resultcount);
  $cantregistros = $numcount[0];
  echo 'Query count: '.$sqlcount.'<br>';
  echo 'Numero de registros: '.$cantregistros.'<br>';

  $sqlregistro = "SELECT id FROM registros WHERE identificador=$identificador AND poder=1";
  $resultregistro = mysqli_query($conexion, $sqlregistro);
  $rowregistro = mysqli_fetch_array($resultregistro);
  $idregistro = $rowregistro[0];
  echo 'Query id registro: '.$sqlregistro.'<br>';

if(mysqli_num_rows($resultreg) != 0){
    $error_message = "La sucursal ya existe";
	echo json_encode("error");
}
else{            
mysqli_query($conexion, "INSERT INTO sucursales (sucursal,identificador,empresa,usuario,pass,activo,tipousr) VALUES('$sucursal','$identificador','$nombre','$sucursal','$password','1','$tipousr')");
$querysucursal = "INSERT INTO sucursales (sucursal,identificador,empresa,usuario,pass,activo,tipousr) VALUES('$sucursal','$identificador','$nombre','$sucursal','$password','1','$tipousr')";
echo 'Query insert sucursal: '.$querysucursal.'<br>';

mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(1,'¿Es la primera vez que nos visitas?',10,1,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(2,'Atención al cliente',10,0,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(3,'¿Cómo te enteraste de nosotros?',10,4,$identificador,'$sucursal','Redes sociales,Radio/Televisión,Recomendación ,Ubicación')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(4,'Disponibilidad de productos o servicios',10,0,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(5,'Relación calidad-precio',10,0,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(6,'Te ofrecieron alguna promoción',10,1,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(7,'Lo visitó algún encargado',10,1,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(8,'Servicio en general',10,0,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(9,'Que tanto nos recomendarías, siendo el 10 lo más alto',10,5,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(10,'Pregunta 10',10,2,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(11,'Pregunta 11',10,2,$identificador,'$sucursal','')");
mysqli_query($conexion, "INSERT INTO cuestionario(id,pregunta,calificacion,valor,identificador,sucursal,textos) VALUES(12,'Pregunta 12',10,2,$identificador,'$sucursal','')");

mysqli_query($conexion, "INSERT INTO promoimagen(nombre,ruta,porcentaje,identificador,valor1,sucursal) VALUES('Gracias por usar Sondealo','Promociones/publicidad1.jpg','10% de probabilidad',$identificador,1,'$sucursal')");
mysqli_query($conexion, "INSERT INTO promoimagen(nombre,ruta,porcentaje,identificador,valor1,sucursal) VALUES('Gracias por usar Sondealo','Promociones/publicidad2.jpg','10% de probabilidad',$identificador,2,'$sucursal')");
mysqli_query($conexion, "INSERT INTO promoimagen(nombre,ruta,porcentaje,identificador,valor1,sucursal) VALUES('Gracias por usar Sondealo','Promociones/publicidad3.jpg','10% de probabilidad',$identificador,3,'$sucursal')");
mysqli_query($conexion, "INSERT INTO promoimagen(nombre,ruta,porcentaje,identificador,valor1,sucursal) VALUES('Gracias por usar Sondealo','Promociones/publicidad1.jpg','10% de probabilidad',$identificador,4,'$sucursal')");
mysqli_query($conexion, "INSERT INTO promoimagen(nombre,ruta,porcentaje,identificador,valor1,sucursal) VALUES('Gracias por usar Sondealo','Promociones/publicidad2.jpg','10% de probabilidad',$identificador,5,'$sucursal')");

mysqli_query($conexion, "INSERT INTO valores(id,valor,nombre,identificador,sucursal) VALUES(1,9,'Cantidad de preguntas',$identificador,'$sucursal')");
mysqli_query($conexion, "INSERT INTO valores(id,valor,nombre,identificador,sucursal) VALUES(2,1,'Boton no contestar',$identificador,'$sucursal')");
mysqli_query($conexion, "INSERT INTO valores(id,valor,nombre,identificador,sucursal) VALUES(3,1,'Enviar correo',$identificador,'$sucursal')");
mysqli_query($conexion, "INSERT INTO valores(id,valor,nombre,identificador,sucursal) VALUES(4,1,'Enviar comentarios',$identificador,'$sucursal')");
mysqli_query($conexion, "INSERT INTO valores(id,valor,nombre,identificador,sucursal) VALUES(5,2,'No contestadas',$identificador,'$sucursal')");
mysqli_query($conexion, "INSERT INTO valores(id,valor,nombre,identificador,sucursal) VALUES(6,1,'Mensaje descuento',$identificador,'$sucursal')");    

mysqli_query($conexion, "INSERT INTO logoimagen(nombre,ruta,identificador,ruta2,sucursal) VALUES('logo','logo/logos.png',$identificador,'logo/logot.png','$sucursal')");

mysqli_query($conexion, "INSERT INTO promodia(nombre,ruta,identificador,valor1,sucursal) VALUES('Publicidad 1','PromosKimono/publicidad1.jpg',$identificador,1,'$sucursal')");
mysqli_query($conexion, "INSERT INTO promodia(nombre,ruta,identificador,valor1,sucursal) VALUES('Publicidad 2','PromosKimono/publicidad2.jpg',$identificador,2,'$sucursal')");
mysqli_query($conexion, "INSERT INTO promodia(nombre,ruta,identificador,valor1,sucursal) VALUES('Publicidad 4','PromosKimono/publicidad1.jpg',$identificador,4,'$sucursal')");
mysqli_query($conexion, "INSERT INTO promodia(nombre,ruta,identificador,valor1,sucursal) VALUES('Publicidad 3','PromosKimono/publicidad3.jpg',$identificador,3,'$sucursal')");
mysqli_query($conexion, "INSERT INTO promodia(nombre,ruta,identificador,valor1,sucursal) VALUES('Publicidad 5','PromosKimono/publicidad2.jpg',$identificador,5,'$sucursal')");
    
mysqli_query($conexion, "INSERT INTO estadomsj(sucursal,identificador,estado) VALUES('$sucursal','$identificador',0)"); 

mysqli_query($conexion, "INSERT INTO registros_planes(registros_id,planes_id,estatus,renew,fecha_inicio,fecha_vencimiento) VALUES($idregistro,56,1,0,'$hoy','$hoy')");
     
}
?>