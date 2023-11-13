<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Completo de Empleados</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <h1>Listado Completo de Empleados</h1>
        <?php
        if (!empty($empleados)) {
            foreach ($empleados as $empleado) {
                echo "<p>Código: " . $empleado['codigo'] . "</p>";
                echo "<p>NIF: " . $empleado['nif'] . "</p>";
                echo "<p>Apellidos: " . $empleado['apellidos'] . "</p>";
                echo "<p>Nombre: " . $empleado['nombre'] . "</p>";
                echo "<p>Profesión: " . $empleado['profesion'] . "</p>";
                echo "<p>Salario: " . $empleado['salario'] . "</p>";
                echo "<p>Fecha de Nacimiento: " . $empleado['fechaNac'] . "</p>";
                echo "<p>Fecha de Ingreso: " . $empleado['fechaIng'] . "</p>";
                echo "<p>Departamento: " . $empleado['departamento'] . "</p>";
                echo "<p>Localización: " . $empleado['localizacion'] . "</p>";
                echo "<br>";
            }
        } else {
            echo "<p>No hay empleados registrados.</p>";
        }
        ?>
        <br>
        <a class="volver" href="../vista/MenuGeneral.php">Volver al Inicio</a>
    </body>
</html>