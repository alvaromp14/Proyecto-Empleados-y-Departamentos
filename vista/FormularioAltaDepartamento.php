<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Departamento</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <h1>Introduzca los datos para dar de alta un departamento</h1>
        <form action="../controlador/ControladorAltaDepartamento.php" method="POST">
            <label>C&oacute;digo:</label>
            <input type="text" name="codigo" required></input>
            <br><br>
            <label>Descripci&oacute;n:</label>
            <input type="text" name="descripcion" required></input>
            <br><br>
            <label>Localizaci&oacute;n:</label>
            <input type="text" name="localizacion" required></input>
            <br><br>
            <input type="submit" value="Enviar"></input>
        </form>
        <br>
        <a class="volver" href="../vista/MenuGeneral.php">Volver al Inicio</a>
    </body>
</html>