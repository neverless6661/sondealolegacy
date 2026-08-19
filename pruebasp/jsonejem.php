<?php

if(isset($_GET['identificador']) &&
   isset($_GET['usuario']))
{

	$server = "34.55.77.19";
	$user   = "sondeadmin";
	$pass   = "srk142536";
	$bd     = "base1";


	$identificador = $_GET['identificador'];
	$usuario       = $_GET['usuario'];

	//Creamos la conexión
	$conexion = mysqli_connect($server, $user, $pass,$bd);


	$sql_str = "SELECT sucs, poder FROM registros WHERE usuario='$usuario'";

	$query = mysqli_query($conexion, $sql_str);

	if(mysqli_num_rows($query) == 0){
		die('No existe el usuario');

	}
	$info_user = mysqli_fetch_object($query);


	$poder = $info_user->poder;
	$arreglo_final = array();

	if($poder == 1)
	{
		$sql_str_sucusales = "SELECT distinct sucursal FROM sucursales WHERE identificador = $identificador";
		$query_sucursales = mysqli_query($conexion, $sql_str_sucusales);
		if(mysqli_num_rows($query_sucursales) > 0)
		{
			while($suc = mysqli_fetch_object($query_sucursales))
			{
				$arreglo_final[] = array('identificador'=> $identificador,'sucursal'=> $suc->sucursal,'estado'=> '0');
			}

		}



	}
	else{
		$sucursales_arr = explode(',', $info_user->sucs);
		if(count($sucursales_arr) > 0)
		{
			for($i=0;$i<count($sucursales_arr);$i++)
			{
				$arreglo_final[] = array('identificador'=> $identificador,'sucursal'=> $sucursales_arr[$i],'estado'=> '0');
			}
		}
	}



	$json_string = json_encode($arreglo_final);
	echo $json_string;

}

