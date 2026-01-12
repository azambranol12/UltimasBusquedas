<?php

class Minijuego extends Conexion{

    public function insercionMasiva() {
        // Los datos están dentro del modelo como pediste
        $nombres = ['Pacman', 'Tetris', 'Snake', 'Flappy Bird', 'Pong'];

        try {
            $this->conexion->query("TRUNCATE TABLE ultimasBusquedas");
            
            $sql = "INSERT INTO ultimasBusquedas (nombre) VALUES (?)";
            $stmt = $this->db->prepare($sql);

            foreach ($nombres as $nombre) {
                $stmt->execute([$nombre]);
            }
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listarMinijuego() {
        return $this->conexion->query("SELECT * FROM Minijuegos")->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>