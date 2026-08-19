<?php
require_once('Connections/conexion7.php');
$identificador = $_GET['identificador'];
/*
$desde = date('Y-m-d');
$desde = $desde.' 05:00:00';
$hoy = date('Y-m-d');
$hasta = strtotime(' +1 day ', strtotime( $hoy ));
$hasta = date( 'Y-m-d' , $hasta );
$hasta = $hasta.' 05:00:00';
*/
$token = $_GET['token'];
$usuario = $_GET['usuario'];

$conexion = mysqli_connect($hostname,$username,$password,$database);

//echo 'identificador: '.$identificador.'<br>';
//echo 'token: '.$token.'<br>';
//echo 'usuario: '.$usuario.'<br>';

//generamos la consulta
$sql = "SELECT * FROM sucursales WHERE identificador=$identificador ORDER BY id ASC";
$result = mysqli_query($conexion, $sql);

$sqlsucs = "SELECT sucs FROM usuarios WHERE usuario='$usuario'";
$resultsucs = mysqli_query($conexion, $sqlsucs);
$rowsucs = mysqli_fetch_row($resultsucs);
$sucslista = $rowsucs[0];
$sucarray = explode(",",$sucslista);
$numarray = count($sucarray);

//echo 'Suclista: '.$sucslista.'<br>';
//echo 'Sucarray: '.$sucarray[0].'<br>';
//echo 'Numarray: '.$numarray.'<br>';

$clientes = array(); //creamos un array
$j = 0;

while($row = mysqli_fetch_array($result)) 
{ 
    $id=$row['id'];
    $sucursal=$row['sucursal'];
    $identificador=$row['identificador'];
    $empresa=$row['empresa'];
    $tipo = $row['tipousr'];
    
//------*****EMPIEZA CALCULO DE CALIFICACIONES*****--------  
/*     
for($i=1;$i<=12;$i++){
    $sqlvar = "SELECT valor FROM cuestionario WHERE id=$i AND identificador='$identificador' AND sucursal='$sucursal'"; 
    $resultvar = mysqli_query($conexion, $sqlvar);
    $rowvar = mysqli_fetch_row($resultvar);
    ${"variable$i"} = $rowvar[0];
   // echo 'Variable i ciclo: '.${"variable$i"}.'<br>';
}    
    
//CONDICIONALES MULTIPLICACIONES   
for($i=1;$i<=12;$i++){
    ${"multip$i"} = 0;
   // echo 'Multiplicador: '.${"multip$i"}.'<br>'; 
}       	
    
//-----------------Multplicador loop--------------------------//
for($i=1;$i<=12;$i++){    
if(${"variable$i"} == 0){
	${"multip$i"} = 10;
	}
	elseif(${"variable$i"} == 5){
		${"multip$i"} = 1;
		}
		elseif(${"variable$i"} == 1 || ${"variable$i"} == 4){
			${"multip$i"} = 100;
			}
    
   // echo 'Multiplicador Aft comparacion: '.${"multip$i"}.'<br>';
}
   
//Evaluacion servicios
$sqleval = "SELECT (AVG(eval))*".$multip1.",(AVG(eval2))*".$multip2.",(AVG(eval3))*".$multip3.",(AVG(eval4))*".$multip4.",(AVG(eval5))*".$multip5.",(AVG(eval6))*".$multip6.",(AVG(eval7))*".$multip7.",(AVG(eval8))*".$multip8.",(AVG(eval9))*".$multip9.",(AVG(eval10))*".$multip10.",(AVG(eval11))*".$multip11.",(AVG(eval12))*".$multip12." FROM calificaciones WHERE fec BETWEEN '$desde' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal'";
$resulteval = mysqli_query($conexion, $sqleval);
$roweval = mysqli_fetch_array($resulteval);
/*    
for($i=0;$i<=11;$i++){
    echo 'Roweval'.$i.': '.$roweval[$i].'<br>';
}    
*/
/*
//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];
//echo 'Primer total: '.$total.'<br>';    

//Total de ecnuestas
$sqlencuestas = "SELECT COUNT(*) FROM calificaciones WHERE fec BETWEEN '$desde' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal'";
$resultencuestas = mysqli_query($conexion, $sqlencuestas);
$rowencuestas = mysqli_fetch_array($resultencuestas);

//$sqltot = "SELECT valor FROM valores WHERE id=1";
$sqltot2 = "SELECT COUNT(valor) FROM cuestionario WHERE valor=0 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot2 = mysqli_query($conexion, $sqltot2);
$rowtot2 = mysqli_fetch_row($resulttot2);
$total2 = $rowtot2[0];

for($i=1;$i<=12;$i++){     
if(${"variable$i"} == 0){
	${"promedio$i"} = $roweval[$i-1];
	}
	else if(${"variable$i"} == 5){
		${"promedio$i"} = $roweval[$i-1]*0;
		}
}

$evalfinal = ($promedio1+$promedio2+$promedio3+$promedio4+$promedio5+$promedio6+$promedio7+$promedio8+$promedio9+$promedio10+$promedio11+$promedio12)/$total2;

$evalfinal = substr($evalfinal,0,4);    
//echo 'Evalfinal: '.$evalfinal.'<br>';    

*/
   
//------*****TERMINA CALCULO DE CALIFICACIONES*******-------
  /*  
//Seleccionar conteo de badge
$sqlbadge = "SELECT badge FROM notificaciones WHERE token='$token' AND sucursal='$sucursal'";
$resultbadge = mysqli_query($conexion, $sqlbadge);
$rowbadge = mysqli_fetch_row($resultbadge);
$badge = $rowbadge[0];  
*/  

    for($i=1;$i<=$numarray;$i++){
        //echo 'Comparacion- sucunormal: '.$sucursal.' Sucarray: '.$sucarray[$i-1].'<br>';
    if($sucursal == $sucarray[$i-1]){
        
    $sucursales[] = array($sucarray[$i-1].'--'.$tipo);
        //echo 'Si entro al if<br>';
        
        /*
        $json_string1 = json_encode($sucarray[$i-1]);
        echo $json_string1;
        $json_string2 = json_encode($evalfinal);
        echo $json_string2;
        $json_string3 = json_encode($badge);
        echo $json_string3; */
        }
    }    
}
    
//Creamos el JSON

$json_string = json_encode($sucursales);
echo $json_string;
?>