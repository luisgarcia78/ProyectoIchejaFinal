<?php
//mandamos a llamar la sesion
session_start();
//destruimos la session
session_destroy();
//redireccionamos a la pagina de login
header("location: ../login.php");
//salimos
exit();
