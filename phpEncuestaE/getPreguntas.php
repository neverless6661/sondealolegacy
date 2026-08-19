<?php
if(isset($_POST['sucursal'])  &&
   isset($_POST['identificador']))
{
    $identificador = $_POST['identificador'];
    $sucursal      = $_POST['sucursal'];
    
    require 'conexion.php';
    $conexion = new conexion();

    $sql = "SELECT id, pregunta, valor, textos FROM cuestionario WHERE valor != 2 AND identificador =$identificador AND sucursal='$sucursal' ORDER BY id ASC";

    $arrPreguntas = array();

    $selectPreguntas = mysqli_query($conexion->getConexion(), $sql);
    $html = "";

    while($row = mysqli_fetch_array($selectPreguntas))
    {
        $id       = $row['id'];
        $pregunta = $row['pregunta'];
        $tipo     = $row['valor'];
        $textos   = $row['textos'];

        $html .= "<div class=\"pregunta\">"
            ." <p>$pregunta</p>"
            ."<button onclick=\"editarPreg($id, '$pregunta', $tipo, '$textos', '$identificador', '$sucursal');\">Editar</button>"
            ."<input type=\"hidden\" id=\"values_$id\" data-index=\"$id\" data-pregunta=\"$pregunta\" data-tipo=\"$tipo\" data-textos=\"$textos\" class=\"___pregunta___\" data-identificador=\"$identificador\" data-sucursal=\"$sucursal\" />"
            ."</div>";

    }
    mysqli_free_result($selectPreguntas);
    $conexion->closeConexion();

    echo json_encode(array('html'=>$html));
}