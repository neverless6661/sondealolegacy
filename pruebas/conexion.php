<?php
/*
header('Content-Type: text/html;charset=utf-8');

function ejecutarSQLCommand($comando){
	
	$mysqli = new mysqli("db679746580.db.1and1.com","dbo679746580","kimono1","db679746580");
	// Checar conexion
	if($mysqli->connect_errno){
		printf("Connect failed: %s\n",$mysqli->connect_error);
		exit();
		}
		if($mysqli -> multi_query($comando)){
			if($resultset = $mysqli->store_result()){
				while($row = $resultset->fetch_array(MYSQLI_BOTH)){
					
					}
				$resultset->free();
				}		
			}
	$mysqli->close();
	}
	
	function getSQLResultSet($comando){
		$mysqli = new mysqli("db679746580.db.1and1.com","dbo679746580","kimono1","db679746580");
		//checar conexion
		if($mysqli->connect_errno){
			printf("Connect failed: %s\n",$mysqli->connect_error);
		    exit();
			}
			
			if($mysqli->multi_query($comando)){
				return $mysqli->store_result();
				}
		$mysqli->close();
		}

*/

$host="34.55.77.19"; // Host name 
$username="sondeadmin"; // Mysql username 
$password="srk142536"; // Mysql password 
$db_name="base1"; // Database name 





/*
    define('HOST','db679746580.db.1and1.com');
	define('USER','dbo679746580');
	define('PASS','kimono1');
	define('DB','db679746580');
	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
	*/


?>