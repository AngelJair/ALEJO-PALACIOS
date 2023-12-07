<?php
// confirmar sesion

session_start();


if (!isset($_SESSION['loggedin'])) {

    header('Location: login.php');
    exit;
}

$_SESSION['Sucursal'] = $_SESSION['Sucursal']

?>