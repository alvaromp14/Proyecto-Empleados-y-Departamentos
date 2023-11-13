<?php
include '../dao/conexionBD.php';

try {
    $db = new conexionBD();
    $empleados = $db->ListadoCompletoEmpleados();

    if (!empty($empleados)) {
        // Incluye la vista
        include '../vista/VistaListadoCompletoEmpleados.php';
        exit();
    } else {
        throw new Excepciones("No hay empleados registrados.");
    }
} catch (Excepciones $e) {
    header("Location: ../vista/MensajeListadoCompletoEmpleados.php?error=true&mensaje=" . urlencode($e->getMessage()));
    exit();
} catch (Exception $e) {
    header("Location: ../vista/MensajeListadoCompletoEmpleados.php?error=true&mensaje=Error inesperado. Por favor, inténtelo de nuevo.");
    exit();
}
?>