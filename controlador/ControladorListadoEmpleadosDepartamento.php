<?php
include '../dao/conexionBD.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idDepartamento = $_POST['idDepartamento'];

        $db = new conexionBD();
        $empleados = $db->ListadoEmpleadosDepartamento($idDepartamento);

        // Incluye la vista
        include_once '../vista/VistaListadoEmpleadosDepartamento.php';
        exit();
    } else {
        throw new Excepciones("Método de solicitud no válido");
    }
} catch (Excepciones $e) {
    echo 'Error: ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Error inesperado. Por favor, inténtelo de nuevo.';
}