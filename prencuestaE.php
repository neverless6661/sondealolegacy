<?php 
header('Content-type: image/jpeg');
require_once('Connections/conexion7.php');
if (!isset($_SESSION)) {
  session_start();
  isset($_SESSION['MM_Identi']);
  $identificador = $_SESSION['MM_Identi'];
}

$sucursal = $_GET['sucursal'];

$conexion = mysqli_connect($hostname,$username,$password,$database);

////--------PREGUNTA 1------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row1 = mysqli_fetch_array($result);

////--------PREGUNTA 2------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=2 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row2 = mysqli_fetch_array($result);

////--------PREGUNTA 3------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=3 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row3 = mysqli_fetch_array($result);

////--------PREGUNTA 4------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=4 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row4 = mysqli_fetch_array($result);

////--------PREGUNTA 5------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=5 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row5 = mysqli_fetch_array($result);

////--------PREGUNTA 6------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=6 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row6 = mysqli_fetch_array($result);

////--------PREGUNTA 7------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=7 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row7 = mysqli_fetch_array($result);

////--------PREGUNTA 8------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=8 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row8 = mysqli_fetch_array($result);

////--------PREGUNTA 9------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=9 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row9 = mysqli_fetch_array($result);

////--------PREGUNTA 10------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=10 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row10 = mysqli_fetch_array($result);

////--------PREGUNTA 11------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=11 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row11 = mysqli_fetch_array($result);

////--------PREGUNTA 12------------/////
$sql = "SELECT pregunta FROM cuestionario WHERE id=12 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$row12 = mysqli_fetch_array($result);

////--------CANTIDAD PREGUNTA------------/////
$sql = "SELECT valor FROM valores WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowpregunta = mysqli_fetch_array($result);

////--------BOTON NO CONTESTAR------------/////
$sql = "SELECT valor FROM valores WHERE id=2 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rownocontes = mysqli_fetch_array($result);

////--------ENVIAR CORREO------------/////
$sql = "SELECT valor FROM valores WHERE id=3 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowenvcorreo = mysqli_fetch_array($result);

////--------ENVIAR COMENTARIOS------------/////
$sql = "SELECT valor FROM valores WHERE id=4 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowenvcoment = mysqli_fetch_array($result);

///---------PREGUNTAS SI Y NO--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=1 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 2--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=2 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino2 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 3--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=3 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino3 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 4--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=4 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino4 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 5--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=5 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino5 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 6--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=6 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino6 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 7--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=7 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino7 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 8--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=8 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino8 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 9--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=9 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino9 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 10--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=10 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino10 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 11--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=11 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino11 = mysqli_fetch_row($result);

///---------PREGUNTAS SI Y NO 12--------------/////
$sql = "SELECT valor FROM cuestionario WHERE id=12 AND identificador='$identificador' AND sucursal='$sucursal'";
$result = mysqli_query($conexion, $sql);
$rowsino12 = mysqli_fetch_row($result);

//--------------ID DEL LOGO------------------------////
$sqllogo = "SELECT id FROM logoimagen WHERE identificador='$identificador' AND sucursal='$sucursal'";
$resultlogo = mysqli_query($conexion, $sqllogo);
$rowlogo = mysqli_fetch_row($resultlogo);
$idlogo = $rowlogo[0];


// Creamos la imagen a partir de un fichero existente 

define("WIDTH", 149);
define("HEIGHT", 59);

$selectOption = $_POST['preguntas'];
$im = imagecreatefromjpeg('./generaencuesta/plantilla.jpg');

if (file_exists('./logo/logo'.$idlogo.' .png')) {
	$logo = imagecreatefrompng('./logo/logo'.$idlogo.' .png'); 
}else
{
	$logo = imagecreatefrompng('./logo/logos.png'); 
}

$cara = imagecreatefromjpeg('./generaencuesta/caras.jpg');
$nocontes = imagecreatefrompng('./generaencuesta/noencuesta.png');
$envcorreo = imagecreatefrompng('./generaencuesta/correos.png');
$envcoment = imagecreatefrompng('./generaencuesta/coments.png');
$sino = imagecreatefrompng('./generaencuesta/sino.png');
$spinner = imagecreatefrompng('./generaencuesta/spinner.png');
$doble = imagecreatefrompng('./generaencuesta/txtopc1.png');
$solotexto = imagecreatefrompng('./generaencuesta/texto.png');
$fecha = imagecreatefrompng('./generaencuesta/fecha.png');
$cincoopciones = imagecreatefrompng('./generaencuesta/txt5opc.png');


