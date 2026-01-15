<?php
require_once __DIR__ . '/../modelo/mMinijuego.php';
require_once __DIR__ . '/../fpdf/fpdf.php';

class CMinijuego
{
    private $modMinijuego;
    public $vista;
    public $objPdf;

    public function __construct()
    {
        $this->modMinijuego = new Minijuego();
        $this->objPdf =  new FPDF();
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

    public function generarPdf()
    {
        $juegos = $this->modMinijuego->listarMinijuegos();

        //Esto lo pongo para limpiar porque se me generan unas comillas dobles y no se donde 
        if (ob_get_length()) {
            ob_end_clean();
        }

        $this->objPdf->AddPage();

        // Título
        $this->objPdf->SetFont('Arial', 'B', 16);
        $this->objPdf->Cell(0, 10, 'Listado de Minijuegos', 0, 1, 'C');
        $this->objPdf->Ln(5);

        // Contenido
        $this->objPdf->SetFont('Arial', '', 12);

        foreach ($juegos as $juego) {
            $this->objPdf->Cell(0, 8, utf8_decode($juego['nombre']), 1, 1);
        }

        //Mostrar PDF en navegador
        $this->objPdf->Output('I', 'minijuegos.pdf');

    }
}
?>