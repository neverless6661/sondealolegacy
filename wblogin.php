<?php ob_start();?>
<?php require_once('Connections/conexion.php'); ?>

<?php
if (!isset($_SESSION)) {
  session_start();
}

  $usuario=$_GET['usuario'];
  $password=sha1($_GET['contrasena']);
  $activador='1';

  mysql_connect($hostname, $username, $password);
  mysql_select_db($database);

  $sqlogin = "SELECT usuario FROM registros WHERE usuario='$usuario' AND contra='$password'";
  $resultlogin = mysql_query($sqlogin);
  $numlogin = mysql_num_rows($resultlogin);

  if(mysql_num_rows($resultlogin) != 0){
  
    $sqlpoder = "SELECT poder FROM registros WHERE usuario='$usuario'";
    $resultpoder = mysql_query($sqlpoder);
    $rowpoder = mysql_fetch_row($resultpoder);
    $poder = $rowpoder[0];
    $_SESSION['MM_Poder'] = $poder;
    $_SESSION['MM_Username'] = $usuario;  

//}
session_start();
//CONDICION ADMIN
if ($poder == 1){
    if(isset($_SESSION['MM_Username'])) {
		
mysql_connect($hostname, $username, $password);
mysql_select_db($database);
		
$sql = "SELECT identificador FROM registros WHERE usuario='$_SESSION[MM_Username]'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$totalidenti = $row[0];

$_SESSION['MM_Identi'] = $totalidenti;

	}
}
//CONDICION USUARIO
else if($poder == 2){
   if(isset($_SESSION['MM_Username'])) {
		
mysql_connect($hostname, $username, $password);
mysql_select_db($database);
		
$sql = "SELECT identificador FROM usuarios WHERE usuario='$_SESSION[MM_Username]'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$totalidenti = $row[0];

$_SESSION['MM_Identi'] = $totalidenti;

	} 
}
//------------------------------------------------------------------//

session_start();
    
mysql_connect($hostname, $username, $password);
mysql_select_db($database);

if($poder == 1){    
    if(isset($_SESSION['MM_Username'])) { 
	}
}



if($poder == 2){
    if(isset($_SESSION['MM_Username'])) {
        
        $sql = "SELECT * FROM registros WHERE usuario='$_SESSION[MM_Username]'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$totalidenti = $row['identificador'];
$facultad1 = $row['facultad1'];
$facultad2 = $row['facultad2'];
$facultad3 = $row['facultad3'];
$facultad4 = $row['facultad4'];
$facultad5 = $row['facultad5'];
$facultad6 = $row['facultad6'];
$facultad7 = $row['facultad7'];
$facultad8 = $row['facultad8'];        

$_SESSION['MM_Identi'] = $totalidenti;
$_SESSION['MM_Fac1'] = $facultad1;
$_SESSION['MM_Fac2'] = $facultad2;
$_SESSION['MM_Fac3'] = $facultad3;
$_SESSION['MM_Fac4'] = $facultad4;
$_SESSION['MM_Fac5'] = $facultad5;
$_SESSION['MM_Fac6'] = $facultad6;
$_SESSION['MM_Fac7'] = $facultad7;
$_SESSION['MM_Fac8'] = $facultad8;        
	}
    
} 


session_start();
//-------------CONDICION ADMINISTRADOR----------------- 
if($poder == 1){    
    if(isset($_SESSION['MM_Username'])) {
	header("Location:principal.php");
	}
}
    
//-----------------CONDICION USUARIO---------------------
if($poder == 2){
 if(isset($_SESSION['MM_Username'])) {
	header("Location:principal.php");
	}
}

$error = $_GET['error'];
}
else{
    echo 'Usuario inválido<br>';
    echo 'Query: '.$sqlogin.'<br>';
    echo 'Numero login: '.$numlogin.'<br>';
}
?>