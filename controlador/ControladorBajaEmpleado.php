<?php
include_once '../dao/conexionBD.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conexion = new conexionBD();
        $nif = $_POST["nif"];

        // Llama al método BajaEmpleado
        $exito = $conexion->BajaEmpleado($nif);

        if ($exito) {
            header("Location: ../vista/MensajeBajaEmpleado.php?exito=true");
            exit();
        } else {
            throw new Excepciones("Error al dar de baja al empleado. Por favor, inténtelo de nuevo.");
        }
    } else {
        throw new Excepciones("No se recibieron datos válidos.");
    }
} catch (Excepciones $e) {
    header("Location: ../vista/MensajeBajaEmpleado.php?error=true&mensaje=" . urlencode($e->getMessage()));
    exit();
} catch (Exception $e) {
    header("Location: ../vista/MensajeBajaEmpleado.php?error=true&mensaje=Error inesperado. Por favor, inténtelo de nuevo.");
    exit();
}