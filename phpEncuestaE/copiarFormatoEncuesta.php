<?php
if(isset($_POST['identificador']) &&
   isset($_POST['sucursalCopiar'])&&
   isset($_POST['sucursalActual']))
{
    $identificador      = $_POST['identificador'];
    $sucursal_a_copiar  = $_POST['sucursalCopiar'];
    $sucursal_actual    = $_POST['sucursalActual'];
}
else
{
    exit('<strong>Forbidden</strong>');
}

/*incluimos la conexion*/
require 'conexion.php';
$conexionObj = new conexion();

/*obtenemos las preguntas a copiar*/
$sqlSelectPreguntas ="SELECT id, pregunta, valor, valor2, textos FROM cuestionario WHERE identificador = $identificador AND sucursal ='$sucursal_a_copiar' ORDER BY id ASC";

$selectPreguntas = mysqli_query($conexionObj->getConexion(), $sqlSelectPreguntas);

/*obtenemos los valores a copiar*/
$sqlSelectValores = "SELECT  id, valor FROM valores WHERE identificador=$identificador AND sucursal='$sucursal_a_copiar' ORDER BY id ASC";

$selectValores = mysqli_query($conexionObj->getConexion(), $sqlSelectValores);

$conteoUpdPreg = 0;

/*actualizamos las preguntas de la encuesta actual con los valores de la encuesta a copiar */
while($data = mysqli_fetch_object($selectPreguntas))
{
    $id       = $data->id;
    $pregunta = $data->pregunta;
    $valor    = $data->valor;
    $valor2   = $data->valor2;
    $textos   = $data->textos;
    
    if($valor == 2)
    {
      $pregunta = 'Pregunta '.$id;
      $valor2   = 0;
      $textos   = null;
    }


    $sqlUpdatePregunta = "";

    $sqlUpdatePregunta = "UPDATE cuestionario SET pregunta ='$pregunta', valor=$valor, valor2=$valor2, textos='$textos' WHERE identificador = $identificador AND sucursal = '$sucursal_actual' AND id=$id";

    try
    {
        mysqli_query($conexionObj->getConexion(), $sqlUpdatePregunta);
        $conteoUpdPreg++;
    }
    catch(Exception $e){
        echo $e->getMessage();        
    }
}

$conteoValores=0;
/*actualizamos los valores*/
while($dataV = mysqli_fetch_object($selectValores))
{
    $idV    = $dataV->id;
    $valorV = $dataV->valor;

    $sqlUpdateValores ="";
    
    $sqlUpdateValores = "UPDATE valores SET valor=$valorV WHERE identificador=$identificador AND sucursal='$sucursal_actual' AND id=$idV";

    try
    {
        mysqli_query($conexionObj->getConexion(), $sqlUpdateValores);
        $conteoValores++;
    }
    catch(Exception $e){
        echo $e->getMessage();        
    }
}

$response = 0;
($conteoUpdPreg == 12 && $conteoValores == 6)? $response = 1 : $response = 0;

echo $response;

mysqli_free_result($selectPreguntas);
mysqli_free_result($selectValores);
$conexionObj->closeConexion();
