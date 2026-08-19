<?php
header('Content-Type: text/html;charset=utf-8');

function ejecutarSQLCommand($comando){
	
	$mysqli = new mysqli("34.55.77.19","sondeadmin","srk142536","base1");
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
		$mysqli = new mysqli("34.55.77.19","sondeadmin","srk142536","base1");
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


?>