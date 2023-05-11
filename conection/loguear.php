<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
//mandamos a llamar el archivo de conexion
include('conex.php');
//iniciamos una variable que llame a la conexion
$conec = conectar();
//iniciamos una variable de session
session_start();

//recibimos un usuario que viene desde el metodo post
$password = mysqli_real_escape_string($conec, $_POST['password']);
$username = mysqli_real_escape_string($conec, $_POST['usuario']);

//query para consultar en la bd los datos que coincidan con la informacion enviada en el formulario
$querySelect = "SELECT * FROM usuarioadmin where NombreUsuario = '$username' and Contrasena = '$password';";
echo $querySelect;
//ejecutar consulta en la base de datos
$consulta = mysqli_query($conec, $querySelect);

//comprobacion para usuarios
if ($consulta->num_rows) {
    //revisar si el password es correcto
    $usuario = mysqli_fetch_assoc($consulta);
    //verificar si el usuario es correcto
    if ($usuario['NombreUsuario'] == $username) {
        $auth = true;
        if ($auth) {
            //el usuario ha sido autenticado
            //llenar el arreglo de la sesion
            $_SESSION['usuario'] = $usuario['NombreUsuario'];
            //regresar al index
            //header('Location: login.php');
            echo "<script>location.href='../index.php';</script>";
        } else {
                    echo  '<script>
            Swal.fire({
            icon: "error",
            title: "Error",
            text: "Usuario o contraseña incorrectos."
            }).then(function() {
            window.location.href = "../login.php";
            });
                </script>';
        }
    } else {
                echo  '<script>
                Swal.fire({
                icon: "error",
                title: "Error",
                text: "Usuario o contraseña incorrectos."
                }).then(function() {
                window.location.href = "../login.php";
                });
                    </script>';
            }
    } else {
            echo  '<script>
            Swal.fire({
            icon: "error",
            title: "Error",
            text: "Usuario o contraseña incorrectos."
            }).then(function() {
            window.location.href = "../login.php";
            });
        </script>';
}