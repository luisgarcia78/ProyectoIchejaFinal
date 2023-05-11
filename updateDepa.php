<?php
require_once('Conexion.php');

// Obtener el valor seleccionado del select con opciones dinámicas
if(isset($_POST['usuarios'])) {
    $idUsuario = mysqli_real_escape_string($conexion, $_POST['usuarios']);
}

// Obtener los demás valores del formulario y escaparlos para prevenir inyecciones SQL
$n_c = mysqli_real_escape_string($conexion, $_POST['n_c']);
$clave1 = mysqli_real_escape_string($conexion, $_POST['Clave1']);
$clave2 = mysqli_real_escape_string($conexion, $_POST['Clave2']);
$ubicacion = mysqli_real_escape_string($conexion, $_POST['Ubicacion']);
$no_inmueble = mysqli_real_escape_string($conexion, $_POST['No_inmueble']);
$nombre_dep = mysqli_real_escape_string($conexion, $_POST['No_dep']);
$direccion = mysqli_real_escape_string($conexion, $_POST['Direccion']);
$localizacion = mysqli_real_escape_string($conexion, $_POST['Localizacion']);

// Preparar la consulta SQL utilizando parámetros
$stmt = $conexion->prepare("UPDATE departamentos SET N_C=?, Clave1=?, Clave2=?, Ubicacion=?, Inmueble=?, Nombre_Depto=?, Direccion=?, Localizacion=? WHERE IdDeptos=?");
$stmt->bind_param("sssssssss", $n_c, $clave1, $clave2, $ubicacion, $no_inmueble, $nombre_dep, $direccion, $localizacion, $idUsuario);

// Ejecutar la consulta
if ($stmt->execute()) {
    //header('Location: AgregarDepa.php');
    echo "Registro actualizado correctamente";
} else {
    echo "Error al actualizar registro: " . $stmt->error;
}

// Cerrar conexión a la base de datos
$conexion->close();
?>
