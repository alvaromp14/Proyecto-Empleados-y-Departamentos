<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ha iniciado sesión y tiene un tipo asignado
if (isset($_SESSION['tipoUsuario'])) {
    $tipoUsuario = $_SESSION['tipoUsuario'];
} else {
    // Si no hay tipo de usuario, redirige al formulario de inicio de sesión
    header("Location: ../vista/index.php");
    exit();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Men&uacute; General</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <h1>Funciones</h1>
        <?php
        echo"Has iniciado sesión como $tipoUsuario<br><br>";
        ?>
        <br>

        <?php if ($tipoUsuario === 'adminEmpleados'): ?>
            <div class="dropdown">
                <label>Empleados</label>
                <div class="dropdown-content">
                    <a href="../vista/FormularioAltaEmpleado.php">Alta Empleado</a>
                    <a href="../vista/FormularioBajaEmpleado.php">Baja Empleado</a>
                    <a href="../vista/FormularioModificarEmpleado.php">Modificar Empleado</a>
                    <a href="../vista/FormularioConsultaFichaEmpleado.php">Consultar Ficha Empleado</a>
                </div>
            </div>

            <div class="dropdown">
                <label>Listados</label>
                <div class="dropdown-content">
                    <a href="../controlador/ControladorListadoEmpleados.php">Listado Empleados</a>
                    <a href="../controlador/ControladorListadoCompletoEmpleados.php">Listado Completo Empleados</a>
                    <a href="../vista/FormularioListadoEmpleadosDepartamento.php">Listado Empleados por Departamento</a>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($tipoUsuario === 'adminDepartamentos'): ?>
            <div class="dropdown">
                <label>Departamentos</label>
                <div class="dropdown-content">
                    <a href="../vista/FormularioAltaDepartamento.php">Alta Departamento</a>
                    <a href="../vista/FormularioBajaDepartamento.php">Baja Departamento</a>
                    <a href="../vista/FormularioModificarDepartamento.php">Modificar Departamento</a>
                    <a href="../vista/FormularioConsultaFichaDepartamento.php">Consultar Ficha Departamento</a>
                </div>
            </div>

            <div class="dropdown">
                <label>Listados</label>
                <div class="dropdown-content">
                    <a href="../controlador/ControladorListadoEmpleados.php">Listado Empleados</a>
                    <a href="../controlador/ControladorListadoCompletoEmpleados.php">Listado Completo Empleados</a>
                    <a href="../vista/FormularioListadoEmpleadosDepartamento.php">Listado Empleados por Departamento</a>
                </div>
            </div>
        <?php endif; ?>
    </body>
</html>