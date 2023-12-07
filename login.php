<?php
session_start();
if (isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Inicio de Sesión</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!-- Option 1: Include in HTML -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="assets/style.css">

</head>

<body>
<?php
$request_uri = $_SERVER['REQUEST_URI'];

// Método solicitado:
$request_method = $_SERVER['REQUEST_METHOD'];

// echo $request_uri, $request_method;

// Obteniendo la información completa de la URL
$url_components = parse_url($request_uri);
$path_url = $url_components['path'];
$path_url = ltrim($path_url, '/');
if (count($url_components) > 1) {
	parse_str($url_components['query'], $query_params);
}
?>
		<div class="main">
			<input type="checkbox" id="chk" aria-hidden="true">

			<?php
			if (isset($query_params)) {
				$error = $query_params['error'];
				echo "
                    <div id='alerta'>
                        <div class='alert alert-info alert-dismissable fade show'>
                            <strong>Atención:</strong> {$error}
                        </div>
                        <hr>
                    </div>
                ";
			}
			?>

			<div class="signup">
				<form action="autenticacion.php" method="post">
					<label for="chk" aria-hidden="true">Inicio de sesión</label>
					<div class="Logo" align='center'>
						<img src="assets/LogoAlejo.png" width="100" height="100">
					</div>
					<br>

					<input type="text" name="usuario" id="usuario" placeholder="Usuario" required="">
					<input type="password" name="password" id="password" placeholder="Contraseña" required="">
					<div style="width: 210px; margin: 0 auto;">
						<select class="form-select form-select-sm" name="Sucursal" id="Sucursal">
							<option value="1">Sucursal 1</option>
							<option value="2">Sucursal 2</option>
							<option value="3">Sucursal 3</option>
						</select>
					</div>
					<button class="buttonLogin" type="submit">Iniciar sesión</button>
				</form>
			</div>

</body>

</html>
<script>
    setTimeout(() => {
        let alerta = document.getElementById('alerta');
        if (alerta)
            alerta.remove();
    }, 4000);
</script>