<?php
if(isset($_POST['_arrToReorder_']))
{
    $arrToReorder = $_POST['_arrToReorder_'];
    $arrSize      = count($arrToReorder);

    require 'conexion.php';
    $conexion = new conexion();

    $response = 0;

    try
    {
        for($i=0;$i<$arrSize;$i++)
        {
            $id            ='';
            $redaccion     ='';
            $tipo          ='';
            $textos        ='';
            $identificador ='';
            $sucursal      ='';
            $sql           ='';
            $upd           = 0;

            $id            = $arrToReorder[$i]['_id_'];
            $redaccion     = $arrToReorder[$i]['_pregunta_'];
            $tipo          = $arrToReorder[$i]['_tipo_'];
            $textos        = $arrToReorder[$i]['_textos_'];
            $identificador = $arrToReorder[$i]['_identificador_'];
            $sucursal      = $arrToReorder[$i]['_sucursal_'];

            $sql = "UPDATE cuestionario SET pregunta='$redaccion', valor=$tipo, textos='$textos' WHERE id=$id AND identificador=$identificador AND sucursal='$sucursal'";

            $upd = mysqli_query($conexion->getConexion(),$sql);

            ($upd == 1 or $upd == -1) ? $response++ : '' ;
        }

        if($response == $arrSize)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

    }
    catch(Exception $e)
    {
        echo $e->getMessage();        
    }

    $conexion->closeConexion();
}