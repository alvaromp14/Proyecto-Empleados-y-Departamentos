<html>
    <head>
        <meta charset="UTF-8">
        <title>Ficha Departamento</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <h1>Ficha Departamento</h1>
        <?php
        if(isset($departamento)){
            echo "<p>Código: " . $departamento['codigo'] . "</p>";
            echo "<p>Descripción: " . $departamento['descripcion'] . "</p>";
            echo "<p>Localización: " . $departamento['localizacion'] . "</p>";
        } else {
            echo "<p>No se encontró el departamento con el código proporcionado.</p>";
        }
        ?>
        <br>
        <a class="volver" href="../vista/MenuGeneral.php">Volver al Inicio</a>
    </body>
</html>