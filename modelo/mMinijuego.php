<?php

// Si están en la misma carpeta, solo necesitas esto:
require_once __DIR__ . '/mConexion.php';

class Minijuego extends Conexion{

        public function insercionMasiva() {
            
            $sql = "SELECT COUNT(*) FROM minijuegos";
            $resultado = $this->conexion->query($sql);
            
            // 2. Solo si el resultado es 0, hacemos el insert
            if ($resultado->fetchColumn() == 0) {
                $nombres = ['Pacman', 'Tetris', 'Snake', 'Flappy Bird', 'Pong'];
                $stmt = $this->conexion->prepare("INSERT INTO minijuegos (nombre) VALUES (?)");

                foreach ($nombres as $nombre) {
                    $stmt->execute([$nombre]);
                }
            }
        }

    public function listarMinijuegos() {
        $query = $this->conexion->query("SELECT * FROM minijuegos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>