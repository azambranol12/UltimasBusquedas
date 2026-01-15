<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de Minijuego</title>
    <link rel="stylesheet" href="vista/style.css">
</head>
<body>
    <a href="index.php?c=Minijuego&m=generarPdf">Descargar lista</a>

    <div class="container">
        <h1>Selecciona un minijuego</h1>

        <form action="index.php?c=Juego&m=juego&id=<?= $juego['id'] ?>&nombre=<?= $juego['nombre'] ?>" method="GET">
            <select name="id_juego" id="juegos">
                <?php
                    foreach ($juegos as $juego) {
                        echo '<option value="'.$juego['id'].'">'.$juego['nombre'].'</option>';
                    }
                ?>
            </select>

            <button type="submit" class="btn-enviar">Ir al juego</button>
        </form>


        <hr>

        <section class="historial">
            <h3>Últimos juegos visitados</h3>
            <ul>
                <li>Pacman Retro</li>
                <li>Super Snake</li>
            </ul>
        </section>
    </div>

</body>
</html>