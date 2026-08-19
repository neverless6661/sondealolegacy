<?php require_once('Connections/conexion7.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

//$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        
<link rel="shortcut icon" href="logo.ico" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sondealo</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

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
	background-color: #0457a4;
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
   height: 250px;
   background: #518ceb;
   border: 1px solid #518ceb;
   max-height: 250px;
    transition: max-height 0.15s ease-out;
    overflow: hidden;
}
   .prueba1:hover{
      width: 250px;
      max-height: 250px;
    transition: max-height 0.25s ease-in;

    }   
    
    #dere{
	float:right;
    font-family: 'vanilla_extractregular';
    color: white;
	font-size:10px;
	}
	
	.dere{
	float:right;
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
 
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="lc_switch.js" type="text/javascript"></script>
<link rel="stylesheet" href="lc_switch.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


<script type="text/javascript">
<!--
function cambiaTexto(c,o){
	c.options[c.selectedIndex].text = o.value
	o.style.display = 'none'
	c.style.display = 'inline'
}
function cambiaCampo(c,o,v){
	if(o.selectedIndex>0){
		o.style.display = 'none'
		c.style.display = 'inline'
		c.value = v
		c.focus()
	}
}
//-->
</script>

</head>

<body>

<header>
		
	</header>

<div align='center' id="contenedor">
<div align='center' id='col_cen'>

<?php
$conexion = mysqli_connect($hostname,$username,$password,$database);
    
//Identificador
$sqlidenti = "SELECT identificador FROM sucursales WHERE sucursal='$sucursal'";
$resultidenti = mysqli_query($conexion, $sqlidenti);
$rowidenti = mysqli_fetch_array($resultidenti);
$identificador = $rowidenti[0];    

//PREGUNTA 1
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row1 = mysqli_fetch_array($result);

//PREGUNTA 2
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=2 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row2 = mysqli_fetch_array($result);

//PREGUNTA 3
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=3 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row3 = mysqli_fetch_array($result);

//PREGUNTA 4
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=4 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row4 = mysqli_fetch_array($result);

//PREGUNTA 5
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=5 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row5 = mysqli_fetch_array($result);

//PREGUNTA 6
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=6 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row6 = mysqli_fetch_array($result);

//PREGUNTA 7
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=7 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row7 = mysqli_fetch_array($result);

//PREGUNTA 8
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=8 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row8 = mysqli_fetch_array($result);

//PREGUNTA 9
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=9 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row9 = mysqli_fetch_array($result);

//PREGUNTA 10
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=10 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row10 = mysqli_fetch_array($result);

//PREGUNTA 11
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=11 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row11 = mysqli_fetch_array($result);

//PREGUNTA 12
$sql = "SELECT id,pregunta FROM cuestionario WHERE id=12 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row12 = mysqli_fetch_array($result);

//IMAGEN LOGO
$sql = "SELECT id,nombre,ruta FROM logoimagen WHERE identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowlogo = mysqli_fetch_array($result);

//CANTIDAD PREGUNTAS
$sql = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowpreguntas = mysqli_fetch_array($result);

////--------BOTON NO CONTESTAR------------/////
$sql = "SELECT valor FROM valores WHERE id=2 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rownocontes = mysqli_fetch_array($result);

////--------ENVIAR CORREO------------/////
$sql = "SELECT valor FROM valores WHERE id=3 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowenvcorreo = mysqli_fetch_array($result);

////--------COMENTARIOS------------/////
$sql = "SELECT valor FROM valores WHERE id=4 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowenvcoment = mysqli_fetch_array($result);

//--------VARIABLE SI-NO----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 2----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=2 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable2 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 3----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=3 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable3 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 4----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=4 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable4 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 5----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=5 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable5 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 6----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=6 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable6 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 7----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=7 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable7 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 8----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=8 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable8 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 9----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=9 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable9 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 10----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=10 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable10 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 11----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=11 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable11 = mysqli_fetch_array($result);

//--------VARIABLE SI-NO 12----------/////
$sql = "SELECT valor FROM cuestionario WHERE id=12 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvariable12 = mysqli_fetch_array($result);

//--------VARIABLE COMENTARIOS----------/////
$sql = "SELECT valor2 FROM cuestionario WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowvarcom = mysqli_fetch_array($result);

//-----------FORMATOS GUARDADOS----------/////
$sqlformat = "SELECT id,fecha FROM formatos WHERE identificador='$identificador' AND sucursal='$sucursal'";
$resultformat = mysqli_query($conexion, $sqlformat);
//$rowformato = mysql_fetch_array($result);




?>


<table>
<tr>
<td align="center">


    <a href="prencuestaE.php">
<!--<img src="prencuesta.php" width="320" height="480"> -->
		<?php
		echo '<img src="prencuesta2.php?sucursal='.$sucursal.'&identificador='.$identificador.'" width="320" height="480">'
		?>
        </a>   
    
<!--<a href="whatsapp://send?text= http://www.sondealo.com/encuestashare.php?sucursal=<?php // echo $sucursal ?>&identificador=<?php // echo $identificador; ?>" data-action="share/whatsapp/share"><img border="0" src="iconos/whatsappicono.png" width="20%"></a> -->


</td>
</tr>
</table>



<div id="fuente">    


<script type="text/javascript">
$(document).ready(function(e) {
	$('input').lc_switch();

	// triggered each time a field changes status
	$('body').delegate('.lcs_check', 'lcs-statuschange', function() {
		var status = ($(this).is(':checked')) ? 'checked' : 'unchecked';
		console.log('field changed status: '+ status );
	});
	
	
	// triggered each time a field is checked
	$('body').delegate('.lcs_check', 'lcs-on', function() {
		console.log('field is checked');
	});
	
	
	// triggered each time a is unchecked
	$('body').delegate('.lcs_check', 'lcs-off', function() {
		console.log('field is unchecked');
	});
});
</script>
     
</div>
</div>


</body>
</html>
