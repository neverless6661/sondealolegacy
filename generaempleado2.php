<?php ob_start();?>
<?php require_once('Connections/conexion7.php'); 
$desde1 = $_GET['desde1'].' 05:00:00';
$hasta = $_GET['hasta1'].' 05:00:00';
$sucursal = $_GET['sucursal'];
$identificador= $_GET['identificador'];

$year = substr($hasta,0,4);
$month = substr($hasta,5,2);
$day = substr($hasta,8,2);
$diafebrero = '28';

//AÑOS BISIESTOS
if(($year == '2020') || ($year == '2024') || ($year == '2028') || ($year == '2032') || ($year == '2036') || ($year == '2040') || ($year == '2044') || ($year == '2048') || ($year == '2052') || ($year == '2056') || ($year == '2060') || ($year == '2064') || ($year == '2068') || ($year == '2072') || ($year == '2076') || ($year == '2080') || ($year == '2084') || ($year == '2088') || ($year == '2092') || ($year == '2096') || ($year == '2104') || ($year == '2108') || ($year == '2112') || ($year == '2116')){
	$diafebrero = '29';
	}
	
if(($month == '12')&&($day == '31')){
	$day = '01';
	$month = '01';
	$year = $year+1;
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}
	
else if(($month == '11')&&($day == '30')){
	$day = '01';
	$month = '12';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}
	
	
else if(($month == '10')&&($day == '31')){
	$day = '01';
	$month = '11';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}

else if(($month == '09')&&($day == '30')){
	$day = '01';
	$month = '10';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}
	
else if(($month == '08')&&($day == '31')){
	$day = '01';
	$month = '09';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}
	
else if(($month == '07')&&($day == '31')){
	
	$day = '01';
	$month = '08';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}
	
else if(($month == '06')&&($day == '30')){
	$day = '01';
	$month = '07';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}					
	
else if(($month == '05')&&($day == '31')){
	$day = '01';
	$month = '06';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}
	
else if(($month == '04')&&($day == '30')){
	$day = '01';
	$month = '05';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}

else if(($month == '03')&&($day == '31')){
	$day = '01';
	$month = '04';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}

//FEBRERO
else if(($month == '02')&&($day == $diafebrero)){
	$day = '01';
	$month = '03';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}
	
else if(($month == '01')&&($day == '31')){
	$day = '01';
	$month = '02';
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}					
else{
	//$hasta1= str_replace($day, $day+1, $hasta);
    $day = $day+1;
	if(strlen($day)==1){
	$day='0'.$day;
	}
	$hasta = $year.'-'.$month.'-'.$day.' 05:00:00';
	}


/*
echo 'Desde: '.$desde1;
echo '<br>';
echo 'Hasta: '.$hasta;
echo '<br>';
*/

$conexion = mysqli_connect($hostname,$username,$password,$database);

//NOMBRE EMPRESA
$sqlemp = "SELECT empresa FROM registros WHERE identificador='$identificador'";
$resemp = mysqli_query($conexion, $sqlemp);
$rowemp = mysqli_fetch_row($resemp);
$empres = $rowemp[0];

