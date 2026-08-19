<?php
if(isset($_POST['identificador']) &&
   isset($_POST['sucursal']))
{
    $identificador = $_POST['identificador'];
    $sucursal      = $_POST['sucursal'];

    $rutaUp = $_FILES['imagen']['tmp_name'];

    require 'conexion.php';
    $conexion = new conexion();

    $sqlSelectImgLogo = "SELECT id, ruta FROM logoimagen WHERE identificador =$identificador AND sucursal='$sucursal'";
    $selectImgLogo = mysqli_query($conexion->getConexion(),$sqlSelectImgLogo);
    $rowSelectImgLogo = mysqli_fetch_object($selectImgLogo);

    $idImg  = $rowSelectImgLogo->id;
    $rutaBD = $rowSelectImgLogo->ruta;

    $destino = '../logo/logo'.$idImg.'.png';

    try
    {    
	if(file_exists('../'.$rutaBD))
	{
	     unlink('../'.$rutaBD);
	}
        unlink('../'.$rutaBD); 
        copy($rutaUp,$destino);

        $sqlUpdateLogo = "UPDATE logoimagen SET ruta = 'logo/logo$idImg.png' WHERE id =$idImg";
        echo mysqli_query($conexion->getConexion(),$sqlUpdateLogo);

    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    mysqli_free_result($selectImgLogo);
    $conexion->closeConexion();
}
