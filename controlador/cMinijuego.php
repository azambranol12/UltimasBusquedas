<?php
require_once __DIR__ . '/../modelos/mMinijuego.php';

class CMinijuego
{
    private $modMinijuego;
    public $mensaje;
    public $consejosList;
    public $vista;

    public function __construct()
    {
        $this->consejoMod = new Minijuego();
        $this->vista = '';
        $this->mensaje = '';
    }

    public function listarMinijuego(){
        $this->modMinijuego->listarMinijuegos();
    }

    public function InsertMasivo()
    {
        $this->modMinijuego->insercionMasiva();
        $this->vista = '';
    }
}