//RUTA LOGO
$sqlruta = "SELECT ruta FROM logoimagen WHERE identificador='$identificador' AND sucursal='$sucursal'";
$resulruta = mysqli_query($conexion, $sqlruta);
$rowruta = mysqli_fetch_row($resulruta);
$rutalogo = $rowruta[0];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        
<link rel="shortcut icon" href="logo.ico" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sondealo</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="movil/estilos.css">
<link rel="stylesheet" href="movil/style.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="movil/main.js"></script>
<style type="text/css">
@font-face {
    font-family: 'vanilla_extractregular';
    src: url('vanillaextractregular-webfont.woff2') format('woff2'),
         url('vanillaextractregular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;

} 


body { 
   /* font-family: 'vanilla_extractregular';
	background-color: #ffffff; */
    background: -webkit-linear-gradient(to bottom right, #349cfc, #0457a4); /* For Safari 5.1 to 6.0 */
background: -o-linear-gradient(to bottom right, #349cfc, #0457a4); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(to bottom right, #349cfc, #0457a4); /* For Firefox 3.6 to 15 */
background: linear-gradient(to bottom right, #349cfc, #0457a4);
	height: 100%;
	margin-left: 0px;
	margin-right: 0px;
}
fecha {
	color:#ffffff;
	/* background-color:#000; */
	font-family: 'vanilla_extractregular';
	font-size: 18px;
}
.fecha {
	color:#ffffff;
	/* background-color:#000; */
	font-family: 'vanilla_extractregular';
	font-size: 18px;
	text-align: center;
}

a:link   
{   
 /* color:#000; */
 text-decoration:none;   
}  

a:hover {
/*	color:#000; */
}

a:visited {
/*	color:#000; */
}

#contenedor {width: 100%; height: 100%; margin-top:0em; border:0px solid; padding:0em;}
#col_der, #col_izq, #col_cen {height: 100%;}
#col_der {float: right; width: 0%;}
#col_izq {float: left; width: 0%;padding: }
#col_cen {font-family: 'vanilla_extractregular'; float: center; width: 100%; background:url(fotos/fondo.png) top center; background-size:cover; margin-right:0em; margin-left:0em; font-size:24px}

#pie1 {background-color:#000}
#pie2 {background-color:#000}

#finalpie {
	alignment-adjust:central;
	background-color:#518ceb;
	width:100%;
	}
#pielogo
{
	font-family: 'vanilla_extractregular';
	/* color: #BE862C; */
	font-size: 20px;
	text-decoration:none;
}
#pielogo:hover{
	/* color:#FFF; */
}


#white {
	color:#FFFFFF;
}

.prueba1 {
   margin: 10px;
   width: 250px;
   height: 450px;
   background: #518ceb;
   border: 1px solid #518ceb;
   max-height: 250px;
    transition: max-height 0.15s ease-out;
    overflow: hidden;
}
   .prueba1:hover{
      width: 250px;
      max-height: 450px;
    transition: max-height 0.25s ease-in;

    }   
    
    #fuente{
        font-family: 'vanilla_extractregular';
        color: white;
	    font-size:10px;
    }
	#fuente2{
		font-family: 'vanilla_extractregular';
		font-size:10px;
		}
	.fuente{
		font-family: 'vanilla_extractregular';
		color:white;
		font-size:10px;
		}
	.fuente2{
		font-family: 'vanilla_extractregular';
		font-size:10px;
		}
		
