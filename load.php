<?php
require 'newconect.php';

$columns = ['IdDeptos','N_C', 'Clave1', 'Clave2', 'Ubicacion', 'Inmueble', 'Nombre_Depto', 'Direccion', 'Localizacion'];
$columns2 = ['Nombre'];
$contadort1 = 'N_C';
//table donde se realiza la consulta
$table = "departamentos";
$tableid = "IdDeptos";
$relatedTable = "usuarios";
$relatedField = "IdUsuario";


//recibir el filtro que vamos a aplicar, preevio a eso se limpia el dato, para evitar entrada de datos incorrectos
$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;
//var_dump($campo);
//$campo= "PLANEACION";
$where = '';


if($campo != null){
    //echo "entre";
    $where = "WHERE (";

    $cont = count($columns);
    for($i = 0; $i < $cont; $i++){
        $where .= $columns[$i] . " LIKE '%". $campo . "%' OR ";
    }
    
    $cont2 = count($columns2);
    for($i = 0; $i < $cont2; $i++){
        $where .= $relatedTable . "." . $columns2[$i] . " LIKE '%". $campo . "%' OR ";
    }

    $where = substr_replace($where, "", -3);
    $where .= ")";
}

/*if($campo != null){
    $where = "WHERE (";

    $cont = count($columns2);
    for($i = 0; $i < $cont; $i++){
        $where .= $columns2[$i] . " LIKE '%". $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}*/

//limit obtenido de los options

$limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if(!$pagina){
    $inicio = 0;
    $pagina = 1;

}else{
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";
//$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

/*if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}*/

//$sLimit = "LIMIT $limit";


//creacion del query para seleccionar mediante el uso de implode() para convertir un arreglo en string y mandar a llamar los datos necesarios
$querySelect = "SELECT SQL_CALC_FOUND_ROWS " . implode(', ', $columns) . ", usuarios.Nombre
FROM $table
JOIN $relatedTable ON $table.$tableid = $relatedTable.$relatedField 
$where AND $table.Estatusregistro = 1
$sLimit";

//echo "La variable \$where contiene: " . $campo;

//ejecutar el query
$resultado = $conn->query($querySelect);
$num_rows = $resultado->num_rows;

$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

$sqlTotal = "SELECT count($contadort1) FROM $table WHERE $table.EstatusRegistro = 1";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

//$html = '';
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';
if($num_rows > 0){
    while($row = $resultado->fetch_assoc()){
       $output['data'] .= '<tr>'; 
       $output['data'] .= '<td>'.$row['N_C'].'</td>';
       $output['data'] .= '<td>'.$row['Clave1'].'</td>';
       $output['data'] .= '<td>'.$row['Clave2'].'</td>';
       $output['data'] .= '<td>'.$row['Ubicacion'].'</td>';
       $output['data'] .= '<td>'.$row['Inmueble'].'</td>';
       $output['data'] .= '<td>'.$row['Nombre_Depto'].'</td>';
       $output['data'] .= '<td>'.$row['Direccion'].'</td>';
       $output['data'] .= '<td>'.$row['Localizacion'].'</td>';
       $output['data'] .= '<td>'.$row['Nombre'].'</td>';
       $output['data'] .= '<td><a  href="ActualizarDepa.php?id=' . $row['IdDeptos'] . '"><i class="bi bi-pencil-square"></i></a></td>';
       $output['data'] .= '<td><a class="borrar" href="#" onclick="eliminarDepartamento(' . $row['IdDeptos'] . ')"><i class="bi bi-trash3-fill"></i></a></td>';
       //$output['data'] .= '<td><a class="btn btn-warning btn-sm" href="EliminarDepa.php?id=' . $row['IdDeptos'] . '">Eliminar</a></td>';
       $output['data'] .= '</tr>';
    }
}else{
   $output['data'] .= '<tr>';
   $output['data'] .= '<td colspan="9">Sin Resultados</td>';
   $output['data'] .= '</tr>';
}

if ($output['totalRegistros'] > 0) {
    $totalPaginas = ceil($output['totalRegistros'] / $limit);
    //echo $totalPaginas;

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class="pagination">';
 
    $numeroInicio = 1;
    if(($pagina - 4) > 1){
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;

    if($numeroFin > $totalPaginas){
        $numeroFin = $totalPaginas;
    }

    for ($i = $numeroInicio; $i <= $totalPaginas; $i++) {
        if($pagina == $i){

            $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';

        }else{
            $output['paginacion'] .= '<li class="page-item "><a class="page-link" href="#" onclick="getData(' . $i . ')">' . $i . '</a></li>';
        }
        
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
//header('Location: Departamentos.php');