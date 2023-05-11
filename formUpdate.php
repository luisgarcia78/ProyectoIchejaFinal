<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ICHEJA</title>
</head>

<body>
    <h2>Update</h2>
    <form method="post" action="crud/update.php">
        <label for="No">No:</label>
        <input type="text" name="No" id="No">

        <label for="COG">COG:</label>
        <input type="text" name="COG" id="COG">

        <label for="NumInvenCompleto">Numero Inventario:</label>
        <input type="text" name="NumInvenCompleto" id="NumInvenCompleto">

        <label for="TramiteBajas2023">TramiteBjas2023:</label>
        <input type="text" name="TramiteBajas2023" id="TramiteBajas2023">

        <label for="Estatus">Estatus:</label>
        <input type="text" name="Estatus" id="Estatus">

        <label for="NombreBien">Nombre del Bien:</label>
        <input type="text" name="NombreBien" id="NombreBien">

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"></textarea>

        <label for="Estado">Estado:</label>
        <input type="text" name="Estado" id="Estado">

        <label for="Municipio">Municipio":</label>
        <input type="text" name="Municipio"" id="Municipio"">

        <label for="Inmuble">Inmuble:</label>
        <input type="text" name="Inmuble" id="Inmuble">

        <label for="CoordinacionZona">Coordinacion a la que Pertenece:</label>
        <input type="text" name="CoordinacionZona" id="CoordinacionZona">

        <label for="NombreLugar">Nombre Lugar:</label>
        <input type="text" name="NombreLugar" id="NombreLugar">

        <label for="ClaveUbicacion">Clave Ubicacion:</label>
        <input type="text" name="ClaveUbicacion" id="ClaveUbicacion">

        <label for="NombreUsuario">Nombre del Usuario:</label>
        <input type="text" name="NombreUsuario" id="NombreUsuario">

        <label for="NumUsuario">Numero Usuario:</label>
        <input type="text" name="NumUsuario" id="NumUsuario">

        <label for="Costo">Costo:</label>
        <input type="text" name="Costo" id="Costo">

        <label for="FechaAdqui">Fecha Adquisicion:</label>
        <input type="date" name="FechaAdqui" id="FechaAdqui">

        <label for="FormaAdqui">Forma Adquisicion:</label>
        <input type="text" name="FormaAdqui" id="FormaAdqui">

        <label for="Proveedor">Proveedor:</label>
        <input type="text" name="Proveedor" id="Proveedor">

        <label for="Factura">Factura:</label>
        <input type="text" name="Factura" id="Factura">
        
        <label for="Condiciones">Condiciones:</label>
        <input type="text" name="Condiciones" id="Condiciones">

        <label for="Serape">Serape:</label>
        <input type="text" name="Serape" id="Serape">

        <input type="submit" value="Añadir producto">
    </form>
</body>

</html>