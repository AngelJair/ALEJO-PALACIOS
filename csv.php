<?php
include("Conexion.php")
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset=" UTF-8">
        <meta name="author" content=" ">
        <title>GRUPO ALEJO</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Hoja de estilo.css">
        <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body bgcolor="#DA81F5">
        <header>
           <div id="logo">
                  <p>
                    <img src="GrupoAlejo.jpg" width="225" height="220" align="left">
                    <h1><em><center>GRUPO ALEJO PALACIOS</center></em></h1>
                  </p>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg  bg-body-tertiary ">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Catálogos
              </a>
              <ul class="dropdown-menu" >
                <li><a class="dropdown-item" href="Categorias.php">Productos Por Categoría</a></li>
                <li><a class="dropdown-item" href="Existencia.php">Productos Por Existencia en Inventario</a></li>
                <li><a class="dropdown-item" href="ProductosAsurtir.php">Productos Por surtir</a></li>
                <li><a class="dropdown-item" href="ListaPrecios.php">Productos Por Lista de Precios</a></li>
                <li><a class="dropdown-item" href="ClientesSaldo.php">Clientes Por Saldo</a></li>
                <li><a class="dropdown-item" href="ClientesTipo.php">Clientes Por Tipo</a></li>
                <li><a class="dropdown-item" href="ProveedorSaldo.php">Proveedores Por Saldo</a></li>
                <li><a class="dropdown-item" href="ProveedoresRepre.php">Proveedores Por Representante</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ventas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="VentasXSaldo.php">Por Saldo</a></li>
                    <li><a class="dropdown-item" href="VentasXCtePeriodo.php">Por Cliente y Período</a></li>
                    <li><a class="dropdown-item" href="VentasXPeriodoCondicion.php">Por Período y Condición</a></li>
                    <li><a class="dropdown-item" href="VentasXUsuarioPeriodo.php">Por Usuario y Período</a></li>
                    <li><a class="dropdown-item" href="VentasVencidas.php">Por Fechas Vencidas</a></li>
                    <li><a class="dropdown-item" href="VentasVencidasXCte.php">Por Fechas Vencidas Por Cliente</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Compras
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="CompraSaldo.php">Por Saldo</a></li>
                    <li><a class="dropdown-item" href="ComprasProveedorYPeriodo.php">Por Proveedor y Período</a></li>
                    <li><a class="dropdown-item" href="ComprasPeriodoCondicion.php">Por Período y Condición</a></li>
                    <li><a class="dropdown-item" href="ComprasVencidas.php">Por Fechas Vencidas</a></li>
                    <li><a class="dropdown-item" href="VencidasProv.php">Por Fechas Vencidas Por Proveedor</a></li>
                  </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ConsultaPagos.php">
                    Pagos
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" href="ConsultaCobros.php" >
                    Cobros
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" href="ConsultaCargos.php" >
                    Cargos
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pedidos
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="ConsultaPedidosCte.php">Por Cliente y Estado</a></li>
                    <li><a class="dropdown-item" href="ConsultaPedidosProv.php">Por Proveedor y Estado</a></li>
                  </ul>
            </li>
        </div>
      </div>
    </nav>
    <?php

            $archivo_csv=fopen('ProductosCategoría.csv','w');

            if($archivo_csv){
                include 'Conexion.php';

                $R="select p.idProducto, p.Nombre, sc.Concepto, c.Concepto, p.Descripcion, p.CostoPromedio, p.PrecioPub, p.Existencia 
                                            from productos as p INNER JOIN subcategorias as sc on p.idSubCategoria = sc.idSubCategoria 
                                            INNER JOIN categorias as c on sc.idCategoria = c.idCategoria 
                                            where c.idCategoria = '$idCat'";
                $resultado= mysqli_query($enlace,$R);
            
                                fputs($archivo_csv,"idProducto, Nombre, SubCategoria, Categoria, Descripcion, CostoPromedio, PrecioPub, Existencia".PHP_EOL);

                while($row = mysqli_fetch_array($resultado))
                {
                    $filacvs=$row['0'].",".$row['1'].",".$row['2'].",".$row['3'].",".$row['4'].",".$row['5'].",".$row['6'].",".$row['7'];
                    fputs($archivo_csv,$filacvs.PHP_EOL);
                }

                fclose($archivo_csv);
                //echo "El archivo fue creado correctamente";   
            }

            else{
                echo "El archivo no existe o no se pudo crear";
            }

    ?>
                     <div class="row">
                      <div class="col-12">
                          <br>
                          <a href="ProductosCategoría.csv" download="ProductosCategoría.csv" class= "btn btn-primary btn-lg">Descargar Productos Por Categoría CSV</a>
                     </div>
                     </div