$text1 = substr($row1[0],0,50);
$text1b = substr($row1[0],25,50); 
$text2 = substr($row2[0],0,50);
$text2b = substr($row2[0],25,50); 
$text3 = substr($row3[0],0,50);
$text3b = substr($row3[0],25,50); 
$text4 = substr($row4[0],0,50);
$text4b = substr($row4[0],25,50); 
$text5 = substr($row5[0],0,50);
$text5b = substr($row5[0],25,50); 
$text6 = substr($row6[0],0,50); 
$text6b = substr($row6[0],25,50);
$text7 = substr($row7[0],0,50);
$text7b = substr($row7[0],25,50); 
$text8 = substr($row8[0],0,50);
$text8b = substr($row8[0],25,50);
$text9 = substr($row9[0],0,50);
$text9b = substr($row9[0],25,50);
$text10 = substr($row10[0],0,50);
$text10b = substr($row10[0],25,50); 
$text11 = substr($row11[0],0,50);
$text11b = substr($row11[0],25,50);
$text12 = substr($row12[0],0,50);
$text12b = substr($row12[0],25,50);
$tamano_fuente = 18.00;
$angulo_fuente = 0.0;

$ubicacion_x = 30;
$ubicacion_y = 116.4;
$ubicacion_xb = 30;
$ubicacion_yb = 107;

$ubicacion_x2 = 30;
$ubicacion_y2 = 197.2;
$ubicacion_x2b = 30;
$ubicacion_y2b = 164.2;

$ubicacion_x3 = 30;
$ubicacion_y3 = 278;
$ubicacion_x3b = 30;
$ubicacion_y3b = 221;

$ubicacion_x4 = 30;
$ubicacion_y4 = 359.8;
$ubicacion_x4b = 30;
$ubicacion_y4b = 277.8;

$ubicacion_x5 = 30;
$ubicacion_y5 = 440.6;
$ubicacion_x5b = 30;
$ubicacion_y5b = 334.6;

$ubicacion_x6 = 30;
$ubicacion_y6 = 521.4;
$ubicacion_x6b = 30;
$ubicacion_y6b = 391.4;

$ubicacion_x7 = 30;
$ubicacion_y7 = 602.2;
$ubicacion_x7b = 30;
$ubicacion_y7b = 448.2;

$ubicacion_x8 = 30;
$ubicacion_y8 = 683;
$ubicacion_x8b = 30;
$ubicacion_y8b = 505;

$ubicacion_x9 = 30;
$ubicacion_y9 = 764.8;
$ubicacion_x9b = 30;
$ubicacion_y9b = 561.8;

$ubicacion_x10 = 30;
$ubicacion_y10 = 845.6;
$ubicacion_x10b = 30;
$ubicacion_y10b = 618.6;

$ubicacion_x11 = 30;
$ubicacion_y11 = 798.6;
$ubicacion_x11b = 30;
$ubicacion_y11b = 675.4;

$ubicacion_x12 = 30;
$ubicacion_y12 = 869.6;
$ubicacion_x12b = 30;
$ubicacion_y12b = 732.2;

$ubicacion_logo = 10;
$ubicacion_logo = 10;
//$archivo_fuente = './generaencuesta/calibri.ttf'; 
$archivo_fuente = './fuente/myriad-set-pro_text.ttf'; 
$color = imagecolorallocate ( $im,0,0,0);

$fondoAncho = imagesx($im); 
$fondoAlto = imagesy($im); 
$textoAncho = 500; 
$textoAlto = 500; 

$coment1 = "_________________________________.";
$ubicom1_x = 30;
$ubicom1_y = 151;
//$fuentenegrita = './generaencuesta/calibri.ttf'; 
$fuentenegrita = './fuente/myriad-set-pro_bold.ttf';
$tamano_fuente2 = 15.00;

$ubicom2_y = 233;

$ubicom3_y = 315;

$ubicom4_y = 397;

$ubicom5_y = 479;

$ubicom6_y = 561;

$ubicom7_y = 643;

$ubicom8_y = 725;

$ubicom9_y = 807;

$ubicom10_y = 889;

$ubicom11_y = 833;

$ubicom12_y = 904;

imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x,$ubicacion_y,$color,$archivo_fuente,$text1);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_xb,$ubicacion_yb,$color,$archivo_fuente,$text1b);


imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x2,$ubicacion_y2,$color,$archivo_fuente,$text2);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x2b,$ubicacion_y2b,$color,$archivo_fuente,$text2b);


imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x3,$ubicacion_y3,$color,$archivo_fuente,$text3);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x3b,$ubicacion_y3b,$color,$archivo_fuente,$text3b);

if($rowsino[0] == 1){
	imagecopy($im,$sino,30,131.8,0,0,500,37);
	}
	else if($rowsino[0] == 0){
		imagecopy($im,$cara,30,131.8,0,0,500,41);
		}
	else if($rowsino[0] == 3){
		imagecopy($im,$solotexto,30,131.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom1_y,$color,$fuentenegrita,$coment1);
		}	
	else if($rowsino[0] == 5){
		imagecopy($im,$spinner,30,131.8,0,0,800,41);
		}
	else if($rowsino[0] == 4){
	    imagecopy($im,$doble,30,131.8,0,0,555,42);
	}
    else if($rowsino[0] == 6){
        imagecopy($im,$fecha,30,131.8,0,0,160,41);
    }
    else if($rowsino[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 131.8, 0, 0, 550, 42);
    }
    
		
if($rowsino2[0] == 1){
	imagecopy($im,$sino,30,212.8,0,0,500,37);
	}
	else if($rowsino2[0] == 0){
		imagecopy($im,$cara,30,212.8,0,0,500,41);
		}
	else if($rowsino2[0] == 3){
		imagecopy($im,$solotexto,30,212.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom2_y,$color,$fuentenegrita,$coment1);
		}
	else if($rowsino2[0] == 5){
		imagecopy($im,$spinner,30,212.8,0,0,800,40);
		}
	else if($rowsino2[0] == 4){
	    imagecopy($im,$doble,30,212.8,0,0,555,42);
	}
    else if($rowsino2[0] == 6){
        imagecopy($im,$fecha,30,212.8,0,0,160,41);
    }
    else if($rowsino2[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 212.8, 0, 0, 550, 42);
    }
    
		
if($rowsino3[0] == 1){
	imagecopy($im,$sino,30,293.8,0,0,500,37);
	}
	else if($rowsino3[0] == 0){
		imagecopy($im,$cara,30,293.8,0,0,500,41);
		}	
	else if($rowsino3[0] == 3){
		imagecopy($im,$solotexto,30,293.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom3_y,$color,$fuentenegrita,$coment1);
		}
	else if($rowsino3[0] == 5){
		imagecopy($im,$spinner,30,293.8,0,0,800,40);
		}
	else if($rowsino3[0] == 4){
	    imagecopy($im,$doble,30,293.8,0,0,555,42);
	}
    else if($rowsino3[0] == 6){
        imagecopy($im,$fecha,30,293.8,0,0,160,41);
    }
    else if($rowsino3[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 293.8, 0, 0, 550, 42);
    }

if($rowpregunta[0] >= 4){
imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x4,$ubicacion_y4,$color,$archivo_fuente,$text4);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x4b,$ubicacion_y4b,$color,$archivo_fuente,$text4b);
if($rowsino4[0] == 1){
	imagecopy($im,$sino,30,374.8,0,0,500,37);
	}
	else if($rowsino4[0] == 0){
    imagecopy($im,$cara,30,374.8,0,0,500,41);
	}
	else if($rowsino4[0] == 3){
	imagecopy($im,$solotexto,30,455.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom4_y,$color,$fuentenegrita,$coment1);
	}
	else if($rowsino4[0] == 5){
		imagecopy($im,$spinner,30,374.8,0,0,800,40);
	}
	else if($rowsino4[0] == 4){
	imagecopy($im,$doble,30,374.8,0,0,555,42);
	}
    else if($rowsino4[0] == 6){
        imagecopy($im,$fecha,30,374.8,0,0,160,41);
    }
    else if($rowsino4[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 374.8, 0, 0, 550, 42);
    }
}

if($rowpregunta[0] >= 5){
imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x5,$ubicacion_y5,$color,$archivo_fuente,$text5);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x5b,$ubicacion_y5b,$color,$archivo_fuente,$text5b);
if($rowsino5[0] == 1){
		imagecopy($im,$sino,30,455.8,0,0,500,37);
	}
	else if($rowsino5[0] == 0){
    	imagecopy($im,$cara,30,455.8,0,0,500,41);
	}
	else if($rowsino5[0] == 3){
		imagecopy($im,$solotexto,30,455.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom5_y,$color,$fuentenegrita,$coment1);
	}
	else if($rowsino5[0] == 5){
		imagecopy($im,$spinner,30,455.8,0,0,800,40);	
	}
	else if($rowsino5[0] == 4){
		imagecopy($im,$doble,30,455.8,0,0,555,42);
	}
    else if($rowsino5[0] == 6){
        imagecopy($im,$fecha,30,455.8,0,0,160,41);
    }
    else if($rowsino5[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 455.8, 0, 0, 550, 42);
    }
}

