<?php ob_start();
require_once('Connections/conexion7.php');
if (!isset($_SESSION)) {
  session_start();
}
  //----REGISTROS Y USUARIOS---
  $nombre=$_GET['nombre'];
  $usuario=$_GET['usuario'];
  $password=$_GET['contrasena'];
  $pass = sha1(trim($password));
  $passnocifrado=$_GET['nocifrado'];
  $correo=$_GET['correo'];
  $telefono=$_GET['telefono'];
  $activador='1';
  $empresa = $_GET['empresa'];
  $poder = 1;
  $error_message = "";
  $inicia = 1;
  $succes = 'failure';
  $plan = $_GET['plan'];
  
$conexion = mysqli_connect("34.55.77.19","sondeadmin","srk142536","base1");

$sqlreg = "SELECT usuario FROM registros WHERE usuario='$usuario' AND cuenta='google'";
  $resultreg = mysqli_query($conexion, $sqlreg);
  $numreg = mysqli_num_rows($resultreg);
  echo 'Query usuario: '.$sqlreg.'<br>';

  $sqlcount = "SELECT count(usuario) FROM registros WHERE usuario='$usuario' AND cuenta='google'";
  $resultcount = mysqli_query($conexion, $sqlcount);
  $numcount = mysqli_fetch_row($resultcount);
  $cantregistros = $numcount[0];
  echo 'Query count: '.$sqlcount.'<br>';
  echo 'Numero de registros: '.$cantregistros.'<br>';

if(mysqli_num_rows($resultreg) != 0){
    $error_message = "El usuario ya existe";
  echo json_encode("error");
}
else{
$sql = "SELECT identificador FROM registros ORDER BY identificador DESC LIMIT 1";
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_row($result);
$identi = $row[0]+1;
echo 'Query identificador: '.$sql.'<br>';
echo 'Identificador: '.$identi.'<br>';    

mysqli_query ($conexion, "INSERT INTO registros (usuario,contra,nombre,correo,identificador,telefono,activado,empresa,poder,customer_id,inicia,cuenta) VALUES('$usuario','$pass','$nombre','$correo',$identi,'$telefono',$activador,'$empresa',$poder,'$customid',$inicia,'google')");
  
//$query1 = "INSERT INTO registros (usuario,contra,nombre,correo,identificador,telefono,activado,empresa,poder,customer_id,estado,ciudad,pais,cp,direccion,inicia) VALUES('$usuario','$password','$nombres','$correo',$identi,'$telefono',$activador,'$empresa',$poder,'$customid','$estado','$ciudad','$pais','$cp','$dieccion',$inicia)";    
//echo 'Query1: '.$query1.'<br>';   
    
mysqli_query ($conexion, "INSERT INTO usuarios(usuario,nombre,password1,tipousr,identificador,sucursal,activado,facultad1,facultad2,facultad3,facultad4,facultad5,facultad6,facultad7,facultad8,facultad9,facultad10,poder) VALUES('$usuario','$nombre','$password',1,$identi,'sucursal',1,'1','1','1','1','1','1','1','1','1','1',1)");   
    
//$query2 = "INSERT INTO usuarios(usuario,nombre,password1,tipousr,identificador,sucursal,activado,facultad1,facultad2,facultad3,facultad4,facultad5,facultad6,facultad7,facultad8,poder) VALUES('$usuario','$nombres','$passnocifrado',1,$identi,'sucursal',1,'1','1','1','1','1','1','1','1',1)";     
//echo 'Query2: '.$query2.'<br>';
}
?>