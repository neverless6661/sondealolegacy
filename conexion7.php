<?php
//variables
$hostname = "34.55.77.19";
$database = "base1";
$username = "sondeadmin";
$password = "srk142536";

//Creamos conexión
$conexion = mysqli_connect($hostname,$username,$password,$database);

$usuario = $_POST['nombre'];
$password = sha1($_POST['contrasena']);

if (!isset($_SESSION)) {
	session_start();
	echo 'Seteando sesion<br>';
}

//error 
if (!$conexion) { echo mysqli_connect_error(); }

if ($resultado = mysqli_query($conexion, "SELECT usuario, contra, activado FROM registros WHERE usuario = '$usuario' AND contra = '$password'")) {
	// printf("La selección devolvió %d filas.\n", mysqli_num_rows($resultado));
	$rowac = mysqli_fetch_array($resultado);   
	$activado = $rowac[2];

	$sqlpoder = "SELECT poder FROM registros WHERE usuario='$usuario'";
	$resultpoder = mysqli_query($conexion, $sqlpoder);
	$rowpoder = mysqli_fetch_row($resultpoder);
	$poder = $rowpoder[0];

	if($activado != 1){
		header("Location: login.php?error=Usuario y/o Contraseña Incorrecto");
	}
	else
	{
		$_SESSION['MM_Poder'] = $poder;
		$_SESSION['MM_Username'] = $usuario;

		$sql = "SELECT identificador FROM usuarios WHERE usuario='$_SESSION[MM_Username]'";
		$result = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_row($result);
		$totalidenti = $row[0];

		$_SESSION['MM_Identi'] = $totalidenti;  

		if($poder == 2){
			if(isset($_SESSION['MM_Username'])) {

				$sql = "SELECT * FROM registros WHERE usuario='$_SESSION[MM_Username]'";
				$result = mysqli_query($conexion, $sql);
				$row = mysqli_fetch_array($result);
				$totalidenti = $row['identificador'];
				$facultad1 = $row['facultad1'];
				$facultad2 = $row['facultad2'];
				$facultad3 = $row['facultad3'];
				$facultad4 = $row['facultad4'];
				$facultad5 = $row['facultad5'];
				$facultad6 = $row['facultad6'];
				$facultad7 = $row['facultad7'];
				$facultad8 = $row['facultad8'];
				$facultad9 = $row['facultad9'];
				$facultad10 = $row['facultad10'];         

				$_SESSION['MM_Identi'] = $totalidenti;
				$_SESSION['MM_Fac1'] = $facultad1;
				$_SESSION['MM_Fac2'] = $facultad2;
				$_SESSION['MM_Fac3'] = $facultad3;
				$_SESSION['MM_Fac4'] = $facultad4;
				$_SESSION['MM_Fac5'] = $facultad5;
				$_SESSION['MM_Fac6'] = $facultad6;
				$_SESSION['MM_Fac7'] = $facultad7;
				$_SESSION['MM_Fac8'] = $facultad8;
				$_SESSION['MM_Fac9'] = $facultad9;
				$_SESSION['MM_Fac10'] = $facultad10;        
			}

		} 

		header("Location:principal.php");
	}

}

else{
	header("Location: login.php?error=Usuario y/o Contraseña Incorrecto");
}
?>