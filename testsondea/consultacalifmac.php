<?php
require_once('Connections/conexion.php');
//include('functions.php');
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
$desde = date('Y-m-d');
$desde = $desde.' 05:00:00';
$hoy = date('Y-m-d');
$hasta = strtotime(' +1 day ', strtotime( $hoy ));
$hasta = date( 'Y-m-d' , $hasta );
$hasta = $hasta.' 05:00:00';
echo 'Desde: '.$desde.'<br>Hasta: '.$hasta;

//$estado = array();

/*
if($resultset=getSQLResultSet("SELECT estado FROM estadomsj WHERE identificador='$identificador' AND sucursal='$sucursal'")){
	while($row['estado'] = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}
*/

mysql_connect($hostname, $username, $password);
mysql_select_db($database);

$sql = "SELECT * FROM calificaciones WHERE fec BETWEEN '$desde' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal' ORDER BY id ASC";
$result = mysql_query($sql);

//Evaluacion servicios
$sqleval = "SELECT (AVG(eval))*".$multip1.",(AVG(eval2))*".$multip2.",(AVG(eval3))*".$multip3.",(AVG(eval4))*".$multip4.",(AVG(eval5))*".$multip5.",(AVG(eval6))*".$multip6.",(AVG(eval7))*".$multip7.",(AVG(eval8))*".$multip8.",(AVG(eval9))*".$multip9.",(AVG(eval10))*".$multip10.",(AVG(eval11))*".$multip11.",(AVG(eval12))*".$multip12." FROM calificaciones WHERE fec BETWEEN '$desde' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal'";
$resulteval = mysql_query($sqleval);
$roweval = mysql_fetch_array($resulteval);

//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysql_query($sqltot);
$rowtot = mysql_fetch_row($resulttot);
$total = $rowtot[0];

//Total de ecnuestas
$sqlencuestas = "SELECT COUNT(*) FROM calificaciones WHERE fec BETWEEN '$desde' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal'";
$resultencuestas = mysql_query($sqlencuestas);
$rowencuestas = mysql_fetch_array($resultencuestas);

//--------Pregunta Variables----------------
////VARIABLE 1
$sqlvar = "SELECT valor FROM cuestionario WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable = $rowvar[0];

////VARIABLE 2
$sqlvar = "SELECT valor FROM cuestionario WHERE id=2 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable2 = $rowvar[0];

////VARIABLE 3
$sqlvar = "SELECT valor FROM cuestionario WHERE id=3 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable3 = $rowvar[0];

////VARIABLE 4
$sqlvar = "SELECT valor FROM cuestionario WHERE id=4 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable4 = $rowvar[0];

////VARIABLE 5
$sqlvar = "SELECT valor FROM cuestionario WHERE id=5 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable5 = $rowvar[0];

////VARIABLE 6
$sqlvar = "SELECT valor FROM cuestionario WHERE id=6 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable6 = $rowvar[0];

////VARIABLE 7
$sqlvar = "SELECT valor FROM cuestionario WHERE id=7 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable7 = $rowvar[0];

////VARIABLE 8
$sqlvar = "SELECT valor FROM cuestionario WHERE id=8 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable8 = $rowvar[0];

////VARIABLE 9
$sqlvar = "SELECT valor FROM cuestionario WHERE id=9 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable9 = $rowvar[0];

////VARIABLE 10
$sqlvar = "SELECT valor FROM cuestionario WHERE id=10 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable10 = $rowvar[0];

////VARIABLE 11
$sqlvar = "SELECT valor FROM cuestionario WHERE id=11 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable11 = $rowvar[0];

////VARIABLE 12
$sqlvar = "SELECT valor FROM cuestionario WHERE id=12 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysql_query($sqlvar);
$rowvar = mysql_fetch_row($resultvar);
$variable12 = $rowvar[0];

//$sqltot = "SELECT valor FROM valores WHERE id=1";
$sqltot2 = "SELECT COUNT(valor) FROM cuestionario WHERE valor=0 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot2 = mysql_query($sqltot2);
$rowtot2 = mysql_fetch_row($resulttot2);
$total2 = $rowtot2[0];

if($variable == 0){
	$promedio1 = $roweval[0];
	}
	else if($variable == 5){
		$promedio1 = $roweval[0]*0;
		}
		
		
if($variable2 == 0){
	$promedio2 = $roweval[1];
	}
	else if($variable2 == 5){
		$promedio2 = $roweval[1]*0;
		}
		
		
if($variable3 == 0){
	$promedio3 = $roweval[2];
	}
	else if($variable3 == 5){
		$promedio3 = $roweval[2]*0;
		}
		
		
if($variable4 == 0){
	$promedio4 = $roweval[3];
	}
	else if($variable4 == 5){
		$promedio4 = $roweval[3]*0;
		}
		
		
if($variable5 == 0){
	$promedio5 = $roweval[4];
	}
	else if($variable5 == 5){
		$promedio5 = $roweval[4]*0;
		}
		
		
if($variable6 == 0){
	$promedio6 = $roweval[5];
	}
	else if($variable6 == 5){
		$promedio6 = $roweval[5]*0;
		}
	
	
if($variable7 == 0){
	$promedio7 = $roweval[6];
	}
	else if($variable7 == 5){
		$promedio7 = $roweval[6]*0;
		}
	
		
if($variable8 == 0){
	$promedio8 = $roweval[7];
	}		
	else if($variable8 == 5){
		$promedio8 = $roweval[7]*0;
		}
	
	
if($variable9 == 0){
	$promedio9 = $roweval[8];
	}
	else if($variable9 == 5){
		$promedio9 = $roweval[8]*0;
		}
		
	
if($variable10 == 0){
	$promedio10 = $roweval[9];
	}
	else if($variable10 == 5){
		$promedio10 = $roweval[9]*0;
		}
	
	
if($variable11 == 0){
	$promedio11 = $roweval[10];
	}
	else if($variable11 == 5){
		$promedio11 = $roweval[10]*0;
		}
	
	
if($variable12 == 0){
	$promedio12 = $roweval[11];
	}
	else if($variable12 == 5){
		$promedio12 = $roweval[11]*0;
		}


$evalfinal = ($promedio1+$promedio2+$promedio3+$promedio4+$promedio5+$promedio6+$promedio7+$promedio8+$promedio9+$promedio10+$promedio11+$promedio12)/$total2;

	echo json_encode($evalfinal);	

?>