<?php require_once('Connections/conexion7.php'); 

$sucursal = $_GET['sucursal'];
$identificador = $_GET['identificador'];
$id = $_GET['id'];

session_start();
//header("location:graficalificaciongenerada.php");
//return;
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
    font-family: 'vanilla_extractregular';
	background-color: #FFFFFF;
	height: 100%;
	margin-left: 0px;
	margin-right: 0px;
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

#pie1 {background-color:#000}
#pie2 {background-color:#000}
#finalpie {
	alignment-adjust:central;
	background-color:#518ceb;
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
        
#dere{
/*	float:right; */
    font-family: 'vanilla_extractregular';
    color: white;
	font-size:10px;
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
	#enviar{
        font-family: 'vanilla_extractregular';
		font-size:10px;
    }
    .fuente{
        font-family: 'vanilla_extractregular';
        color: white;
		font-size:10px;
    }
    
    .fuente2{
        font-family: 'vanilla_extractregular';
		font-size:10px;
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

<?php  
session_start();    
isset($_SESSION['MM_Identi']);
//$identificador = $_SESSION['MM_Identi'];
	
$conexion = mysqli_connect($hostname,$username,$password,$database);

//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];

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

//Evaluacion servicios
$sqleval = "SELECT (AVG(eval))*".$multip1.",(AVG(eval2))*".$multip2.",(AVG(eval3))*".$multip3.",(AVG(eval4))*".$multip4.",(AVG(eval5))*".$multip5.",(AVG(eval6))*".$multip6.",(AVG(eval7))*".$multip7.",(AVG(eval8))*".$multip8.",(AVG(eval9))*".$multip9.",(AVG(eval10))*".$multip10.",(AVG(eval11))*".$multip11.",(AVG(eval12))*".$multip12." FROM calificaciones WHERE identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resulteval = mysqli_query($conexion, $sqleval);
$roweval = mysqli_fetch_array($resulteval);

if($variable != 0){
	$roweval[0] = 0;
	}
if($variable2 != 0){
	$roweval[1] = 0;
	}
if($variable3 != 0){
	$roweval[2] = 0;
	}
if($variable4 != 0){
	$roweval[3] = 0;
	}
if($variable5 != 0){
	$roweval[4] = 0;
	}
if($variable6 != 0){
	$roweval[5] = 0;
	}
if($variable7 != 0){
	$roweval[6] = 0;
	}	
if($variable8 != 0){
	$roweval[7] = 0;
	}		
if($variable9 != 0){
	$roweval[8] = 0;
	}
if($variable10 != 0){
	$roweval[9] = 0;
	}
if($variable11 != 0){
	$roweval[10] = 0;
	}
if($variable12 != 0){
	$roweval[11] = 0;
	}

$evalfinal = ($roweval[0]+$roweval[1]+$roweval[2]+$roweval[3]+$roweval[4]+$roweval[5]+$roweval[6]+$roweval[7]+$roweval[8]+$roweval[9]+$roweval[10]+$roweval[11])/$total;

//Calificacion total grafica
//Total Promedio
$sqltot = "SELECT COUNT(valor) FROM cuestionario WHERE valor=0 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];

$sqltot = "SELECT COUNT(p2) FROM calificaciones WHERE identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$totalprom = $rowtot[0]*$total;

//Excelente
$totalexcel = 0;
for($i=1;$i<=11;$i++){
$sqlexcel = "SELECT COUNT(*) FROM calificaciones WHERE p".$i."='Excelente' AND identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resultexcel = mysqli_query($conexion, $sqlexcel);
$rowexcel = mysqli_fetch_row($resultexcel);
$totalexcel = $totalexcel+$rowexcel[0];
}

//Excelente recomendacion
$sqlexcelrec = "SELECT COUNT(*) FROM calificaciones WHERE recomen='Excelente' AND identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resultexcelrec = mysqli_query($conexion, $sqlexcelrec);
$rowexcelrec = mysqli_fetch_row($resultexcelrec);
$totalexcel1 = $totalexcel+$rowexcelrec[0];

//Bueno
$totalbuenos = 0;
for($i=1;$i<=11;$i++){
$sqlbueno = "SELECT COUNT(*) FROM calificaciones WHERE  p".$i."='Bueno' AND identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resultbueno = mysqli_query($conexion, $sqlbueno);
$rowbueno = mysqli_fetch_row($resultbueno);
$totalbuenos = $totalbuenos+$rowbueno[0];
}

//Bueno recomendacion
$sqlbuenorec = "SELECT COUNT(*) FROM calificaciones WHERE recomen='Bueno' AND identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resultbuenorec = mysqli_query($conexion, $sqlbuenorec);
$rowbuenorec = mysqli_fetch_row($resultbuenorec);
$totalbuenos1 = $totalbuenos+$rowbuenorec[0];

//Regular
$totalregular = 0;
for($i=1;$i<=11;$i++){
$sqlregular = "SELECT COUNT(*) FROM calificaciones WHERE  p".$i."='Regular' AND identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resultregular = mysqli_query($conexion, $sqlregular);
$rowregular = mysqli_fetch_row($resultregular);
$totalregular = $totalregular+$rowregular[0];
}

//Regular recomendacion
$sqlregularrec = "SELECT COUNT(*) FROM calificaciones WHERE recomen='Regular' AND identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resultregularrec = mysqli_query($conexion, $sqlregularrec);
$rowregularrec = mysqli_fetch_row($resultregularrec);
$totalregular1 = $totalregular+$rowregularrec[0];

//Malo
$totalmalo = 0;
for($i=1;$i<=11;$i++){
$sqlmalo = "SELECT COUNT(*) FROM calificaciones WHERE  p".$i."='Malo' AND identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resultmalo = mysqli_query($conexion, $sqlmalo);
$rowmalo = mysqli_fetch_row($resultmalo);
$totalmalo = $totalmalo+$rowmalo[0];
}

//Malo recomendacion
$sqlmalorec = "SELECT COUNT(*) FROM calificaciones WHERE recomen='Malo' AND identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resultmalorec = mysqli_query($conexion, $sqlmalorec);
$rowmalorec = mysqli_fetch_row($resultmalorec);
$totalmalo1 = $totalmalo+$rowmalorec[0];

if($totalprom <= 0){
	echo '<font color="red">NO HAY DATOS PARA GENERAR ESTADISTICAS </font>';
}

else{	
$valorex = ($totalexcel1/$totalprom)*100;
$valor1 = ($totalbuenos1/$totalprom)*100;
$valor2 = ($totalregular1/$totalprom)*100;
$valor3 = ($totalmalo1/$totalprom)*100;
}

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge','corechart']});
      google.charts.setOnLoadCallback(drawChart);
	  google.charts.setOnLoadCallback(drawChart2);

      function drawChart() {


        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Evaluación', <?php echo substr($evalfinal,0,3); ?> ]
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 0, redTo: 8.49999,
          yellowFrom:8.5, yellowTo: 8.99999,
		  greenFrom: 9, greenTo: 10,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
	  
	  function drawChart2() {
   // Define the chart to be drawn.
   var data = google.visualization.arrayToDataTable([
      ['Porcentaje', 'Malo <?php echo substr($valor3,0,3)."%" ?>','Regular <?php echo substr($valor2,0,4)."%" ?>','Bueno <?php echo substr($valor1,0,4)."%" ?>', 'Excelente <?php echo substr($valorex,0,4)."%" ?>'],

      ['',  <?php echo substr($valor3,0,3); ?>,  <?php echo substr($valor2,0,4); ?>,  <?php echo substr($valor1,0,3); ?>,  <?php echo substr($valorex,0,3); ?>]
      ]);

   var options = {
      title: 'Evaluacion',
	  legend: { position: 'bottom', maxLines: 1 },
      isStacked:true,
	  colors: ['#FF0000','#FF9900','#FFFF00' ,'#33CC00'],
	  backgroundColor:'transparent'	  
   };  

   // Instantiate and draw the chart.
   var chart = new google.visualization.BarChart(document.getElementById('container'));
   chart.draw(data, options);
}
	  
</script>


</head>

<body>

<header>
		
	</header>

<div align='center' id="contenedor">
<div align='center' id='col_cen'>
    
<img src="logo/sondealogo.png" width="350px" height="140px" />
    
    
<?php
//$desde = $_POST['desde'];
//$hasta = $_POST['hasta'];
$conexion = mysqli_connect($hostname,$username,$password,$database);
$sql = "SELECT * FROM calificaciones WHERE identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$result = mysqli_query($conexion, $sql);

//RUTA LOGO
$sqlruta = "SELECT ruta FROM logoimagen WHERE identificador='$identificador' AND sucursal='$sucursal'";
$resulruta = mysqli_query($conexion, $sqlruta);
$rowruta = mysqli_fetch_row($resulruta);
$rutalogo = $rowruta[0];

//Evaluacion servicios
$sqleval = "SELECT (AVG(eval))*".$multip1.",(AVG(eval2))*".$multip2.",(AVG(eval3))*".$multip3.",(AVG(eval4))*".$multip4.",(AVG(eval5))*".$multip5.",(AVG(eval6))*".$multip6.",(AVG(eval7))*".$multip7.",(AVG(eval8))*".$multip8.",(AVG(eval9))*".$multip9.",(AVG(eval10))*".$multip10.",(AVG(eval11))*".$multip11.",(AVG(eval12))*".$multip12." FROM calificaciones WHERE identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resulteval = mysqli_query($conexion, $sqleval);
$roweval = mysqli_fetch_array($resulteval);

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

//Total de ecnuestas
$sqlencuestas = "SELECT COUNT(*) FROM calificaciones WHERE identificador='$identificador' AND sucursal='$sucursal' AND id='$id'";
$resultencuestas = mysqli_query($conexion, $sqlencuestas);
$rowencuestas = mysqli_fetch_array($resultencuestas);

//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];

//Encuestas NO contestadas
$sqlcantno = "SELECT COUNT(cantidad) FROM nocontestadas  WHERE identificador='$identificador' AND sucursal='$sucursal'";
$resultcantno = mysqli_query($conexion, $sqlcantno);
$rowcantno = mysqli_fetch_array($resultcantno);
$totaldencuesta = $rowencuestas[0]+$rowcantno[0];

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
$rowvar = mysql_fetch_row($resultvar);
$variable12 = $rowvar[0];

//$sqltot = "SELECT valor FROM valores WHERE id=1";
$sqltot2 = "SELECT COUNT(valor) FROM cuestionario WHERE valor=0 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot2 = mysqli_query($conexion, $sqltot2);
$rowtot2 = mysqli_fetch_row($resulttot2);
$total2 = $rowtot2[0];

$porcnocont = ($rowcantno[0]/$totaldencuesta)*100;


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

//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];

//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];

//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];

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

//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];
	
////////*****************EMPIEZA TABLA DE ESTADISTICAS***************************///////
    
  

while($row = mysqli_fetch_array($result))
{
  
echo '<table width="90%" border="10" cellspacing=0 cellpadding=2 bordercolor="#357ae8">';	
echo '<tbody>';
    
echo '<tr><td width="55%" align="center" bordercolor="#bac6e0" class="degradado2" id="fuente">Fecha</td>';
echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">'. $row['fecha'] . '</td></tr>';

echo '<tr><td width="55%" align="center" bordercolor="#bac6e0" class="degradado2" id="fuente">Ticket</td>';
echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['folio'] . '</td></tr>';	


echo '<tr><td width="55%" align="center" bordercolor="#bac6e0" class="degradado2" id="fuente">Mesa</td>';
echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['mesa'] . '</td></tr>';	


echo '<tr><td width="55%" align="center" bordercolor="#bac6e0" class="degradado2" id="fuente">Mesero</td>';
echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['mesero'] . '</td></tr>';	
	
//Total
$sqltot = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$resulttot = mysqli_query($conexion, $sqltot);
$rowtot = mysqli_fetch_row($resulttot);
$total = $rowtot[0];

//Pregunta 1	
echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg1[0].'</td>';

if(substr($row['p1'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['p1'],0,1) . '</td></tr>';
	}
else if(substr($row['p1'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['p1'],0,1) . '</td></tr>';
	}	
else if(substr($row['p1'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p1'],0,1) . '</td></tr>';
	}
else if(substr($row['p1'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p1'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['p1'] . '</td></tr>';
		}
	
	
//Pregunta 2	
echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg2[0].'</td>';
if(substr($row['p2'],0,1)=='R'){
	echo '<td width="55%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['p2'],0,1) . '</td></tr>';
	}
else if(substr($row['p2'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['p2'],0,1) . '</td></tr>';
	}	
else if(substr($row['p2'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p2'],0,1) . '</td></tr>';
	}
else if(substr($row['p2'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p2'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['p2'] . '</td></tr>';
		}	
	
//Pregunta 3	
echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg3[0].'</td>';

if(substr($row['p3'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['p3'],0,1) . '</td></tr>';
	}
else if(substr($row['p3'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['p3'],0,1) . '</td></tr>';
	}	
else if(substr($row['p3'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p3'],0,1) . '</td></tr>';
	}
else if(substr($row['p3'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p3'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['p3'] . '</td></tr>';
		}
	
//Pregunta 4	
if($total >= 4){
echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg4[0].'</td>';
	
if(substr($row['p4'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['p4'],0,1) . '</td></tr>';
	}
else if(substr($row['p4'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['p4'],0,1) . '</td></tr>';
	}	
else if(substr($row['p4'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p4'],0,1) . '</td></tr>';
	}
else if(substr($row['p4'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p4'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['p4'] . '</td><tr>';
		}					
}
	
//Pregunta 5	
if($total >= 5){
echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg5[0].'</td>';
if(substr($row['p5'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['p5'],0,1) . '</td></tr>';
	}
else if(substr($row['p5'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['p5'],0,1) . '</td></tr>';
	}	
else if(substr($row['p5'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p5'],0,1) . '</td></tr>';
	}
else if(substr($row['p5'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p5'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['p5'] . '</td></tr>';
		}		
}
	
//Pregunta 6	
if($total >= 6){
echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg6[0].'</td>';

if(substr($row['p6'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['p6'],0,1) . '</td></tr>';
	}
else if(substr($row['p6'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['p6'],0,1) . '</td></tr>';
	}	
else if(substr($row['p6'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p6'],0,1) . '</td></tr>';
	}
else if(substr($row['p6'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p6'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['p6'] . '</td></tr>';
		}	
}

//Pregunta 7	
if($total >= 7){
echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg7[0].'</td>';
if(substr($row['p7'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['p7'],0,1) . '</td></tr>';
	}
else if(substr($row['p7'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['p7'],0,1) . '</td></tr>';
	}	
else if(substr($row['p7'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p7'],0,1) . '</td></tr>';
	}
else if(substr($row['p7'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p7'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['p7'] . '</td></tr>';
		}					
}
	
//Pregunta Recomend		
if($total >= 8){
echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg8[0].'</td>';
	
if(substr($row['recomen'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['recomen'],0,1) . '</td></tr>';
	}
else if(substr($row['recomen'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['recomen'],0,1) . '</td></tr>';
	}	
else if(substr($row['recomen'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['recomen'],0,1) . '</td></tr>';
	}
else if(substr($row['recomen'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['recomen'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['recomen'] . '</td></tr>';
		}	
}

//Pregunta 9	
if($total >= 9){
	echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg9[0].'</td>';
	
if(substr($row['p8'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['p8'],0,1) . '</td></tr>';
	}
else if(substr($row['p8'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['p8'],0,1) . '</td></tr>';
	}	
else if(substr($row['p8'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p8'],0,1) . '</td></tr>';
	}
else if(substr($row['p8'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p8'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['p8'] . '</td></tr>';
		}			
}
	
//Pregunta 10	
if($total >= 10){
	echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg10[0].'</th>';	
if(substr($row['p9'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" bordercolor="#bac6e0" id="fuente2">' . substr($row['p9'],0,1) . '</td></tr>';
	}
else if(substr($row['p9'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . substr($row['p9'],0,1) . '</td></tr>';
	}	
else if(substr($row['p9'],0,1)=='E'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p9'],0,1) . '</td></tr>';
	}
else if(substr($row['p9'],0,1)=='B'){
	echo '<td width="35%" align="center" bordercolor="#bac6e0" class="degradado" id="fuente2">' . substr($row['p9'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['p9'] . '</td></tr>';
		}		
}

//Pregunta 11	
if($total >= 11){
	echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg11[0].'</td>';	
if(substr($row['p10'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row['p10'],0,1) . '</td></tr>';
	}
else if(substr($row['p10'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" id="fuente2">' . substr($row['p10'],0,1) . '</td></tr>';
	}	
else if(substr($row['p10'],0,1)=='E'){
	echo '<td width="35%" align="center" id="fuente2">' . substr($row['p10'],0,1) . '</td></tr>';
	}
else if(substr($row['p10'],0,1)=='B'){
	echo '<td width="35%" align="center" id="fuente2">' . substr($row['p10'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" id="fuente2">' . $row['p10'] . '</td></tr>';
		}		
}
	
//Pregunta 12	
if($total >= 12){
	echo '<tr><td width="55%" bordercolor="#bac6e0" class="degradado2" id="fuente">'.$rowpreg12[0].'</td>';
		
if(substr($row['p11'],0,1)=='R'){
	echo '<td width="35%" align="center" bgcolor="#FFFF00" id="fuente2">' . substr($row['p11'],0,1) . '</td></tr>';
	}
else if(substr($row['p11'],0,1)=='M'){
	echo '<td width="35%" align="center" bgcolor="#FF0000" id="fuente2">' . substr($row['p11'],0,1) . '</td></tr>';
	}	
else if(substr($row['p11'],0,1)=='E'){
	echo '<td width="35%" align="center" id="fuente2">' . substr($row['p11'],0,1) . '</td></tr>';
	}
else if(substr($row['p11'],0,1)=='B'){
	echo '<td width="35%" align="center" id="fuente2">' . substr($row['p11'],0,1) . '</td></tr>';
	}	
	else{
		echo '<td width="35%" align="center" id="fuente2">' . $row['p11'] . '</td></tr>';
		}			
}			
	
echo '<tr><td width="55%" align="center" bordercolor="#bac6e0" class="degradado2" id="fuente">Correo</td>';
echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['correo'] . '</td></tr>';	
	
echo '<tr><td width="55%" align="center" bordercolor="#bac6e0" class="degradado2" id="fuente">Comentarios</td>';
    
if(strpos(strtolower($row['comentarios']),'pesimo')!== false or 
strpos(strtolower($row['comentarios']),'pésimo')!== false or 
strpos(strtolower($row['comentarios']),'malo')!== false or 
strpos(strtolower($row['comentarios']),'mal')!== false or 
strpos(strtolower($row['comentarios']),'lento')!== false or 
strpos(strtolower($row['comentarios']),'fatal')!== false or 
strpos(strtolower($row['comentarios']),'feo')!== false or 
strpos(strtolower($row['comentarios']),'falla')!== false or 
strpos(strtolower($row['comentarios']),'fallando')!== false or 
strpos(strtolower($row['comentarios']),'fallar')!== false or 
strpos(strtolower($row['comentarios']),'fallo')!== false or 
strpos(strtolower($row['comentarios']),'falló')!== false or 
strpos(strtolower($row['comentarios']),'mala')!== false or 
strpos(strtolower($row['comentarios']),'malos')!== false or 
strpos(strtolower($row['comentarios']),'malas')!== false or 
strpos(strtolower($row['comentarios']),'pesima')!== false or 
strpos(strtolower($row['comentarios']),'pesimas')!== false or 
strpos(strtolower($row['comentarios']),'pésimas')!== false or 
strpos(strtolower($row['comentarios']),'pesimos')!== false or 
strpos(strtolower($row['comentarios']),'pésimos')!== false or 
strpos(strtolower($row['comentarios']),'lentos')!== false or 
strpos(strtolower($row['comentarios']),'lenta')!== false or 
strpos(strtolower($row['comentarios']),'lentas')!== false or 
strpos(strtolower($row['comentarios']),'tarda')!== false or 
strpos(strtolower($row['comentarios']),'tardan')!== false or 
strpos(strtolower($row['comentarios']),'tardaron')!== false or 
strpos(strtolower($row['comentarios']),'tardaban')!== false or 
strpos(strtolower($row['comentarios']),'pelo')!== false or 
strpos(strtolower($row['comentarios']),'pelos')!== false or 
strpos(strtolower($row['comentarios']),'cabello')!== false or 
strpos(strtolower($row['comentarios']),'cabellos')!== false or 
strpos(strtolower($row['comentarios']),'falta')!== false or 
strpos(strtolower($row['comentarios']),'faltan')!== false or 
strpos(strtolower($row['comentarios']),'falto')!== false or 
strpos(strtolower($row['comentarios']),'faltó')!== false or 
strpos(strtolower($row['comentarios']),'faltaba')!== false or 
strpos(strtolower($row['comentarios']),'faltaron')!== false or
strpos(strtolower($row['comentarios']),'seco')!== false or
strpos(strtolower($row['comentarios']),'reseco')!== false or
strpos(strtolower($row['comentarios']),'congelado')!== false or
strpos(strtolower($row['comentarios']),'congelada')!== false or
strpos(strtolower($row['comentarios']),'frio')!== false or
strpos(strtolower($row['comentarios']),'asco')!== false or
strpos(strtolower($row['comentarios']),'tardada')!== false or
strpos(strtolower($row['comentarios']),'tardado')!== false or
strpos(strtolower($row['comentarios']),'sucio')!== false or
strpos(strtolower($row['comentarios']),'sucios')!== false or
strpos(strtolower($row['comentarios']),'sucia')!== false or
strpos(strtolower($row['comentarios']),'sucias')!== false or
strpos(strtolower($row['comentarios']),'mosca')!== false or
strpos(strtolower($row['comentarios']),'moscas')!== false or
strpos(strtolower($row['comentarios']),'mosquito')!== false or
strpos(strtolower($row['comentarios']),'mosquitos')!== false or
strpos(strtolower($row['comentarios']),'mosco')!== false or
strpos(strtolower($row['comentarios']),'moscos')!== false or
strpos(strtolower($row['comentarios']),'cucaracha')!== false or
strpos(strtolower($row['comentarios']),'cucarachas')!== false or
strpos(strtolower($row['comentarios']),'desabrida')!== false or
strpos(strtolower($row['comentarios']),'desabridas')!== false or
strpos(strtolower($row['comentarios']),'desabrido')!== false or
strpos(strtolower($row['comentarios']),'desabridos')!== false or
strpos(strtolower($row['comentarios']),'duro')!== false or
strpos(strtolower($row['comentarios']),'duros')!== false or
strpos(strtolower($row['comentarios']),'dura')!== false or
strpos(strtolower($row['comentarios']),'duras')!== false or
strpos(strtolower($row['comentarios']),'quemado')!== false or
strpos(strtolower($row['comentarios']),'quemados')!== false or
strpos(strtolower($row['comentarios']),'quemada')!== false or
strpos(strtolower($row['comentarios']),'quemadas')!== false or
strpos(strtolower($row['comentarios']),'kemado')!== false or
strpos(strtolower($row['comentarios']),'kemados')!== false or
strpos(strtolower($row['comentarios']),'kemada')!== false or
strpos(strtolower($row['comentarios']),'kemadas')!== false or
strpos(strtolower($row['comentarios']),'volumen')!== false or
strpos(strtolower($row['comentarios']),'porcion')!== false or
strpos(strtolower($row['comentarios']),'porciones')!== false or
strpos(strtolower($row['comentarios']),'tardados')!== false or
strpos(strtolower($row['comentarios']),'tardadas')!== false or
strpos(strtolower($row['comentarios']),'incomodo')!== false or
strpos(strtolower($row['comentarios']),'incómodo')!== false or
strpos(strtolower($row['comentarios']),'incomodos')!== false or
strpos(strtolower($row['comentarios']),'incómodos')!== false or
strpos(strtolower($row['comentarios']),'incomoda')!== false or
strpos(strtolower($row['comentarios']),'incómoda')!== false or
strpos(strtolower($row['comentarios']),'incomodas')!== false or
strpos(strtolower($row['comentarios']),'incómodas')!== false or
strpos(strtolower($row['comentarios']),'peor')!== false or
strpos(strtolower($row['comentarios']),'peores')!== false or 
strpos(strtolower($row['comentarios']),'nunca')!== false or
strpos(strtolower($row['comentarios']),'salado')!== false or
strpos(strtolower($row['comentarios']),' salada ')!== false or
strpos(strtolower($row['comentarios']),'sal ')!== false or
strpos(strtolower($row['comentarios']),'crudo')!== false or
strpos(strtolower($row['comentarios']),'crudos')!== false or
strpos(strtolower($row['comentarios']),'cruda')!== false or
strpos(strtolower($row['comentarios']),'crudas')!== false or
strpos(strtolower($row['comentarios']),'menos')!== false or
strpos(strtolower($row['comentarios']),'excepto')!== false or
strpos(strtolower($row['comentarios']),'exepto')!== false or
strpos(strtolower($row['comentarios']),'excepcion')!== false or
strpos(strtolower($row['comentarios']),'excepción')!== false or
strpos(strtolower($row['comentarios']),'exepcion')!== false or
strpos(strtolower($row['comentarios']),'exepción')!== false or
strpos(strtolower($row['comentarios']),'pero')!== false or
strpos(strtolower($row['comentarios']),'embargo')!== false or
strpos(strtolower($row['comentarios']),'mejorar')!== false or
strpos(strtolower($row['comentarios']),'mejoraran')!== false or
strpos(strtolower($row['comentarios']),'faltaban')!== false or
strpos(strtolower($row['comentarios']),'poco')!== false or
strpos(strtolower($row['comentarios']),'poca')!== false or

strpos(strtolower($row['comentarios']),'ofrecer')!== false or
strpos(strtolower($row['comentarios']),' no ')!== false or
strpos(strtolower($row['comentarios']),'viejo')!== false or
strpos(strtolower($row['comentarios']),'vieja')!== false or
strpos(strtolower($row['comentarios']),'presion')!== false or
strpos(strtolower($row['comentarios']),'incluir')!== false or
strpos(strtolower($row['comentarios']),'habia')!== false or
strpos(strtolower($row['comentarios']),'insecto')!== false or
strpos(strtolower($row['comentarios']),'salio')!== false or
strpos(strtolower($row['comentarios']),'diferente')!== false or
strpos(strtolower($row['comentarios']),'deberia')!== false or
strpos(strtolower($row['comentarios']),'debería')!== false or

strpos(strtolower($row['comentarios']),'pero')!== false 

){    
echo '<td width="35%" align="center" bgcolor="#FF0000" bordercolor="#bac6e0" id="fuente2">' . $row['comentarios'] . '</td></tr>';
}
    
else{
echo '<td width="35%" align="center" class="degradado" bordercolor="#bac6e0" id="fuente2">' . $row['comentarios'] . '</td></tr>';    
}    

echo '</tbody>';    
echo '</table>';
	
}

///////////****************TERMINA TABLA DE ESTADÍSTICAS**************//////////////////	


?>       
 
</div>
</div>
<br><br>

</body>
</html>
