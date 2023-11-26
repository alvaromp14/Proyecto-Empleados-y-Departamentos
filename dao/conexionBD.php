<?php
include_once '../modelo/Departamento.php';
include_once '../modelo/Empleado.php';

class conexionBD {
    private $conexion;
    
public function __construct(){
    //Establecer la conexión con el servidor
    $this->conexion = new mysqli('localhost', 'root', '', 'test');
    //Evitar que se interpreten mal las tildes y ñ.    
    $this->conexion->set_charset("utf8");
    
    //Comprobamos la conexión
    $this->error = $this->conexion->connect_errno;
    $this->mensaje_error = $this->conexion->connect_errno;
    if($this->error != null){
        echo "<p>Error $this->error al conectar con la base de datos<br>";
        echo "$this->mensaje_error</p>";
    }
}

public function cerrarConexion(){
    $this->conexion->close();
}

//Empleados
public function altaEmpleado($codigo, $nif, $apellidos, $nombre, $profesion, $salario, $fechaNac, $fechaIng, $idDepartamento) {
    $query = "INSERT INTO empleado (codigo, nif, apellidos, nombre, profesion, salario, fechaNac, fechaIng, idDepartamento)
              VALUES ('$codigo', '$nif', '$apellidos', '$nombre', '$profesion', $salario, '$fechaNac', '$fechaIng', $idDepartamento)";

    return $this->conexion->query($query);
}

public function BajaEmpleado($nif){
    $query = "DELETE FROM empleado WHERE nif='$nif';";

    if ($this->conexion->query($query) === TRUE) {
        return true;//Retorna true si la operación fue exitosa
    } else {
        echo "<p>Error al dar de baja el empleado: " . $this->conexion->error . "</p>";
        return false;
    }
}

public function ModificarEmpleado($nif, $codigo, $apellidos, $nombre, $profesion, $salario, $fechaNac, $fechaIng, $idDepartamento) {
    $query = "UPDATE empleado SET ";

    if (!empty($codigo)) {
        $query .= "codigo='$codigo', ";
    }
    if (!empty($apellidos)) {
        $query .= "apellidos='$apellidos', ";
    }
    if (!empty($nombre)) {
        $query .= "nombre='$nombre', ";
    }
    if (!empty($profesion)) {
        $query .= "profesion='$profesion', ";
    }
    if (!empty($salario)) {
        $query .= "salario='$salario', ";
    }
    if (!empty($fechaNac)) {
        $query .= "fechaNac='$fechaNac', ";
    }
    if (!empty($fechaIng)) {
        $query .= "fechaIng='$fechaIng', ";
    }
    if (!empty($idDepartamento)) {
        $query .= "idDepartamento='$idDepartamento', ";
    }

    $query = rtrim($query, ', '); // Elimina la última coma y espacio
    $query .= " WHERE nif='$nif';";

    if ($this->conexion->query($query)) {
        return true;
    } else {
        return false;
    }
}

public function consultaFichaEmpleado($nif) {
    $query = "SELECT * FROM empleado WHERE nif = '$nif'";
    $resultado = $this->conexion->query($query);

    if ($resultado->num_rows > 0) {
        return $resultado->fetch_assoc();
    } else {
        return null; // No se encontró el empleado con el NIF proporcionado
    }
}

//Departamentos
public function AltaDepartamento($codigo, $descripcion, $localizacion) {
    $query = "INSERT INTO departamento (codigo, descripcion, localizacion)
                    VALUES ('$codigo', '$descripcion', '$localizacion');";

    if ($this->conexion->query($query) === TRUE) {
        return $this->conexion->insert_id; //Retorna el ID del nuevo departamento
    } else {
        echo "<p>Error al agregar el departamento: " . $this->conexion->error . "</p>";
        return false;
    }
}

public function BajaDepartamento($codigo){
    $query = "DELETE FROM departamento WHERE codigo='$codigo';";

    if ($this->conexion->query($query) === TRUE) {
        return true;//Retorna true si la operación fue exitosa
    } else {
        echo "<p>Error al dar de baja el departamento: " . $this->conexion->error . "</p>";
        return false;
    }
}

public function ModificarDepartamento($codigo, $descripcion, $localizacion) {
    $query = "UPDATE departamento SET ";

    if (!empty($descripcion)) {
        $query .= "descripcion='$descripcion', ";
    }
    if (!empty($localizacion)) {
        $query .= "localizacion='$localizacion', ";
    }
    
    $query = rtrim($query, ', '); // Elimina la última coma y espacio
    $query .= " WHERE codigo='$codigo';";

    if ($this->conexion->query($query)) {
        return true;
    } else {
        return false;
    }
}

public function consultaFichaDepartamento($codigo) {
    $query = "SELECT * FROM departamento WHERE codigo = '$codigo'";
    $resultado = $this->conexion->query($query);

    if ($resultado->num_rows > 0) {
        return $resultado->fetch_assoc();
    } else {
        return null; // No se encontró el departamento con el código proporcionado
    }
}

public function obtenerDepartamentos() {
    $departamentos = array();

    $query = "SELECT id, descripcion FROM departamento";
    $resultado = $this->conexion->query($query);

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $departamentos[] = $fila;
        }
    }

    return $departamentos;
}

//Listados
public function ListadoEmpleados() {
    $query = "SELECT * FROM empleado;";
    $result = $this->conexion->query($query);

    if ($result->num_rows > 0) {
        $empleados = array();
        while ($row = $result->fetch_assoc()) {
            $empleados[] = $row;
        }
        return $empleados;
    } else {
        return null;
    }
}

public function ListadoCompletoEmpleados(){
    $query = "SELECT empleado.*, departamento.descripcion AS departamento, departamento.localizacion
              FROM empleado
              INNER JOIN departamento ON empleado.idDepartamento = departamento.id";

    $result = $this->conexion->query($query);

    if (!$result) {
        die("Error en la consulta: " . $this->conexion->error);
    }

    $empleados = [];

    while ($row = $result->fetch_assoc()) {
        $empleados[] = $row;
    }

    $result->free();

    return $empleados;
}

public function ListadoEmpleadosDepartamento($idDepartamento) {
    $query = "SELECT * FROM empleado WHERE idDepartamento = $idDepartamento";
    $resultado = $this->conexion->query($query);

    $empleados = array();

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $empleados[] = $fila;
        }
    }

    return $empleados;
}

//Autenticación
public function autenticarUsuario($usuario, $contrasena) {
    $query = "SELECT usuario, contraseña FROM credenciales WHERE usuario = '$usuario'";
    $resultado = $this->conexion->query($query);

    if ($resultado) {
        // Verificar si se encontró un usuario
        if ($resultado->num_rows == 1) {
            // Obtener la información del usuario
            $usuarioDB = $resultado->fetch_assoc();

            // Verificar la contraseña
            if ($contrasena == $usuarioDB['contraseña']) {
                // Devolver el tipo de usuario
                return $usuarioDB['usuario'];
            }
        }
    }

    // En caso de error o credenciales incorrectas, devolver false
    return false;
}

}