.degradado {
background: -webkit-linear-gradient(#f8f8f8, #cdcbcc); /* For Safari 5.1 to 6.0 */
background: -o-linear-gradient(#f8f8f8, #cdcbcc); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(#f8f8f8, #cdcbcc); /* For Firefox 3.6 to 15 */
background: linear-gradient(#f8f8f8, #cdcbcc); /* Standard syntax */
} 
    
.degradado2 {
background: -webkit-linear-gradient(#357ae8, #9abcf3); /* For Safari 5.1 to 6.0 */
background: -o-linear-gradient(#357ae8, #9abcf3); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(#357ae8, #9abcf3); /* For Firefox 3.6 to 15 */
background: linear-gradient(#357ae8, #9abcf3); /* Standard syntax */
}	
    
    table tbody {
        display: block;
        border: 2px solid white;   
     }
 
</style>

<script>
function highlight(which,color){
if (document.all||document.getElementById)
which.style.backgroundColor=color}
</script>


<script type="text/javascript">
var dir = window.document.URL;
var dir2 = encodeURIComponent(dir);
var tit = window.document.title;
var tit2 = encodeURIComponent(tit);
</script>




</head>

<body>


<div align='center' id="contenedor">
<div align='center' id='col_cen'>
 
<div id="fuente2" align="center">
  Reporte Generado el: <?php echo date('Y-m-d   g:i a') ?>
  <br><br>
  <img src="<?php echo '/'.$rutalogo ?>" width="60px" height="60px"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>    
    
<?php
//$desde1 = $_POST['desde1'];
//$hasta1 = $_POST['hasta1'];
    
echo '<div align="center" id="fuente2"><br>&nbsp;&nbsp;Encuesta: '.$empres;
echo '<br>&nbsp;&nbsp;Sucursal: '.$sucursal.'<br><br>';    

$sql = "SELECT * FROM calificaciones WHERE fec BETWEEN '$desde1' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal'";
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
	elseif($variable == 5){
		$multip1 = 1;
		}
		elseif($variable == 1 || $variable == 4){
			$multip1 = 100;
			}
		
//-----------------Multplicador 2--------------------------//
if($variable2 == 0){
	$multip2 = 10;
	}
	elseif($variable2 == 5){
		$multip2 = 1;
		}
		elseif($variable2 == 1 || $variable2 == 4){
			$multip2 = 100;
			}
		
//-----------------Multplicador 3--------------------------//
if($variable3 == 0){
	$multip3 = 10;
	}
	elseif($variable3 == 5){
		$multip3 = 1;
		}
		elseif($variable3 == 1 || $variable3 == 4){
			$multip3 = 100;
			}	
		
//-----------------Multplicador 4--------------------------//
if($variable4 == 0){
	$multip4 = 10;
	}
	elseif($variable4 == 5){
		$multip4 = 1;
		}
		elseif($variable4 == 1 || $variable4 == 4){
			$multip4 = 100;
			}
		
//-----------------Multplicador 5--------------------------//
if($variable5 == 0){
	$multip5 = 10;
	}
	elseif($variable5 == 5){
		$multip5 = 1;
		}
		elseif($variable5 == 1 || $variable5 == 4){
			$multip5 = 100;
			}
		
//-----------------Multplicador 6--------------------------//
if($variable6 == 0){
	$multip6 = 10;
	}
	elseif($variable6 == 5){
		$multip6 = 1;
		}
		elseif($variable6 == 1 || $variable6 == 4){
			$multip6 = 100;
			}
		
//-----------------Multplicador 7--------------------------//
if($variable7 == 0){
	$multip7 = 10;
	}
	elseif($variable7 == 5){
		$multip7 = 1;
		}
		elseif($variable7 == 1 || $variable7 == 4){
			$multip7 = 100;
			}
		
//-----------------Multplicador 8--------------------------//
if($variable8 == 0){
	$multip8 = 10;
	}
	elseif($variable8 == 5){
		$multip8 = 1;
		}
		elseif($variable8 == 1 || $variable8 == 4){
			$multip8 = 100;
			}
		
//-----------------Multplicador 9--------------------------//
if($variable9 == 0){
	$multip9 = 10;
	}
	elseif($variable9 == 5){
		$multip9 = 1;
		}
		elseif($variable9 == 1 || $variable9 == 4){
			$multip9 = 100;
			}
		
//-----------------Multplicador 10--------------------------//
if($variable10 == 0){
	$multip10 = 10;
	}
	elseif($variable10 == 5){
		$multip10 = 1;
		}
		elseif($variable10 == 1 || $variable10 == 4){
			$multip10 = 100;
			}
		
//-----------------Multplicador 11--------------------------//
if($variable11 == 0){
	$multip11 = 10;
	}
	elseif($variable11 == 5){
		$multip11 = 1;
		}
		elseif($variable11 == 1 || $variable11 == 4){
			$multip11 = 100;
			}
		
//-----------------Multplicador 12--------------------------//
if($variable12 == 0){
	$multip12 = 10;
	}
	elseif($variable12 == 5){
		$multip12 = 1;
		}
		elseif($variable12 == 1 || $variable12 == 4){
			$multip12 = 100;
			}
			
$simbporc1 = '';
$simbporc2 = '';
$simbporc3 = '';
$simbporc4 = '';
$simbporc5 = '';
$simbporc6 = '';
$simbporc7 = '';
$simbporc8 = '';
$simbporc9 = '';
$simbporc10 = '';
$simbporc11 = '';
$simbporc12 = '';

//-----------SIMBOLOS DE PORCIENTO % 1------------//
if($variable == 1 || $variable == 4){
	$simbporc1 = '%';
	}
	
//-----------SIMBOLOS DE PORCIENTO % 2------------//
if($variable2 == 1 || $variable2 == 4){
	$simbporc2 = '%';
	}
//-----------SIMBOLOS DE PORCIENTO % 3------------//
if($variable3 == 1 || $variable3 == 4){
	$simbporc3 = '%';
	}
//-----------SIMBOLOS DE PORCIENTO % 4------------//
if($variable4 == 1 || $variable4 == 4){
	$simbporc4 = '%';
	}
//-----------SIMBOLOS DE PORCIENTO % 5------------//
if($variable5 == 1 || $variable5 == 4){
	$simbporc5 = '%';
	}
//-----------SIMBOLOS DE PORCIENTO % 6------------//
if($variable6 == 1 || $variable6 == 4){
	$simbporc6 = '%';
	}	
//-----------SIMBOLOS DE PORCIENTO % 7------------//
if($variable7 == 1 || $variable7 == 4){
	$simbporc7 = '%';
	}
//-----------SIMBOLOS DE PORCIENTO % 8------------//
if($variable8 == 1 || $variable8 == 4){
	$simbporc8 = '%';
	}
//-----------SIMBOLOS DE PORCIENTO % 9------------//
if($variable9 == 1 || $variable9 == 4){
	$simbporc9 = '%';
	}
//-----------SIMBOLOS DE PORCIENTO % 10------------//
if($variable10 == 1 || $variable10 == 4){
	$simbporc10 = '%';
	}
//-----------SIMBOLOS DE PORCIENTO % 11------------//
if($variable11 == 1 || $variable11 == 4){
	$simbporc11 = '%';
	}
//-----------SIMBOLOS DE PORCIENTO % 12------------//
if($variable12 == 1 || $variable12 == 4){
	$simbporc12 = '%';
	}																	
			
//Pregunta 1
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg1 = mysqli_fetch_array($resultpreg);

//Pregunta 2
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=2 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg2 = mysqli_fetch_array($resultpreg);

//Pregunta 3
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=3 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg3 = mysqli_fetch_array($resultpreg);

//Pregunta 4
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=4 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg4 = mysqli_fetch_array($resultpreg);

//Pregunta 5
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=5 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg5 = mysqli_fetch_array($resultpreg);

//Pregunta 6
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=6 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg6 = mysqli_fetch_array($resultpreg);

//Pregunta 7
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=7 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg7 = mysqli_fetch_array($resultpreg);

//Pregunta 8
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=8 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg8 = mysqli_fetch_array($resultpreg);

//Pregunta 9
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=9 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg9 = mysqli_fetch_array($resultpreg);

//Pregunta 10
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=10 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg10 = mysqli_fetch_array($resultpreg);

//Pregunta 11
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=11 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg11 = mysqli_fetch_array($resultpreg);

//Pregunta 12
$sqlpreg = "SELECT pregunta FROM cuestionario WHERE id=12 AND identificador='$identificador' AND sucursal='$sucursal'";
$resultpreg = mysqli_query($conexion, $sqlpreg);
$rowpreg12 = mysqli_fetch_array($resultpreg);			
    
//---------------Empieza tabla Empleados-------------------------------------

//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
//$sqltot = "SELECT COUNT(valor) FROM cuestionario WHERE valor=0";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];

//$sqltot = "SELECT valor FROM valores WHERE id=1";
$sqltot = "SELECT COUNT(valor) FROM cuestionario WHERE valor=0 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total2 = $rowtot[0];

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

$sql = "SELECT mesero, (AVG(eval))*".$multip1.",
(AVG(eval2))*".$multip2.",
(AVG(eval3))*".$multip3.",
(AVG(eval4))*".$multip4.",
(AVG(eval5))*".$multip5.",
(AVG(eval6))*".$multip6.",
(AVG(eval7))*".$multip7.",
(AVG(eval8))*".$multip8.",
(AVG(eval9))*".$multip9.",
(AVG(eval10))*".$multip10.",
(AVG(eval11))*".$multip11.",
(AVG(eval12))*".$multip12.", 
(
if($variable = 0,(AVG(eval))*10,0)
+
if($variable2 = 0,(AVG(eval2))*10,0)
+
if($variable3 = 0,(AVG(eval3))*10,0)
+
if($variable4 = 0,(AVG(eval4))*10,0)
+
if($variable5 = 0,(AVG(eval5))*10,0)
+
if($variable6 = 0,(AVG(eval6))*10,0)
+
if($variable7 = 0,(AVG(eval7))*10,0)
+
if($variable8 = 0,(AVG(eval8))*10,0)
+
if($variable9 = 0,(AVG(eval9))*10,0)
+
if($variable11 = 0,(AVG(eval10))*10,0)
+
if($variable12 = 0,(AVG(eval11))*10,0)
+
if($variable12 = 0,(AVG(eval12))*10,0)
)/$total2 AS 'cal' FROM calificaciones WHERE fec BETWEEN '$desde1' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal' GROUP BY mesero ORDER BY cal DESC";
$result = mysqli_query($conexion, $sql);

//nombres meseros
$sqlmesero = "SELECT nombre FROM meseros1 WHERE identificador='$identificador' AND sucursal='$sucursal'";
$resultmesero = mysqli_query($conexion, $sqlmesero);

//contar meseros
$sqlcuenta = "SELECT COUNT(mesero) AS 'cuenta', (AVG(eval))*".$multip1.",
(AVG(eval2))*".$multip2.",
(AVG(eval3))*".$multip3.",
(AVG(eval4))*".$multip4.",
(AVG(eval5))*".$multip5.",
(AVG(eval6))*".$multip6.",
(AVG(eval7))*".$multip7.",
(AVG(recomen))*".$multip8.",
(AVG(eval9))*".$multip9.",
(AVG(eval10))*".$multip10.",
(AVG(eval11))*".$multip11.",
(AVG(eval12))*".$multip12.", 
(
if($variable = 0,(AVG(eval))*10,0)
+
if($variable2 = 0,(AVG(eval2))*10,0)
+
if($variable3 = 0,(AVG(eval3))*10,0)
+
if($variable4 = 0,(AVG(eval4))*10,0)
+
if($variable5 = 0,(AVG(eval5))*10,0)
+
if($variable6 = 0,(AVG(eval6))*10,0)
+
if($variable7 = 0,(AVG(eval7))*10,0)
+
if($variable8 = 0,(AVG(eval8))*10,0)
+
if($variable9 = 0,(AVG(eval9))*10,0)
+
if($variable11 = 0,(AVG(eval10))*10,0)
+
if($variable12 = 0,(AVG(eval11))*10,0)
+
if($variable12 = 0,(AVG(eval12))*10,0)
)/$total2 AS 'cal' FROM calificaciones WHERE fec BETWEEN '$desde1' AND '$hasta' AND identificador='$identificador' AND sucursal='$sucursal' GROUP BY mesero ORDER BY cal DESC";
$resultcuenta = mysqli_query($conexion, $sqlcuenta);



	
while($row = mysqli_fetch_array($result) and $rowcuenta = mysqli_fetch_array($resultcuenta))
{
    
////ENCUESTAS NO CONTESTADAS POR MESERO 
$sqlnomesero = "SELECT COUNT(cantidad) FROM nocontestadas WHERE fec2 BETWEEN '$desde1' AND '$hasta' AND identificador=$identificador AND sucursal='$sucursal' AND meseros='".$row['mesero']."'"; 
$resultnomesero = mysqli_query($conexion, $sqlnomesero);
$rownomesero = mysqli_fetch_row($resultnomesero);
$nocontestadomesero = $rownomesero[0];  
    
$totalenc = $nocontestadomesero + $rowcuenta['cuenta'];      

echo "<table width='90%' border='10' cellspacing=0 cellpadding=2 bordercolor='#000'>";	
echo "<tbody>";	
echo "
<tr>

<td width='65%' id='fuente' class='degradado2'>Vendedor</td>";
	
echo '<td width="25%" align="center" id="fuente2" class="degradado"><a href="generavendedor2.php?vendedor='.$row['mesero'].'&desde='.$desde1.'&hasta='.$hasta.'&sucursal='.$sucursal.'&identificador='.$identificador.'">'.$row['mesero'].'</a></td></tr>';	

//FILA 1	
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg1[0]."</td>";

if($row[1]>=9 and $variable==0){
	
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[1],0,4) . '</td></tr>';
}

else if(($row[1]>=8.5 and $row[1]<= 8.9999999) and $variable==0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[1],0,4) . '</td></tr>';
	}
	
	else if($row[1]<=8.4999999 and $variable==0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[1],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[1],0,4).$simbporc1.'</td></tr>';
			}	

 
//FILA 2 
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg2[0]."</td>";
 		
if($row[2]>=9 and $variable2==0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[2],0,4) . '</td></tr>';
}
else if(($row[2]>=8.5 and $row[2]<= 8.99999999) and $variable2==0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[2],0,4) . '</td></tr>';
	}
	else if($row[2]<=8.4999999999 and $variable2==0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[2],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[2],0,4).$simbporc2.'</td></tr>';
			}	

 
//FILA 3 
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg3[0]."</td>";
	
if($row[3]>=9 and $variable3==0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[3],0,4) . '</td></tr>';
}
else if(($row[3]>=8.5 and $row[3]<= 8.99999999) and $variable3==0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[3],0,4) . '</td></tr>';
	}
	else if($row[3]<=8.4999999 and $variable3==0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[3],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[3],0,4).$simbporc3.'</td></tr>';
			}	

