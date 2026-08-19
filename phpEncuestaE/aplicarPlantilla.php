<?php
if(isset($_POST['plantilla']) &&
   isset($_POST['sucursal'])  &&
   isset($_POST['identificador']))
{
    $plantilla      = $_POST['plantilla'];
    $sucursal       = $_POST['sucursal'];
    $identificador  = $_POST['identificador'];
}
else
{
    exit('<strong>Forbidden</strong>');
}

$preguntasPlantillas = array(
    'restaurant-1' => array(         
        array('pregunta' => "Es la primera vez que nos visitas",'tipo' => 1, 'textos' => ''),                             
        array('pregunta' => "Trato del mesero",                 'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Ambiente del lugar",               'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Calidad de los alimentos",         'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Relación calidad-precio",          'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Te ofrecieron alguna promoción",   'tipo' => 1, 'textos' => ''), 
        array('pregunta' => "Lo visitó el gerente",             'tipo' => 1, 'textos' => ''), 
        array('pregunta' => "Cómo te enteraste de nosotros",    'tipo' => 4, 'textos' => 'Facebook,instagram,Espectacular,Ubicación'),
        array('pregunta' => "Que tanto nos recomendarías, siendo el 10 lo más alto", 'tipo' => 5, 'textos' => ''),     
    ),
    'gimnasio-1' => array(         
        array('pregunta' => "Atención en recepción",                           'tipo' => 0, 'textos' => ''),                             
        array('pregunta' => "Limpieza del lugar",                              'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Profesionalismo del personal",                    'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Disponibilidad de aparatos y clases",             'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Calidad del equipo de gimnasio e instalaciones",  'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "¿Nombre del instructor que te asesora?",          'tipo' => 9, 'textos' => 'instructor 1,instructor 2,instructor 3'), 
        array('pregunta' => "Servicio del instructor",                         'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "¿Qué nos recomendarías para mejorar?",            'tipo' => 3, 'textos' => ''),
        array('pregunta' => "¿Qué probable es que nos recomiendes? ",          'tipo' => 5, 'textos' => ''),     
    ),
    'centro-medico-1' => array(         
        array('pregunta' => "Atención en recepción",                           'tipo' => 0, 'textos' => ''),                             
        array('pregunta' => "Limpieza del lugar",                              'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Profesionalismo del personal",                    'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Calidad de los aparatos médicos",                 'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Disponibilidad de los aparatos médicos",          'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "¿Nombre del médico que te asesora? ",             'tipo' => 9, 'textos' => 'médico 1,médico 2,médico 3'), 
        array('pregunta' => "Servicio del doctor o doctora",                         'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "¿Qué nos recomendarías para mejorar?",            'tipo' => 3, 'textos' => ''),
        array('pregunta' => "¿Qué probable es que nos recomiendes? ",          'tipo' => 5, 'textos' => ''),     
    ),
    'hotel-1' => array(         
        array('pregunta' => "¿Es la primera vez que te hospedas?",             'tipo' => 1, 'textos' => ''),                          
        array('pregunta' => "Atención en recepción",                           'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Servicio a la habitación",                        'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Limpieza de las instalaciones",                   'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Calidad de las instalaciones",                    'tipo' => 0, 'textos' => ''), 
        array('pregunta' => "Disponibilidad de habitaciones",                  'tipo' => 0, 'textos' => 'médico 1,médico 2,médico 3'), 
        array('pregunta' => "¿Cómo te enteraste de nosotros?",                 'tipo' => 9, 'textos' => 'Google,Booking,Trivago,TripAdvisor,Facebook,Instagram,Ubicación,Recomendación'), 
        array('pregunta' => "¿Qué nos recomendarías para mejorar?",            'tipo' => 3, 'textos' => ''),
        array('pregunta' => "¿Qué probable es que nos recomiendes? ",          'tipo' => 5, 'textos' => ''),     
    ), 

);

if(!key_exists($plantilla, $preguntasPlantillas)){
    echo -1;
    die;
}

$plantillaAplicar = $preguntasPlantillas[$plantilla];
$sizePlantilla = count($plantillaAplicar);

require 'conexion.php';
$conexionObj = new conexion();

$index     = 1;
$sumador   = 0;

for($i=0;$i<$sizePlantilla;$i++)
{
    $pregunta = $plantillaAplicar[$i]['pregunta'];
    $tipo     = $plantillaAplicar[$i]['tipo'];
    $textos   = $plantillaAplicar[$i]['textos'];

    $sql = "";
    $sql = "UPDATE cuestionario SET pregunta = '$pregunta', valor=$tipo, textos='$textos' WHERE sucursal='$sucursal' AND identificador =$identificador AND id= $index -- ";
    $respuesta = mysqli_query($conexionObj->getConexion(),$sql);
    ($respuesta == 1 || $respuesta == -1) ? $sumador++: '';

    $index++;
}

$sqlValores = "UPDATE valores SET valor=$sizePlantilla WHERE sucursal ='$sucursal' AND identificador =$identificador AND id = 1";
mysqli_query($conexionObj->getConexion(), $sqlValores);

$conexionObj->closeConexion();
$respuesta = 0;
($sumador == 9) ? $respuesta = 1: '';
echo $respuesta;
