<?php
//llamamos la sesion
session_start();
//pasamos el usuario de la sesion
$usuario = $_SESSION['usuario'];

//evaluar si existe una session iniciada de lo contrario redirigir a login
if (!isset($usuario)) {
  header("location: login.php");
} else {

  // damos la bienvenida
  // echo "<h1>BIENVENIDO $usuario </h1>";
  //colcoamos boton de salir
  // echo "<a href='conection/salir.php'>Salir</a>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/stylemenu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Almacen</title>

</head>

<body onload="getData(paginaActual);">
  <div class="container-fluid">
    <div class="row justify-content-center align-content-center">
      <div class="col-8 barra">
        <h4 class="text-light"><img src="img/LogoChiapas.png" alt="" class="logoChis">Instituto Chiapaneco De Educación
          Para Jóvenes Y Adultos</h4>
      </div>
      <div class="col-4 text-right barra">
        <ul class="navbar-nav mr-auto">
          <li>
            <a href="index.php" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle user"><?php echo "<h5>Bienvenido $usuario </h5>"; ?></i>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
              <a class="dropdown-item menuperfil cerrar" href="conection/salir.php"><i class="fas fa-sign-out-alt m-1"></i>Salir
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- inicio del menu  -->
  <div class="container-fluid">
    <div class="row">
      <div class="barra-lateral col-12 col-sm-auto">
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a href="index.php"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
              </svg></i><span>Inicio</span></a>

          <a href="Inventario.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="25" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
              <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5ZM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6l.5.667Z" />
            </svg><i class=""></i></i><span>Inventario</span></a>

          <a href="Vales.php"><i> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16">
                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
              </svg></i><span>Vales</span></a>

          <a href="Etiquetas.php"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z" />
              </svg></i><span>Etiquetas</span></a>

          <a href="usuarios.php"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
              </svg></i><span>Usuario</span></a>

          <a href="Coordinaciones.php"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-diagram-3-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1z" />
              </svg></i><span>Coordinaciones</span></a>

          <a href="Departamentos.php"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-building-fill" viewBox="0 0 16 16">
                <path d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H3Zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Z" />
              </svg></i><span>Departamentos</span></a>

          <a href="Plazas.php"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
              </svg></i><span>Plazas comunitarias</span></a>
        </nav>
      </div>
      <!-- fin de menu -->

      <!-- inicio de la informacion que dentro  -->
      <main class="main col" style="width: 80%;">
        <div class="row justify-content-right align-content-center text-center">

          <h1>Inventario</h1>
          <br>
          <form class="d-flex" role="search" style="width: 100%;">
            <div class="flex-grow-2 " style="width: 35%;">

              <input class="form-control" type="search" placeholder="Buscar" id="campo" aria-label="Search" title="buscador de plazas donde puedes buscar a alguna plaza con solo escribir el texto ">
            </div>
            <div class="col-auto">
              <select name="num_registros" id="num_registros" class="form-select">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
              </select>
            </div>
           
            <div>

            </div>

            <div class="row" style="margin-left: 1%; align-items: middle; height: auto;">
              <h5 style="">filtradores:</h5><br>
              <div class="col-md-1 " style=" text-align: justify;">
                <div class="form-check ">
                  <input class="form-check-input" type="checkbox" value="No" id="checkbox1">
                  <label class="form-check-label" for="checkbox1">No
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                  <label class="form-check-label" for="checkbox2">
                  COG
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="Numero Inventario" id="Numero Inventario">
                  <label class="form-check-label" for="checkbox3">
                  Numero Inventario
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                  <label class="form-check-label" for="checkbox3">
                  Tramite Bajas
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox1">
                  <label class="form-check-label" for="checkbox1">Estatus
                  </label>
                </div>
              </div>
              <div class="col-md-1 " style=" text-align: justify; padding-left:12%;">
                
                <div class="form-check" style=" padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                  <label class="form-check-label" for="checkbox2">
                  Nombre Bien
                  </label>
                </div>
                <div class="form-check" style=" padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                  <label class="form-check-label" for="checkbox3">
                  Descripcion
                  </label>
                </div>
                <div class="form-check" style=" padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                  <label class="form-check-label" for="checkbox3">
                  Estado
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox4">
                  <label class="form-check-label" for="checkbox4">
                  Municipio
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px; ">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox5">
                  <label class="form-check-label" for="checkbox5">
                  Inmueble
                  </label>
                </div>
              </div>
              <div class="col-md-1" style="margin-left:8%; padding-left:8%; text-align: justify; width: 100%;">

                
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox6">
                  <label class="form-check-label" for="checkbox6">
                  Coordinacion de Zona a la que Pertenece
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                  <label class="form-check-label" for="checkbox3">
                  Nombre del Lugar
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox4">
                  <label class="form-check-label" for="checkbox4">
                  Clave de Ubicación
                  </label>
                </div>
                
              </div>
              <div class="col-md-1" style="margin-left:8%; padding-left: 12%; text-align: justify; width: 100%;">

              <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox5">
                  <label class="form-check-label" for="checkbox5">
                  Nombre Usuario
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox6">
                  <label class="form-check-label" for="checkbox6">
                  Clave Usuario
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                  <label class="form-check-label" for="checkbox3">
                  Costo
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox4">
                  <label class="form-check-label" for="checkbox4">
                  Forma Adquisición
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox5">
                  <label class="form-check-label" for="checkbox5">
                  Proveedor
                  </label>
                </div>
              </div>
              <div class="col-md-1" style="margin-left:8%; padding-left: 10%; text-align: justify; width: 100%;">


                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox6">
                  <label class="form-check-label" for="checkbox6">
                  Factura
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                  <label class="form-check-label" for="checkbox3">
                  Condiciones
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                  <label class="form-check-label" for="checkbox3">
                  ObservacionGral
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                  <label class="form-check-label" for="checkbox3">
                  NumeroInventarioConsumo
                  </label>
                </div>
                <div class="form-check" style="padding-top: 10px;">
                  <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                  <label class="form-check-label" for="checkbox3">
                  SERAPE
                  </label>
                </div>
              </div>
            </div>
            <div class="row" style="padding-left: ;">
              <!-- inicio del boton spam -->
             
                <div class="boton-modal" style="padding-right: 200px;">
                  <label for="btn-modal">
                    <i class="bi bi-info-circle-fill"></i>
                  </label>
                </div>
                <!--Fin de Boton-->
                <!--Ventana Modal-->
                <input type="checkbox" id="btn-modal">
                <div class="container-modal">
                  <div class="content-modal">
                    <h2>¡Bienvenido!</h2>
                    <p>Lorem, ipsum dolor</p>
                    <div class="btn-cerrar">
                      <label for="btn-modal">Cerrar</label>
                    </div>
                  </div>
                  <label for="btn-modal" class="cerrar-modal"></label>
                </div>
            
              <!-- fin del boton spam -->
            </div>
          </form>
          <div class="row g-4">
            <div>
              <label for="num_registros" class="col-form-label" id="num_registros">Registros: </label>
            </div>
          </div>
          <div class="div_principal" style=" overflow: auto;position: sticky;max-height: 500px; width: 96%;" >

            <table id="results" style="border: 3px solid black;text-align: justify;" class="table table-bordered">
              <thead>
                <th scope="col">No</th>
                <th scope="col">COG</th>
                <th scope="col">Numero Inventario</th>
                <th scope="col">Tramite Bajas </th>
                <th scope="col">Estatus</th>
                <th scope="col">Nombre Bien</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col">Municipio</th>
                <th scope="col">Inmueble</th>
                <th scope="col">Coordinacion de Zona a la que Pertenece</th>
                <th scope="col">Nombre del Lugar</th>
                <th scope="col">Clave de Ubicación</th>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">Clave Usuario</th>
                <th scope="col">Costo</th>
                <th scope="col">Fecha de Adquisición</th>
                <th scope="col">Forma Adquisición</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Factura</th>
                <th scope="col">Condiciones</th>
                <th scope="col">Observacion</th>
                <th scope="col">ObservacionGral</th>
                <th scope="col">NumeroInventarioConsumo</th>
                <th scope="col">SERAPE</th>
              </thead>
              <tbody id="content">

              </tbody>
            </table>

          </div>

          <div class="row">
            <div class="col-6">
              <label id="lbl-total"></label>
            </div>
          </div>
          <div class="col-6" id="nav-paginacion"></div>
          <div>
            <a href="AgregarInventario.php"><button class="btn-add btn-lg">
                <i class="fas fa-plus-circle "></i> Agregar
              </button></a>
          </div>
        </div>
    </div>
    </main>

    <script src="js/load.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>
</body>

</html>