//FILA 4 
if($total >= 4){
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg4[0]."</td>";
   			
if($row[4]>=9 and $variable4==0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[4],0,4) . '</td></tr>';
}
else if(($row[4]>=8.5 and $row[4]<= 8.999999999) and $variable4==0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[4],0,4) . '</td></tr>';
	}
	else if($row[4]<=8.4999999999 and $variable4==0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[4],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[4],0,4).$simbporc4.'</td></tr>';
			}	
}
	
//FILA 5 
if($total >= 5){	
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg5[0]."</td>";
	 	
if($row[5]>=9 and $variable5==0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[5],0,4) . '</td></tr>';
}
else if(($row[5]>=8.5 and $row[5]<= 8.99999999) and $variable5==0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[5],0,4) . '</td></tr>';
	}
	else if ($row[5]<=8.499999999 and $variable5==0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[5],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[5],0,4).$simbporc5.'</td></tr>';
			}	
}

//FILA 6 	
if($total >= 6){	
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg6[0]."</td>";
	 		
if($row[6]>=9 and $variable6 == 0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[6],0,4) . '</td></tr>';
}
else if(($row[6]>=8.5 and $row[6]<= 8.99999999) and $variable6 == 0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[6],0,4) . '</td></tr>';
	}
	else if($row[6]<=8.49999999 and $variable6 == 0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[6],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[6],0,4).$simbporc6.'</td></tr>';
			}
}		

