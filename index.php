<?php
require_once 'config/config.php'; //Llama a las rutas del config para concatenar y dirigir las rutas

if (!isset($_GET['c'])){
    $_GET['c'] = ControladorDefecto; //Comprueba que a la llamada al index la c que es el controlador no venga vacio en ese caso se manda a la rutta por defecto
}

if (!isset($_GET['m'])){
    $_GET['m'] = MetodoDefecto; //Es lo mismo que el controlador pero cojn el modelo
}

$rutaControlador = Ruta_Controladores . $_GET['c'] . '.php'; /*En esta variable concatenamos la ruta de los controladores que es controlador/c mas el controlador que le mandemos 
Minijuegos por ejemplo y le añadimos .php. Quedaria: controlador/cMinijuego.php*/
require_once $rutaControlador; //La requerimos y declaramos su clase

$controlador = 'C' . $_GET['c'];
$objControlador = new $controlador();

$datos = []; //Si queremos mostrar datos o usamos este array que se rellenara desde los controladores 

if (method_exists($objControlador, $_GET['m'])) {
    $datos = $objControlador->{$_GET['m']}(); //Controlaremos que exista este metodo y como hemos retornado los datos lo igualamos $datos = $objControlador
}

if ($objControlador->vista != '') {
    if (is_array($datos))
        extract($datos); //Para ver los datos del array en la vista debemos extraer
    require_once RutaVistas . $objControlador->vista . '.php';
}

?>