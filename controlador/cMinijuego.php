<?php
require_once __DIR__ . '/../modelo/mMinijuego.php';

class CMinijuego
{
    private $modMinijuego; 
    public $vista;

    public function __construct()
    {
        $this->modMinijuego = new Minijuego();//Declaramos la vista que luego le pasaremos al index  y el objeto del modelo
        $this->vista = '';
    }

    public function acceso(){
        $this->vista = 'Acceder'; //Con esto cargariamos la vista vAcceder.php
    }

    public function listarMinijuego(){
        $resultado = $this->modMinijuego->listarMinijuegos(); //Listamos los juegos que hay

        $this->datos['juegos'] = $resultado; //Lo añadimos al array que luego lo recogera en $datos de todos los juegos

        return $this->datos;
    }

    public function InsertMasivo()
    {
        $this->modMinijuego->insercionMasiva(); //Insertamos masivamente todos los juegos una vez vayamos a jugar
        return $this->acceder();
    }

    public function acceder() {

        if (!isset($_COOKIE['historial'])) { //Si la cookie no esta creada se crea
            setcookie('historial', '', time() + (3600 * 24), "/");
        }

        $this->vista = 'Minijuego';

        return $this->listarMinijuego();
    }

    public function juego() {

        $nombre = $_POST['nombreJuego']; //De la vista del juego recogemos el nombre del juego

        $cookieActual = $_COOKIE['historial']; //Cargamos la cookie generada en accede
        $historialViejo = ($cookieActual !== '') ? explode('|', $cookieActual) : []; // Si la cookie tiene juegos, se pasa a una lista; si no, creo la lista vacía.


        $nuevoHistorial = [$nombre]; // Le cargamos el nombre que hemos recogido

        foreach ($historialViejo as $juegoViejo) { //Aqui leemos el historial que habia vemos que el nuevo juego no sea igual que al de ahora si nolo es entra y se guarda el ultimo y solo los ultimos 5
            if ($juegoViejo !== $nombre && count($nuevoHistorial) < 5) {
                $nuevoHistorial[] = $juegoViejo;
            }
        }

        setcookie('historial', implode('|', $nuevoHistorial), time() + (3600 * 24), "/");
        $_COOKIE['historial'] = implode('|', $nuevoHistorial); //Añadimos a la cookie el nuevo juego y los separamos con la barra

        $this->datos['nombre_juego'] = $nombre;
        $this->vista = 'Juego'; 
        return $this->datos;
    }
}