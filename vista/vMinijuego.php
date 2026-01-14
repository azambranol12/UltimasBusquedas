<html>
<head>
    <meta charset="UTF-8">
    <title>Selección de Minijuego</title>
    <link rel="stylesheet" href="vista/style.css">
</head>
<body>

    <div class="contenedor">
        <h1>Selecciona un minijuego</h1>

        <form action="index.php?c=Minijuego&m=juego" method="POST" class="listaBotones">
            <?php
                foreach ($juegos as $juego) {
                    echo '<button type="submit" name="nombreJuego" value="'. $juego['nombre'] . '" class="juego">';
                    echo 'Jugar a ' . $juego['nombre'];
                    echo '</button>';
                }
            ?>
        </form>
        <hr>
        <section class="historial">
            <h3>Últimos juegos visitados</h3>
            <ul>
                <?php
                if (isset($_COOKIE['historial']) && !empty($_COOKIE['historial'])) {
                    $lista = explode('|', $_COOKIE['historial']);
                    
                    foreach ($lista as $juego) {
                        echo '<li>' . $juego . '</li>';
                    }
                } else {
                    echo '<li">Historial vacío</li>';
                }
                ?>
            </ul>
        </section>
    </div>
</body>
</html>