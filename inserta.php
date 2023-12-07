<?php

	$host_db = "localhost";
	$usuario_db = "";
	$pass_db = "";
	$dbprefix = "moveintc_datos";
	$conexion = mysqli_connect($host_db, $usuario_db, $pass_db, $dbprefix);

	$n = (isset($_POST['c1'])) ? $_POST['c1'] : '';


	$data = json_decode($_POST['arreglo'], true);

	var_dump($data);

	echo $data;
	$max = sizeof($data);

	$c = 0;
	for ($i = 0; $i <= $max; $i += 4) //4 columnas en la table de html donde se depositaron los datos
	{

		$nombre[$c] = $data[$i]; //Obtiene datos de la columna 0
		$apellido[$c] = $data[$i + 1]; //Obtiene datos de la columna 1
		$cedula[$c] = $data[$i + 2]; //Obtiene datos de la columna 2

		//Se incrementa a 4 para ir al siguiente renglón y obtener datos del registro siguiente
		//en $c va consecutivo para almacenarlos en el arreglo lineal los valores de cada campo

		$r = "INSERT INTO datos1 (Nombre, Apellido, Cedula) VALUES ('$nombre[$c]', '$apellido[$c]' ,'$cedula[$c]')";
		mysqli_query($conexion, $r);
		$c++;
	}

	mysqli_close($conexion);
