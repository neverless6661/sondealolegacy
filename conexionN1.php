<?php
/*
DB_CONNECTION=mysql
DB_HOST=35.194.11.126
DB_PORT=3306
DB_DATABASE=mercadito
DB_USERNAME=phpmyadmin
DB_PASSWORD=srk142536
*/
$hostname = '34.55.77.19';
$database = 'base1';
$username = 'sondeadmin';
$password = 'srk142536';

$conexion = new mysqli($hostname,$username,$password,$database);
if($conexion-> connect_errno){
	echo "Error en la conexión con la base de datos";
}

?>