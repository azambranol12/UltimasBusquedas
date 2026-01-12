<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de Minijuego</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Selecciona un minijuego</h1>

        <form action="tu_controlador.php" method="GET" class="selector-juego">
            <select name="id_juego" id="juegos">
                <?php
                    echo '<option value="'.$juego['id'].'">'.$juego['nombre'].'</option>'
                ?>
            </select>

            <button type="submit" class="btn-enviar">Ir al juego</button>
        </form>

        <div id="mensaje-error"></div>

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