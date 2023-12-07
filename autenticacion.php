<?php
$_SESSION['Sucursal'] = $_POST['Sucursal'];
// echo "<script>console.log('Console: " . $_SESSION['Sucursal'] . "' );</script>";

include_once('Conexion.php');
session_start();

// Se valida si se ha enviado información, con la función isset()

if (!isset($_POST['usuario'], $_POST['password'])) {

    // si no hay datos muestra error y re direccionar

    header('Location: login.php');
}

// evitar inyección sql

if ($stmt = $enlace->prepare('SELECT idUsuario, contraseña FROM usuarios WHERE Nombre = ?')) {

    // parámetros de enlace de la cadena s

    $stmt->bind_param('s', $_POST['usuario']);
    $stmt->execute();
}


// acá se valida si lo ingresado coincide con la base de datos

$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();

    // se confirma que la cuenta existe ahora validamos la contraseña

    if (md5($_POST['password']) === $password) {

        // la conexion sería exitosa, se crea la sesión

        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['idUsuario'] = $id;
        $_SESSION['Sucursal'] = $_POST['Sucursal'];
        header('Location: index.php');
    } else {

        // usuario incorrecto
        header('Location: login.php?error=El usuario o contraseña son incorrectos');
    }
} else {

    // usuario incorrecto
    header('Location: login.php?error=El usuario o contraseña son incorrectos');
}

$stmt->close();