if($rowpregunta[0] >= 6){
imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x6,$ubicacion_y6,$color,$archivo_fuente,$text6);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x6b,$ubicacion_y6b,$color,$archivo_fuente,$text6b);
if($rowsino6[0] == 1){
	imagecopy($im,$sino,30,536.8,0,0,500,37);
	}
	else if($rowsino6[0] == 0){
    imagecopy($im,$cara,30,536.8,0,0,500,41);
	}
	else if($rowsino6[0] == 3){
	imagecopy($im,$solotexto,30,536.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom6_y,$color,$fuentenegrita,$coment1);
	}
	else if($rowsino6[0] == 5){
	imagecopy($im,$spinner,30,536.8,0,0,800,40);	
	}
	else if($rowsino6[0] == 4){
	imagecopy($im,$doble,30,536.8,0,0,555,42);
	}
    else if($rowsino6[0] == 6){
    imagecopy($im,$fecha,30,536.8,0,0,160,41);
    }
    else if($rowsino6[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 536.8, 0, 0, 550, 42);
    }
}

if($rowpregunta[0] >= 7){
imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x7,$ubicacion_y7,$color,$archivo_fuente,$text7);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x7b,$ubicacion_y7b,$color,$archivo_fuente,$text7b);
if($rowsino7[0] == 1){
	imagecopy($im,$sino,30,617.8,0,0,500,37);
	}
	else if($rowsino7[0] == 0){
    imagecopy($im,$cara,30,617.8,0,0,500,41);
	}
	else if($rowsino7[0] == 3){
	imagecopy($im,$solotexto,30,617.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom7_y,$color,$fuentenegrita,$coment1);
	}
	else if($rowsino7[0] == 5){
	imagecopy($im,$spinner,30,617.8,0,0,800,40);
	}
	else if($rowsino7[0] == 4){
	imagecopy($im,$doble,30,617.8,0,0,555,42);
	}
    else if($rowsino7[0] == 6){
    imagecopy($im,$fecha,30,617.8,0,0,160,41);    
    }
    else if($rowsino7[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 617.8, 0, 0, 550, 42);
    }
}

if($rowpregunta[0] >= 8){
imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x8,$ubicacion_y8,$color,$archivo_fuente,$text8);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x8b,$ubicacion_y8b,$color,$archivo_fuente,$text8b);
if($rowsino8[0] == 1){
	imagecopy($im,$sino,30,698.8,0,0,500,37);
	}
	else if($rowsino8[0] == 0){
    imagecopy($im,$cara,30,698.8,0,0,500,41);
	}
	else if($rowsino8[0] == 3){
	imagecopy($im,$solotexto,30,698.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom8_y,$color,$fuentenegrita,$coment1);
	}
	else if($rowsino8[0] == 5){
	imagecopy($im,$spinner,30,698.8,0,0,800,40);
	}
	else if($rowsino8[0] == 4){
	imagecopy($im,$doble,30,698.8,0,0,555,42);
	}
    else if($rowsino8[0] == 6){
    imagecopy($im,$fecha,30,698.8,0,0,160,41);    
    }
    else if($rowsino8[0] == 7){
    	imagecopy($im , $cincoopciones, 30, 698.8, 0, 0, 550, 42);
    }
}

if($rowpregunta[0] >= 9){
imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x9,$ubicacion_y9,$color,$archivo_fuente,$text9);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x9b,$ubicacion_y9b,$color,$archivo_fuente,$text9b);
if($rowsino9[0] == 1){
	imagecopy($im,$sino,30,779.8,0,0,500,37);
	}
	else if($rowsino9[0] == 0){
    imagecopy($im,$cara,30,779.8,0,0,500,41);
	}
	else if($rowsino9[0] == 3){
	imagecopy($im,$solotexto,30,779.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom9_y,$color,$fuentenegrita,$coment1);
	}
	else if($rowsino9[0] == 5){
	imagecopy($im,$spinner,30,779.8,0,0,800,41);
	}
	else if($rowsino9[0] == 4){
	imagecopy($im,$doble,30,779.8,0,0,555,42);
	}
    else if($rowsino9[0] == 6){
    imagecopy($im,$fecha,30,779.8,0,0,160,41);    
    }
    else if($rowsino9[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 779.8, 0, 0, 550, 42);
    }
}
	
