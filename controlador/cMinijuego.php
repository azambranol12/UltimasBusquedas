<?php
require_once __DIR__ . '/../modelo/mMinijuego.php';

class CMinijuego
{
    private $modMinijuego;
    public $vista;

    public function __construct()
    {
        $this->modMinijuego = new Minijuego();
        $this->vista = '';
    }

    public function acceso(){
        $this->vista = 'Acceder';
    }

    public function listarMinijuego(){
        $resultado = $this->modMinijuego->listarMinijuegos();

        $this->datos['juegos'] = $resultado;

        return $this->datos;
    }

    public function InsertMasivo()
    {
        $this->modMinijuego->insercionMasiva();
        return $this->acceder();
    }

    public function acceder() {

        //Creamos la cookie
        setcookie('historial', '', time() + 3600, "/");

        // Cargamos la vista
        $this->vista = 'Minijuego';

        // Llamamos a la función que acabamos de arreglar y DEVOLVEMOS su resultado
        return $this->listarMinijuego();
    }
}