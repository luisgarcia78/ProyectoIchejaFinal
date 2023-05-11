<?php
require 'newconect.php';


$json = file_get_contents('php://input');
$data = json_decode($json);
$idDepto = $data->id;

// Obtener el id del departamento que se desea eliminar


// Actualizar el estatus de registro del departamento a 0
$sql = "UPDATE departamentos SET Estatusregistro = 0 WHERE IdDeptos = $idDepto";

if ($conn->query($sql) === TRUE) {
    // Redirigir al usuario a la página donde se muestra la lista de departamentos
    header("Location: Departamentos.php");
} else {
    echo "Error al actualizar el estatus de registro del departamento: " . $conn->error;
}

$conn->close();
?>
