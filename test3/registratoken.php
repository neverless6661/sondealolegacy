<?php 
require_once('Connections/conexion7.php'); 
$identificador = $_GET['identificador'];
$token = $_GET['token'];
$usuario = $_GET['usuario'];
//$sucursal = $_GET['sucursal'];

$conexion = mysqli_connect($hostname,$username,$password,$database);
//$sqlusr = "SELECT * FROM notificaciones WHERE token='$token'";
//$resultusr = mysql_query($sqlusr);
//$rowusr = mysql_fetch_row($resultusr);
// Realiza la validación
$error_message = "";
//echo mysql_num_rows($resultusr);
/*
if(mysql_num_rows($resultusr) != 0){
	$error_message = "El token ya existe";
	echo $error_message;
}
else{ */

mysqli_query($conexion, "UPDATE notificaciones SET enviar=0 WHERE token='$token'");

$sqlpoder = "SELECT poder FROM registros WHERE usuario='$usuario'";
$respoder = mysqli_query($conexion, $sqlpoder);
$rowpoder = mysqli_fetch_row($respoder);
$poder = $rowpoder[0];

$sqlsucus = "SELECT sucs FROM registros WHERE usuario='$usuario'";
echo 'Query sucs: '.$sqlsucus.'<br>';
$resultsucus = mysqli_query($conexion, $sqlsucus);
$rowsucus = mysqli_fetch_row($resultsucus);
$sucus = $rowsucus[0];
echo 'imprimiendo sucs: '.$sucus.'<br>';
$arrsucs = explode(',',$sucus);
echo 'imprimiendo array sucs: ';
//print_r $arrsucs;
echo '<br>';

$sql = "SELECT sucursal FROM sucursales WHERE identificador='$identificador'";
$result = mysqli_query($conexion, $sql);

while($row = mysqli_fetch_array($result)){
    $sucursal = $row['sucursal'];
    echo 'Sucursal: '.$sucursal.'<br>';
    
    $sqlcomp = "SELECT sucursal FROM notificaciones WHERE sucursal='$sucursal' AND identificador='$identificador' AND token = '$token'";
    $resultcomp = mysqli_query($conexion, $sqlcomp);
    
   // echo 'Imprimiendo QUERY: '.$sqlcomp.'<br>';
    
    if(mysqli_num_rows($resultcomp) == 0){
        
    mysqli_query ($conexion, "INSERT INTO notificaciones(token,identificador,sucursal,enviar,badge,usuario) VALUES('$token',$identificador,'$sucursal',1,0,'$usuario')");
   // echo 'Insercion: '.$sqlsuc.'<br>';
        echo 'Se insertó: '.$sucursal.'<br>';
        }
    
    $envia = 0;
    echo 'Envia inicializado para '.$sucursal.': '.$envia.'<br>';
    
    if($poder == 1){
        $envia = 1;
        echo 'Envia si es user titular: '.$envia.'<br>';
    }
    else{
        foreach($arrsucs as $newsucs){
            echo 'comparacion sucursal array: '.$newsucs.' - sucursal actual: '.$sucursal;
            if(trim($newsucs) == trim($sucursal)){
                $envia = 1;
                echo 'si entro al if';
                echo 'Envia despues de comparacion: '.$envia.'<br>';
            }
        } 
    }
    
    
    
    mysqli_query($conexion, "UPDATE notificaciones SET enviar = '$envia' WHERE identificador='$identificador' AND sucursal='$sucursal'");
    echo 'no se insertó: '.$sucursal.'<br>';
}   
//}
//mysql_query ("INSERT INTO notificaciones (token,identificador,sucursal) VALUES('$usuario','$contrasena','$nombre','$correo',$identi,'$telefono',$activado,$plantipo,'$empresa')");
?>