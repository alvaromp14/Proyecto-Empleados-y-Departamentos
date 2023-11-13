<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar Empleado</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <?php
        if (isset($_GET['exito']) && $_GET['exito'] == "true") {
            echo "<h1>Empleado modificado con éxito</h1>";
        } else {
            echo "<h1>Error al modificar el empleado</h1>";
        }
        ?>
        <br>
        <a class="volver" href="../vista/MenuGeneral.php">Volver al Inicio</a>
    </body>
</html>