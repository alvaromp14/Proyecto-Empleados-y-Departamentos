<html>
<head>
    <meta charset="UTF-8">
    <title>Alta Empleado</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <h1>Alta Empleado</h1>
    <?php
    if (isset($_GET['mensaje'])) {
        echo $_GET['mensaje'];
    } else {
        echo "Ocurrió un error inesperado. Por favor, inténtelo de nuevo.";
    }
    ?>
    <br>
    <br>
    <a class="volver" href="../vista/MenuGeneral.php">Volver al Inicio</a>
</body>
</html>