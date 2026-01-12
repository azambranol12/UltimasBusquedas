<?php
require_once 'config/config.php';

if (!isset($_GET['c']))
    $_GET['c'] = ControladorDefecto; // Controlador por defecto

if (!isset($_GET['m']))
    $_GET['m'] = MetodoDefecto; // Método por defecto

$rutaControlador = Ruta_Controladores . $_GET['c'] . '.php';
require_once $rutaControlador;

$controlador = 'C' . $_GET['c'];
$objControlador = new $controlador();

$datos = []; // Guardar los datos que se obtienen del método

if (method_exists($objControlador, $_GET['m'])) {
    $datos = $objControlador->{$_GET['m']}();
}

if ($objControlador->vista != '') {
    if (is_array($datos))
        extract($datos);
    require_once RutaVistas . $objControlador->vista . '.php';
}

?>