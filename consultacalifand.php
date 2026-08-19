<?php
require_once('Connections/conexion7.php');
//include('functions.php');
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];
$desde = date('Y-m-d');
$desde = $desde.' 05:00:00';
$hoy = date('Y-m-d');
$hasta = strtotime(' +1 day ', strtotime( $hoy ));
$hasta = date( 'Y-m-d' , $hasta );
$hasta = $hasta.' 05:00:00';
//echo 'Desde: '.$desde.'<br>Hasta: '.$hasta.'<br>';

//$estado = array();

/*
if($resultset=getSQLResultSet("SELECT estado FROM estadomsj WHERE identificador='$identificador' AND sucursal='$sucursal'")){
	while($row['estado'] = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
		}
	}
*/

$conexion = mysqli_connect($hostname,$username,$password,$database);

$sql = "SELECT * FROM calificaciones WHERE fec BETWEEN '$desde' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal' ORDER BY id ASC";
$result = mysqli_query($conexion, $sql);

//--------Pregunta Variables----------------
////VARIABLE 1
$sqlvar = "SELECT valor FROM cuestionario WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable = $rowvar[0];

////VARIABLE 2
$sqlvar = "SELECT valor FROM cuestionario WHERE id=2 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable2 = $rowvar[0];

////VARIABLE 3
$sqlvar = "SELECT valor FROM cuestionario WHERE id=3 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable3 = $rowvar[0];

////VARIABLE 4
$sqlvar = "SELECT valor FROM cuestionario WHERE id=4 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable4 = $rowvar[0];

////VARIABLE 5
$sqlvar = "SELECT valor FROM cuestionario WHERE id=5 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable5 = $rowvar[0];

////VARIABLE 6
$sqlvar = "SELECT valor FROM cuestionario WHERE id=6 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable6 = $rowvar[0];

////VARIABLE 7
$sqlvar = "SELECT valor FROM cuestionario WHERE id=7 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable7 = $rowvar[0];

////VARIABLE 8
$sqlvar = "SELECT valor FROM cuestionario WHERE id=8 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable8 = $rowvar[0];

////VARIABLE 9
$sqlvar = "SELECT valor FROM cuestionario WHERE id=9 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable9 = $rowvar[0];

////VARIABLE 10
$sqlvar = "SELECT valor FROM cuestionario WHERE id=10 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable10 = $rowvar[0];

////VARIABLE 11
$sqlvar = "SELECT valor FROM cuestionario WHERE id=11 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable11 = $rowvar[0];

////VARIABLE 12
$sqlvar = "SELECT valor FROM cuestionario WHERE id=12 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultvar = mysqli_query($conexion, $sqlvar);
$rowvar = mysqli_fetch_row($resultvar);
$variable12 = $rowvar[0];

//CONDICIONALES MULTIPLICACIONES
$multip1 = 0;
$multip2 = 0;
$multip3 = 0;
$multip4 = 0;
$multip5 = 0;
$multip6 = 0;
$multip7 = 0;
$multip8 = 0;
$multip9 = 0;
$multip10 = 0;
$multip11 = 0;
$multip12 = 0;

//-----------------Multplicador 1--------------------------//
if($variable == 0){
	$multip1 = 10;
	}
	else if($variable == 5){
		$multip1 = 1;
		}
		elseif($variable == 1 || $variable == 4){
			$multip1 = 100;
			}
		
//-----------------Multplicador 2--------------------------//
if($variable2 == 0){
	$multip2 = 10;
	}
	else if($variable2 == 5){
		$multip2 = 1;
		}
		elseif($variable2 == 1 || $variable2 == 4){
			$multip2 = 100;
			}
		
//-----------------Multplicador 3--------------------------//
if($variable3 == 0){
	$multip3 = 10;
	}
	else if($variable3 == 5){
		$multip3 = 1;
		}
		elseif($variable3 == 1 || $variable3 == 4){
			$multip3 = 100;
			}	
		
