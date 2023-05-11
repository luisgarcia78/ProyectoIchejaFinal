<?php
require '../config.php';

//datos a consultar
$columns = ['No', 'COG', 'NumInvenCompleto', 'TramiteBajas2023', 'Estatus' , 'NombreBien', 'Descripcion',  'Estado', 'Municipio',  'Inmueble',  'CoordinacionZona', 'NombreLugar', 'ClaveUbicacion', 'NombreUsuario',  'NumUsuario',  'Costo',  'FechaAdquisicion', 'FormaAdquisicion',  'Proveedor', 'Factura', 'Condiciones', 'Observacion', 'ObservacionGral', 'NumeroInventarioConsumo', 'SERAPE'];
//table donde se realiza la consulta
$table = "inventariogeneral";
$id = "NumInvenCompleto";

//recibir el filtro que vamos a aplicar, preevio a eso se limpia el dato, para evitar entrada de datos incorrectos
$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;
//creacion del filtro mediante el uso de un where
$where = '';

//evaluamos que campo no venga vacio
if($campo != null){
    $where = "WHERE (";
    //se genera una variable que guarde el numero de columnas que estan en el arreglo count
    $cont = count($columns);
    //se recorre el arrego de columnas para ir generando el where especifico para cada una de las condiciones y filtros
    for($i=0; $i<$cont; $i++){
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    //eliminar el ultimo OR del WHERE mediante una funcion de remplazo
    $where = substr_replace($where, "", -3);
    $where .= ")";
}
//agregamos un limit que nos ayude a delimitar el numero de registros que se jalaran a la tabla
$limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
//recibimos el valor de la pagina actual desde la funciond e JS
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;
//evaluamos que el valor de pagina sea diferente de 0
if(!$pagina){
    $inicio = 0;
    $pagina = 1;
}
else{
    $inicio = ($pagina - 1) * $limit;
}


$sqlLimit = "LIMIT $inicio, $limit";

//creacion del query para seleccionar mediante el uso de implode() para convertir un arreglo en string y mandar a llamar los datos necesarios
$querySelect = "SELECT SQL_CALC_FOUND_ROWS " . implode(', ', $columns) . "
FROM $table $where $sqlLimit";
//ejecutar el query
$resultado = $conn->query($querySelect);
$num_rows = $resultado->num_rows;

//consulta para obtener el total de registros filtrados
$sqlFiltro = "SELECT FOUND_ROWS()";
//ejecutamos la sentencia sql
$resFiltro = $conn->query($sqlFiltro);
//extraemos en la variable todo el arreglo que obtiene la consulta
$row_filtro = $resFiltro->fetch_array();
//obtenemos la primer fila y columna
$totalFiltro = $row_filtro[0];

//consulta para obtener el total de registros
$sqlTotal = "SELECT count($id) FROM $table";
//ejecutamos la sentencia sql
$resTotal= $conn->query($sqlTotal);
//extraemos en la variable todo el arreglo que obtiene la consulta
$row_total = $resTotal->fetch_array();
//obtenemos la primer fila y columna
$totalRegistros = $row_total[0];

//arreglo para mostrar los resultados
$output = [];
//creamos un primer indice en el arreglo
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

if($num_rows > 0){
    while($row = $resultado->fetch_assoc()){
        $output['data'].= '<tr>';
        $output['data'].= '<td>'.$row['No'].'</td>';
        $output['data'].= '<td>'.$row['COG'].'</td>';
        $output['data'].= '<td>'.$row['NumInvenCompleto'].'</td>';
        $output['data'].= '<td>'.$row['TramiteBajas2023'].'</td>';
        $output['data'].= '<td>'.$row['Estatus'].'</td>';
        $output['data'].= '<td>'.$row['NombreBien'].'</td>';
        $output['data'].= '<td>'.$row['Descripcion'].'</td>';
        $output['data'].= '<td>'.$row['Estado'].'</td>';
        $output['data'].= '<td>'.$row['Municipio'].'</td>';
        $output['data'].= '<td>'.$row['Inmueble'].'</td>';
        $output['data'].= '<td>'.$row['CoordinacionZona'].'</td>';
        $output['data'].= '<td>'.$row['NombreLugar'].'</td>';
        $output['data'].= '<td>'.$row['ClaveUbicacion'].'</td>';
        $output['data'].= '<td>'.$row['NombreUsuario'].'</td>';
        $output['data'].= '<td>'.$row['NumUsuario'].'</td>';
        $output['data'].= '<td>'.$row['Costo'].'</td>';
        $output['data'].= '<td>'.$row['FechaAdquisicion'].'</td>';
        $output['data'].= '<td>'.$row['FormaAdquisicion'].'</td>';
        $output['data'].= '<td>'.$row['Proveedor'].'</td>';
        $output['data'].= '<td>'.$row['Factura'].'</td>';
        $output['data'].= '<td>'.$row['Condiciones'].'</td>';
        $output['data'].= '<td>'.$row['Observacion'].'</td>';
        $output['data'].= '<td>'.$row['ObservacionGral'].'</td>';
        $output['data'].= '<td>'.$row['NumeroInventarioConsumo'].'</td>';
        $output['data'].= '<td>'.$row['SERAPE'].'</td>';
        $output['data'].= '<td><a href=""><i class="bi bi-pencil-square"></i></a></td>';
        $output['data'].= '<td><a href=""><i class="bi bi-arrows-move"></i></a></a></td>';
        $output['data'].= '<td><a class="borrar" href="#"><i class="bi bi-trash3-fill"></i></a></td>';
        $output['data'].= '</tr>';
    }
}else{
    $output['data'].= '<tr>';
    $output['data'].= '<td colspan="5">Sin Resultados</td>';
    $output['data'].= '</tr>';
}

//procedimiento para realizar la paginacion
if($output['totalRegistros'] > 0){
    //la funcion ceil redondea asi arriba para obtener resultados enteros
    $totalPaginas = ceil($output['totalRegistros'] / $limit);

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class=pagination>';

    $numeroInicio = 1;
    if(($pagina - 4) > 1){
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;
    if($numeroFin > $totalPaginas){
        $numeroFin = $totalPaginas;
    }


    for($i = $numeroInicio; $i<= $numeroFin; $i++){
        $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="getData('. $i .')">' . $i . '</a></li>';
    }
    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</ul>';


}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
