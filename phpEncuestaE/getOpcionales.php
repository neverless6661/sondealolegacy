<?php
if(isset($_POST['sucursal'])  &&
   isset($_POST['identificador']))
{
    $identificador = $_POST['identificador'];
    $sucursal      = $_POST['sucursal'];

    require 'conexion.php';    
    $conexion = new conexion();
    
    $sql = "SELECT id, valor FROM valores WHERE identificador=$identificador AND sucursal='$sucursal' ORDER BY id ASC";

    $arrValores = array();

    $selectValores = mysqli_query($conexion->getConexion(), $sql);
  
    while($data    = mysqli_fetch_array($selectValores))
    {
        $arrValores[] = $data;
    }    
    mysqli_free_result($selectValores);
    $conexion->closeConexion();
    
    echo json_encode($arrValores);  
}