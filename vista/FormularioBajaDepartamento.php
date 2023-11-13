<html>
    <head>
        <meta charset="UTF-8">
        <title>Baja Departamento</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <h1>Introduzca el c&oacute;digo del departamento que desea dar de baja</h1>
        <form action="../controlador/ControladorBajaDepartamento.php" method="POST">
            <label>C&oacute;digo:</label>
            <input type="text" name="codigo" required></input>
            <br><br>
            <input type="submit" value="Enviar"></input>
        </form>
        <br>
        <a class="volver" href="../vista/MenuGeneral.php">Volver al Inicio</a>
    </body>
</html>