//-----------------Multplicador 4--------------------------//
if($variable4 == 0){
	$multip4 = 10;
	}
	else if($variable4 == 5){
		$multip4 = 1;
		}
		elseif($variable4 == 1 || $variable4 == 4){
			$multip4 = 100;
			}
		
//-----------------Multplicador 5--------------------------//
if($variable5 == 0){
	$multip5 = 10;
	}
	else if($variable5 == 5){
		$multip5 = 1;
		}
		elseif($variable5 == 1 || $variable5 == 4){
			$multip5 = 100;
			}
		
//-----------------Multplicador 6--------------------------//
if($variable6 == 0){
	$multip6 = 10;
	}
	else if($variable6 == 5){
		$multip6 = 1;
		}
		else if($variable6 == 1 || $variable6 == 4){
			$multip6 = 100;
			}
		
//-----------------Multplicador 7--------------------------//
if($variable7 == 0){
	$multip7 = 10;
	}
	elseif($variable7 == 5){
		$multip7 = 1;
		}
		else if($variable7 == 1 || $variable7 == 4){
			$multip7 = 100;
			}
		
//-----------------Multplicador 8--------------------------//
if($variable8 == 0){
	$multip8 = 10;
	}
	else if($variable8 == 5){
		$multip8 = 1;
		}
		else if($variable8 == 1 || $variable8 == 4){
			$multip8 = 100;
			}
		
//-----------------Multplicador 9--------------------------//
if($variable9 == 0){
	$multip9 = 10;
	}
	else if($variable9 == 5){
		$multip9 = 1;
		}
		else if($variable9 == 1 || $variable9 == 4){
			$multip9 = 100;
			}
		
//-----------------Multplicador 10--------------------------//
if($variable10 == 0){
	$multip10 = 10;
	}
	else if($variable10 == 5){
		$multip10 = 1;
		}
		else if($variable10 == 1 || $variable10 == 4){
			$multip10 = 100;
			}
		
//-----------------Multplicador 11--------------------------//
if($variable11 == 0){
	$multip11 = 10;
	}
	else if($variable11 == 5){
		$multip11 = 1;
		}
		else if($variable11 == 1 || $variable11 == 4){
			$multip11 = 100;
			}
		
//-----------------Multplicador 12--------------------------//
if($variable12 == 0){
	$multip12 = 10;
	}
	else if($variable12 == 5){
		$multip12 = 1;
		}
		else if($variable12 == 1 || $variable12 == 4){
			$multip12 = 100;
			}

//Evaluacion servicios
$sqleval = "SELECT (AVG(eval))*".$multip1.",(AVG(eval2))*".$multip2.",(AVG(eval3))*".$multip3.",(AVG(eval4))*".$multip4.",(AVG(eval5))*".$multip5.",(AVG(eval6))*".$multip6.",(AVG(eval7))*".$multip7.",(AVG(eval8))*".$multip8.",(AVG(eval9))*".$multip9.",(AVG(eval10))*".$multip10.",(AVG(eval11))*".$multip11.",(AVG(eval12))*".$multip12." FROM calificaciones WHERE fec BETWEEN '$desde' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal'";
$resulteval = mysqli_query($conexion, $sqleval);
$roweval = mysqli_fetch_array($resulteval);

//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];

//Total de ecnuestas
$sqlencuestas = "SELECT COUNT(*) FROM calificaciones WHERE fec BETWEEN '$desde' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal'";
$resultencuestas = mysqli_query($conexion, $sqlencuestas);
$rowencuestas = mysqli_fetch_array($resultencuestas);



//$sqltot = "SELECT valor FROM valores WHERE id=1";
$sqltot2 = "SELECT COUNT(valor) FROM cuestionario WHERE (valor=0 OR valor=5) AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot2 = mysqli_query($conexion, $sqltot2);
$rowtot2 = mysqli_fetch_row($resulttot2);
$total2 = $rowtot2[0];

