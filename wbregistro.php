<?php ob_start();?>
<?php require_once('Connections/conexion7.php'); ?>

<?php
if (!isset($_SESSION)) {
  session_start();
}

  //----REGISTGROS Y USUARIOS---
  $nombre=$_GET['nombre'];
  $apellido=$_GET['apellido'];
  $usuario=$_GET['usuario'];
  $usuario=strtolower($usuario);
  $password=$_GET['contrasena'];
  $pass = sha1(trim($password));
  //$rpass = $_GET['rcontasena'];
  $passnocifrado=$_GET['nocifrado'];
  $correo=$_GET['correo'];
  $telefono=$_GET['telefono'];
  $nombres = $nombre.' '.$apellido;
  $activador='1';
  $empresa = $_GET['empresa'];
  $poder = 1;
  $estado = $_GET['estado'];
  $ciudad = $_GET['ciudad'];
  $pais = $_GET['pais'];
  $cp = $_GET['cp'];
  $dieccion = $_GET['dir'];
  $error_message = "";
  $customid = $_GET['customid'];
  $inicia = 1;
  $succes = 'failure';
  $plan = $_GET['plan'];

  //---------PLANES--------------
  /*
  $idplan = $_GET['idplan'];
  $name = $_GET['name'];
  $amount = $_GET['amount'];
  $currency = $_GET['currency'];
  $interval = $_GET['interval'];
  $frequency = $_GET['freq'];
  $trial = $_GET['trial'];
  $status = $_GET['status'];
  $expiry = $_GET['expiry'];
  $limit = $_GET['limit'];
  $created = $_GET['created'];
  */

  //----REGISTRO_PLANES--------
  //$regid = $_GET['regid'];
  //$planid = $_GET['planid'];
 /*
  $fechaini = $created
  $estatus = $status
  $fechaterm = $expiry;
*/
  
$conexion = mysqli_connect("34.55.77.19","sondeadmin","srk142536","base1");

  $sqlreg = "SELECT usuario FROM registros WHERE usuario='$usuario'";
  $resultreg = mysqli_query($conexion, $sqlreg);
  $numreg = mysqli_num_rows($resultreg);
  echo 'Query usuario: '.$sqlreg.'<br>';

  $sqlcount = "SELECT count(usuario) FROM registros WHERE usuario='$usuario'";
  $resultcount = mysqli_query($conexion, $sqlcount);
  $numcount = mysqli_fetch_row($resultcount);
  $cantregistros = $numcount[0];
  echo 'Query count: '.$sqlcount.'<br>';
  echo 'Numero de registros: '.$cantregistros.'<br>';

if(mysqli_num_rows($resultreg) != 0){
    $error_message = "El usuario ya existe";
	echo json_encode("error");
  header('Location:/bienvenido-'.$plan);
}
else{         

$sql = "SELECT identificador FROM registros ORDER BY identificador DESC LIMIT 1";
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_row($result);
$identi = $row[0]+1;
echo 'Query identificador: '.$sql.'<br>';
echo 'Identificador: '.$identi.'<br>';    

//$sqlreg = mysqli_query ($conexion, "INSERT INTO registros (usuario,contra,nombre,correo,identificador,telefono,activado,empresa,poder,customer_id,estado,ciudad,pais,cp,direccion,inicia) VALUES('$usuario','$password','$nombres','$correo',$identi,'$telefono',$activador,'$empresa',$poder,'$customid','$estado','$ciudad','$pais','$cp','$dieccion',$inicia)");
  
//$query1 = "INSERT INTO registros (usuario,contra,nombre,correo,identificador,telefono,activado,empresa,poder,customer_id,estado,ciudad,pais,cp,direccion,inicia) VALUES('$usuario','$password','$nombres','$correo',$identi,'$telefono',$activador,'$empresa',$poder,'$customid','$estado','$ciudad','$pais','$cp','$dieccion',$inicia)";    
    
echo 'Query1: '.$query1.'<br>';   
    
//$sqlusr = mysqli_query ($conexion, "INSERT INTO usuarios(usuario,nombre,password1,tipousr,identificador,sucursal,activado,facultad1,facultad2,facultad3,facultad4,facultad5,facultad6,facultad7,facultad8,poder) VALUES('$usuario','$nombres','$passnocifrado',1,$identi,'sucursal',1,'1','1','1','1','1','1','1','1',1)");   
    
//$query2 = "INSERT INTO usuarios(usuario,nombre,password1,tipousr,identificador,sucursal,activado,facultad1,facultad2,facultad3,facultad4,facultad5,facultad6,facultad7,facultad8,poder) VALUES('$usuario','$nombres','$passnocifrado',1,$identi,'sucursal',1,'1','1','1','1','1','1','1','1',1)";    
    
//echo 'Query2: '.$query2.'<br>';   
  
/*
$sqlplan = mysql_query ("INSERT INTO planes(name,amount,currency,interval,frequency,trial_period_days,status,expiry_count,limit,created_at) VALUES('$name',$amount,'$currency','$interval','$frequency',$trial,$status,$expiry,$limit,'$created')"); 
*/        
/*  

if($sqlreg && $sqlusr){
    $succes = 'succes';
    $array = array('succes' => $succes);
   // echo json_encode($array);
    header('Location:/bienvenido-'.$plan);
}
else{
    $array = array('succes' => $succes);
    echo json_encode($array);
    header('Location:/bienvenido-'.$plan);
}
*/
header('Location:/bienvenido-'.$plan);
       
}

?>