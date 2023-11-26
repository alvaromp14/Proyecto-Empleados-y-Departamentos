<?php
// Inicia la sesión
session_start();

// Incrementa el contador de visitas
$numVisitas = isset($_COOKIE['numVisitas']) ? $_COOKIE['numVisitas'] + 1 : 1;
setcookie('numVisitas', $numVisitas, time() + 3600 * 24 * 30); // Cookie válida por 30 días
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Empleados por Departamento</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <h1>Listado de Empleados por Departamento</h1>
        <?php
        if (!empty($empleados)) {
            foreach ($empleados as $empleado) {
                echo "<p>Código: " . $empleado['codigo'] . "</p>";
                echo "<p>NIF: " . $empleado['nif'] . "</p>";
                echo "<p>Apellidos: " . $empleado['apellidos'] . "</p>";
                echo "<p>Nombre: " . $empleado['nombre'] . "</p>";
                echo "<br>";
            }
        } else {
            echo "<p>No hay empleados en este departamento.</p>";
        }
        ?>
        <br>
        <a class="volver" href="../vista/MenuGeneral.php">Volver al Inicio</a>
    </body>
</html>