if($variable == 0){
	$promedio1 = $roweval[0];
	}
	else if($variable == 5){
		$promedio1 = $roweval[0];
		}
		
		
if($variable2 == 0){
	$promedio2 = $roweval[1];
	}
	else if($variable2 == 5){
		$promedio2 = $roweval[1];
		}
		
		
if($variable3 == 0){
	$promedio3 = $roweval[2];
	}
	else if($variable3 == 5){
		$promedio3 = $roweval[2];
		}
		
		
if($variable4 == 0){
	$promedio4 = $roweval[3];
	}
	else if($variable4 == 5){
		$promedio4 = $roweval[3];
		}
		
		
if($variable5 == 0){
	$promedio5 = $roweval[4];
	}
	else if($variable5 == 5){
		$promedio5 = $roweval[4];
		}
		
		
if($variable6 == 0){
	$promedio6 = $roweval[5];
	}
	else if($variable6 == 5){
		$promedio6 = $roweval[5];
		}
	
	
if($variable7 == 0){
	$promedio7 = $roweval[6];
	}
	else if($variable7 == 5){
		$promedio7 = $roweval[6];
		}
	
		
if($variable8 == 0){
	$promedio8 = $roweval[7];
	}		
	else if($variable8 == 5){
		$promedio8 = $roweval[7];
		}
	
	
if($variable9 == 0){
	$promedio9 = $roweval[8];
	}
	else if($variable9 == 5){
		$promedio9 = $roweval[8];
		}
		
	
if($variable10 == 0){
	$promedio10 = $roweval[9];
	}
	else if($variable10 == 5){
		$promedio10 = $roweval[9];
		}
	
	
if($variable11 == 0){
	$promedio11 = $roweval[10];
	}
	else if($variable11 == 5){
		$promedio11 = $roweval[10];
		}
	
	
if($variable12 == 0){
	$promedio12 = $roweval[11];
	}
	else if($variable12 == 5){
		$promedio12 = $roweval[11];
		}

//for($i=1;$i<=12;$i++){
  //  echo 'Multplicador'.$i.': '.${"multip$i"}.'<br>';
//}

//echo 'Rows: Row1='.$roweval[0].',Row2='.$roweval[1].',Row3='.$roweval[2].',Row4='.$roweval[3].',Row5='.$roweval[4].',Row6='.$roweval[5].',Row7='.$roweval[6].',Row8='.$roweval[7].',Row9='.$roweval[8].',Row10='.$roweval[9].',Row11='.$roweval[10].',Row12='.$roweval[11].'<br>';

//echo 'Variables: Variable1='.$variable.',Variable2='.$variable2.',Variable3='.$variable3.',Variable4='.$variable4.',Variable5='.$variable5.',Variable6='.$variable6.',Variable7='.$variable7.',Variable8='.$variable8.',Variable9='.$variable9.',Variable10='.$variable10.',Variable11='.$variable11.',Variable12='.$variable12.'<br>';

//echo 'Promedios: Promedio1: '.$promedio1.',Promedio2: '.$promedio2.',Promedio 3: '.$promedio3.', Promedio 4: '.$promedio4.',Promedio 5: '.$promedio5.',Promedio 6: '.$promedio6.',Promedio 7: '.$promedio7.',Promedio 8: '.$promedio8.',Promedio 9: '.$promedio9.',Promedio 10: '.$promedio10.',Promedio 11: '.$promedio11.',Promedio 12: '.$promedio12.'<br>';

//echo 'Total 2: '.$total2.'<br>';


$evalfinal = ($promedio1+$promedio2+$promedio3+$promedio4+$promedio5+$promedio6+$promedio7+$promedio8+$promedio9+$promedio10+$promedio11+$promedio12)/$total2;

$evalfinal = substr($evalfinal,0,4);

$evalu = strval($evalfinal);

$arr = array('calif' => $evalu);

	echo "[".json_encode($evalfinal)."]";	

?>