//FILA 7 	
if($total >= 7){	
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg7[0]."</td>";
	   		
if($row[7]>=9 and $variable7 == 0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[7],0,4) . '</td></tr>';
}
else if(($row[7]>=8.5 and $row[7]<= 8.99999999) and $variable7 == 0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[7],0,4) . '</td></tr>';
	}
	else if($row[7] <= 8.499999999 and $variable7 == 0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[7],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[7],0,4).$simbporc7.'</td></tr>';
			}	
}	
 
//FILA 8 	
if($total >= 8){
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg8[0]."</td>";
   		
if($row[8]>=9 and $variable8 == 0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[8],0,4) . '</td></tr>';
}
else if(($row[8]>=8.5 and $row[8]<= 8.9999999) and $variable8 == 0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[8],0,4) . '</td></tr>';
	}
	else if($row[8]<=8.4999999 and $variable8 == 0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[8],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[8],0,4).$simbporc8.'</td></tr>';
			}			
}	
 
//FILA 9 	
if($total >= 9){
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg9[0]."</td>";
   	
if($row[9]>=9 and $variable9 == 0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[9],0,4) . '</td></tr>';
}
else if(($row[9]>=8.5 and $row[9]<= 8.9999999) and $variable9 == 0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[9],0,4) . '</td></tr>';
	}
	else if($row[9] <= 8.49999999 and $variable9 == 0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[9],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[9],0,4).$simbporc9.'</td></tr>';
			}			
}	
 
