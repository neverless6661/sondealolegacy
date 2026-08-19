<?php

if(isset($_POST['_cantPreg_'])      &&
   isset($_POST['_boolCorreo_'])    &&
   isset($_POST['_boolComent_'])    &&
   isset($_POST['_boolNoContest_']) &&
   isset($_POST['_identificador_']) &&
   isset($_POST['_sucursal_']))
{
    $cantPreg      = $_POST['_cantPreg_'];
    $boolCorreo    = $_POST['_boolCorreo_'];
    $boolComent    = $_POST['_boolComent_'];
    $boolNoContest = $_POST['_boolNoContest_'];

    $identificador = $_POST['_identificador_'];
    $sucursal      = $_POST['_sucursal_'];


    ($boolCorreo    == 'true') ? $boolCorreo    = 1: $boolCorreo    = 0;
    ($boolComent    == 'true') ? $boolComent    = 1: $boolComent    = 0;
    ($boolNoContest == 'true') ? $boolNoContest = 1: $boolNoContest = 0;

    require 'conexion.php';
    $conexion = new conexion();

    try
    {
        $sqlHabilitarPreg = "UPDATE cuestionario SET valor=0 WHERE identificador=$identificador AND sucursal ='$sucursal' AND valor = 2 AND id <= $cantPreg";

        mysqli_query($conexion->getConexion(), $sqlHabilitarPreg);

        /*---------------------------------------------- */

        $sqlDeshabilitarPreg = "UPDATE cuestionario SET valor=2 WHERE identificador=$identificador AND sucursal ='$sucursal' AND id > $cantPreg";

        mysqli_query($conexion->getConexion(), $sqlDeshabilitarPreg);    

        /*---------------------------------------------- */

        $sqlUpdateCantPreg =  "UPDATE valores SET valor = $cantPreg WHERE id = 1 AND identificador =$identificador AND sucursal = '$sucursal'";

        mysqli_query($conexion->getConexion(), $sqlUpdateCantPreg);

        /*---------------------------------------------- */

        $sqlBotonNoContest = "UPDATE valores SET valor=$boolNoContest WHERE id = 2 AND identificador=$identificador AND sucursal = '$sucursal'";

        mysqli_query($conexion->getConexion(), $sqlBotonNoContest);

        /*---------------------------------------------- */

        $sqlComentario = "UPDATE valores SET valor =$boolComent WHERE id = 4 AND identificador =$identificador AND sucursal = '$sucursal'";

        mysqli_query($conexion->getConexion(), $sqlComentario);

        /*---------------------------------------------- */

        $sqlEnviarCorreo = "UPDATE valores SET valor = $boolCorreo WHERE id = 3 AND identificador =$identificador AND sucursal = '$sucursal'";

        mysqli_query($conexion->getConexion(), $sqlEnviarCorreo);
        
        echo 1;
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }

    $conexion->closeConexion();
}