if($rowpregunta[0] >= 10){
imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x10,$ubicacion_y10,$color,$archivo_fuente,$text10);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x10b,$ubicacion_y10b,$color,$archivo_fuente,$text10b);
if($rowsino10[0] == 1){
	imagecopy($im,$sino,30,860.8,0,0,500,37);
	}
	else if($rowsino10[0] == 0){
    imagecopy($im,$cara,30,860.8,0,0,500,41);
	}
	else if($rowsino10[0] == 3){
	imagecopy($im,$solotexto,30,860.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom10_y,$color,$fuentenegrita,$coment1);
	}
	else if($rowsino10[0] == 5){
	imagecopy($im,$spinner,30,860.8,0,0,800,41);	
	}
	else if($rowsino10[0] == 4){
	imagecopy($im,$doble,30,860.8,0,0,555,42);
	}
    else if($rowsino10[0] == 6){
    imagecopy($im,$fecha,30,860.8,0,0,160,41);    
    }
    else if($rowsino10[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 860.8, 0, 0, 550, 42);
    }
}	
	
if($rowpregunta[0] >= 11){
imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x11,$ubicacion_y11,$color,$archivo_fuente,$text11);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x11b,$ubicacion_y11b,$color,$archivo_fuente,$text11b);
if($rowsino11[0] == 1){
	imagecopy($im,$sino,30,805.8,0,0,500,37);
	}
	else if($rowsino11[0] == 0){
    imagecopy($im,$cara,30,800.8,0,0,500,41);
	}
	else if($rowsino11[0] == 3){
	imagecopy($im,$solotexto,30,870.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom11_y,$color,$fuentenegrita,$coment1);
	}
	else if($rowsino11[0] == 5){
	imagecopy($im,$spinner,30,802.8,0,0,800,41);
	}
	else if($rowsino11[0] == 4){
	imagecopy($im,$doble,30,805.8,0,0,555,42);
	}
    else if($rowsino11[0] == 6){
    imagecopy($im,$fecha,30,805.8,0,0,160,41);    
    }
    else if($rowsino11[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 805.8, 0, 0, 550, 42);
    }
}

if($rowpregunta[0] >= 12){
imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x12,$ubicacion_y12,$color,$archivo_fuente,$text12);
//imagettftext ($im,$tamano_fuente,$angulo_fuente,$ubicacion_x12b,$ubicacion_y12b,$color,$archivo_fuente,$text12b);
if($rowsino12[0] == 1){
	imagecopy($im,$sino,30,876.8,0,0,500,37);
	}
	else if($rowsino12[0] == 0){
    imagecopy($im,$cara,30,870.8,0,0,500,41);
	}
	else if($rowsino12[0] == 3){
	imagecopy($im,$solotexto,30,870.8,0,0,500,41);
		//imagettftext ($im,$tamano_fuente2,$angulo_fuente,$ubicom1_x,$ubicom12_y,$color,$fuentenegrita,$coment1);	
	}
	else if($rowsino12[0] == 5){
	imagecopy($im,$spinner,30,873.8,0,0,800,45);
	}
	else if($rowsino12[0] == 4){
	imagecopy($im,$doble,30,876.8,0,0,555,42);
	}
    else if($rowsino12[0] == 6){
    imagecopy($im,$fecha,30,876.8,0,0,160,41);    
    }
    else if($rowsino12[0] == 7){
    	imagecopy($im, $cincoopciones, 30, 876.8, 0, 0, 550, 42);
    }
}	


if($rownocontes[0] == 1){
imagecopy($im,$nocontes,0,940,0,0,700,88);
	}
	
if($rowenvcorreo[0] == 1){
imagecopy($im,$envcorreo,1,810,0,0,700,74);
	}


	
if($rowenvcoment[0] == 1 and $rowpregunta[0] <= 10){
imagecopy($im,$envcoment,1,872,0,0,700,74);
	}		


/*imagecopy($im,$logo,450,120,0,0,WIDTH, HEIGHT); */
imagecopy($im,$logo,450,120,0,0,90, 90);  

imagepng($im); 
imagedestroy($im);
imagedestroy($logo); 
imagedestroy($cara);
imagedestroy($nocontes);
imagedestroy($envcorreo);
imagedestroy($envcoment);
imagedestroy($sino);
imagedestroy($doble);
imagedestroy($cincoopciones);

?>
