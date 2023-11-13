<html>
    <head>
        <meta charset="UTF-8">
        <title>Acceso Administrador</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <?php
    //Comprobar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Verificar las credenciales
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];

        if ($usuario == "root" && $contraseña == "root") {
            echo "<p>Acceso concedido. Redirigiendo...</p>";
            header("Location: ../vista/MenuGeneral.php"); //Redirigir al usuario si las credenciales son correctas
            exit();
        } else {
            echo "<p>Credenciales incorrectas. Int&eacute;ntelo de nuevo.</p>";
        }
    }
    ?>
    <body>
        <h1>Identif&iacute;quese para acceder a la aplicaci&oacute;n</h1>
        <form action="" method="POST">
            <label>Usuario:</label>
            <input type="text" name="usuario" required></input>
            <br><br>
            <label>Contraseña:</label>
            <input type="password" name="contraseña" required></input>
            <br><br>
            <input type="submit" value="Acceder"></input>
        </form>
    </body>
</html>