//FILA 10 	
if($total >= 10){
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg10[0]."</td>";
   	
if($row[10]>=9 and $variable10 == 0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[10],0,4) . '</td></tr>';
}
else if(($row[10]>=8.5 and $row[10]<= 8.99999999) and $variable10 == 0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[10],0,4) . '</td></tr>';
	}
	else if($row[10]<=8.4999999 and $variable10 == 0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[10],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[10],0,4).$simbporc10.'</td></tr>';
			}			
}
 
//FILA 11	
if($total >= 11){
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg11[0]."</td>";
    	
if($row[11]>=9 and $variable11 == 0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[11],0,4) . '</td></tr>';
}
else if(($row[11]>=8.5 and $row[11]<= 8.9999999) and $variable11 == 0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[11],0,4) . '</td></tr>';
	}
	else if($row[11] <= 8.4999999 and $variable11 == 0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[11],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[11],0,4).$simbporc11.'</td></tr>';
			}			
}	
  
//FILA 12 	
if($total >= 12){
echo "<tr><td id='fuente' class='degradado2'>".$rowpreg12[0]."</td>";
   
if($row[12]>=9 and $variable12 == 0){		
echo '<td align="center" id="fuente2" class="degradado">' . substr($row[12],0,4) . '</td></tr>';
}
else if(($row[12]>=8.5 and $row[12]<= 8.999) and $variable12 == 0){
	echo '<td align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row[12],0,4) . '</td></tr>';
	}
	else if($row[12] <= 8.49999999 and $variable12 == 0){
		echo '<td align="center" bgcolor="#FF0000" id="fuente2">' . substr($row[12],0,4) . '</td></tr>';
		}
		else{
			echo '<td align="center" id="fuente2" class="degradado">'.substr($row[12],0,4).$simbporc12.'</td></tr>';
			}			
}	


echo "
<tr><td id='fuente' class='degradado2'>Encuestas Totales</td>";
echo '<td align="center" id="fuente2" class="degradado">' . $totalenc . "</td></tr>";	

echo "<tr><td id='fuente' class='degradado2'>NO Contestadas</td>";
echo '<td align="center" id="fuente2" class="degradado">'.$nocontestadomesero.'</td></tr>';    
    
echo "<tr><td id='fuente' class='degradado2'>CALIFICACION</td>";

//FILA CALIFICACION FINAL
if($row[13]>=9){
echo '<td align="center" bgcolor="33CC00" id="fuente2">'.substr($row[13],0,4). "</td></tr>";
}
else if($row[13]>=8.5 and $row[13]<= 8.999){
echo '<td align="center" bgcolor="FFFF00" id="fuente2">'.substr($row[13],0,4). "</td></tr>";	
}
else{
	echo '<td align="center" bgcolor="FF0000" id="fuente2">'.substr($row[13],0,4). "</td></tr>";
	}
echo "</tbody>";    
echo "</table>";	
}


//--------------Termina tabla Empleados-----------------------------------------------

?>    
 
</div>
</div>
<br>

</body>
</html>
