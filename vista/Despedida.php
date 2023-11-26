<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['usuarioAutenticado'])) {
    $usuarioAutenticado = $_SESSION['usuarioAutenticado'];
} else {
    // Si no hay sesión activa, redirige al formulario de inicio de sesión
    header("Location: ../vista/index.php");
    exit();
}

// Realiza el seguimiento del usuario (incrementa el contador de visitas)
$numVisitas = isset($_COOKIE['numVisitas']) ? $_COOKIE['numVisitas'] + 1 : 1;

// Elimina la cookie y la establece en 0
setcookie('numVisitas', 0, time() - 3600); // Establece la cookie en 0 y la hace expirar

// Cierra la sesión
session_unset();
session_destroy();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Despedida</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <h1>Despedida</h1>
    <p>¡Adi&oacute;s, <?php echo "<b>$usuarioAutenticado</b>"?>!</p>
    <p>N&uacute;mero de visitas: <?php echo $numVisitas; ?></p>
</body>
</html>