<?php
// Dirección o IP del servidor MySQL
$host = "dbalejopalacios.c968etm8fphq.us-east-2.rds.amazonaws.com";
// Puerto del servidor MySQL
$puerto = "3306";
// Nombre de usuario del servidor MySQL
$usuario = "admin";
// Contraseña del usuario
$contrasena = "alejopass1700";
// Nombre de la tabla a trabajar

switch ($_SESSION['Sucursal']) {
    case '1':
        $baseDeDatos = "alejopalacios";
        $enlace = mysqli_connect($host . ":" . $puerto, $usuario, $contrasena, $baseDeDatos);
        break;

    case '2':
        $baseDeDatos = "alejopalacios1";
        $enlace = mysqli_connect($host . ":" . $puerto, $usuario, $contrasena, $baseDeDatos);
        break;

    case '3':
        $baseDeDatos = "alejopalacios2";
        $enlace = mysqli_connect($host . ":" . $puerto, $usuario, $contrasena, $baseDeDatos);
        break;
    default:
        # code...
        break;
}

if (!$enlace) {
    echo "Error: No se puede conectar a MySQL." . PHP_EOL;
    echo "error de depuracion: " . mysqli_connect_errno() . PHP_EOL;
    exit();
}
//echo "Informacion del host: " . mysqli_get_host_info($enlace) . PHP_EOL;
