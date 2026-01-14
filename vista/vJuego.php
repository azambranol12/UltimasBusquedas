<html>
<head>
    <meta charset="UTF-8">
    <title>Jugando a <?= $nombre_juego ?></title>
    <link rel="stylesheet" href="vista/style.css">
</head>
<body>
    <div class="contenedor">
        <h1>Estás jugando a: <?= $nombre_juego ?></h1>
        
        <div>
            <button type="button" class="jugar">Jugar</button>

            <form action="index.php?c=Minijuego&m=acceder" method="POST">
                <button type="submit" class="volver">Volver</button>
            </form>
        </div>
    </div>
</body>
</html>