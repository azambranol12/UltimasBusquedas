<?php

require_once __DIR__ . '/mConexion.php';

class Minijuego extends Conexion{

        public function insercionMasiva() {
            
            $sql = "SELECT COUNT(*) FROM minijuegos";
            $resultado = $this->conexion->query($sql);
            
            if ($resultado->fetchColumn() == 0) { //Contamos la cantidad de filas si no hay filas se hace el insert masivo si no salta el if y continua
                $nombres = ['Pacman', 'Tetris', 'Snake', 'Flappy Bird', 'Pong'];
                $stmt = $this->conexion->prepare("INSERT INTO minijuegos (nombre) VALUES (?)");

                foreach ($nombres as $nombre) {
                    $stmt->execute([$nombre]); //Ejecutamos la conulta y añadismos nombres
                }
            }
        }

    public function listarMinijuegos() {
        $query = $this->conexion->query("SELECT * FROM minijuegos");
        return $query->fetchAll(PDO::FETCH_ASSOC); //Selecionamos todas las filas de minijuegos
    }
}
?>