<?php
//mandamos a llamar la conexion de la bd
include("../conection/conex.php");

$conec = conectar();

//guardar los datos que se envian mediante el post
$No = $_POST['No'];
$COG = $_POST['COG'];
$NumInvenCompleto = $_POST['NumInvenCompleto'];
$TramiteBajas2023 = $_POST['TramiteBajas2023'];
$Estatus = $_POST['Estatus'];
$NombreBien = $_POST['NombreBien'];
$descripcion = $_POST['descripcion'];
$Estado = $_POST['Estado'];
$Municipio = $_POST['Municipio'];
$Inmuble= $_POST['Inmuble'];
$CoordinacionZona = $_POST['CoordinacionZona'];
$NombreLugar = $_POST['NombreLugar'];
$ClaveUbicacion = $_POST['ClaveUbicacion'];
$NombreUsuario = $_POST['NombreUsuario'];
$NumUsuario = $_POST['NumUsuario'];
$Costo = $_POST['Costo'];
$FechaAdqui = $_POST['FechaAdqui'];
$FormaAdqui = $_POST['FormaAdqui'];
$Proveedor = $_POST['Proveedor'];
$Factura = $_POST['Factura'];
$Condiciones = $_POST['Condiciones'];
$Serape = $_POST['Serape'];



$insertarInven = "INSERT INTO inventariogeneral VALUES ('$No','$COG','$NumInvenCompleto','$TramiteBajas2023','1','1','$Estatus','$NombreBien','$descripcion','$Estado','$Municipio','$Inmuble','$CoordinacionZona','$NombreLugar','$ClaveUbicacion','$NombreUsuario','$NumUsuario','$Costo','$FechaAdqui','$FormaAdqui','$Proveedor','$Factura','$Condiciones','$Serape')";

echo $insertarInven;

$queryInsert = mysqli_query($conec, $insertarInven);

if ($queryInsert) {
    echo '<script>alert("guardado correctamente");
    location.href = "../index.php";</script> ';
}
