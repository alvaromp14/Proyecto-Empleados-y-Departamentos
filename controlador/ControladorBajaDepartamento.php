<?php
include_once '../dao/conexionBD.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conexion = new conexionBD();
        $codigo = $_POST["codigo"];

        // Llama al método BajaDepartamento
        $exito = $conexion->BajaDepartamento($codigo);

        if ($exito) {
            header("Location: ../vista/MensajeBajaDepartamento.php?exito=true");
            exit();
        } else {
            throw new Excepciones("Error al dar de baja el departamento. Por favor, inténtelo de nuevo.");
        }
    } else {
        throw new Excepciones("No se recibieron datos válidos.");
    }
} catch (Excepciones $e) {
    header("Location: ../vista/MensajeBajaDepartamento.php?error=true&mensaje=" . urlencode($e->getMessage()));
    exit();
} catch (Exception $e) {
    header("Location: ../vista/MensajeBajaDepartamento.php?error=true&mensaje=Error inesperado. Por favor, inténtelo de nuevo.");
    exit();
}