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
        <!-- <link href="path/to/select2.min.css" rel="stylesheet" />
        <script src="path/to/select2.min.js"></script> -->
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
    <br><br><br>
    <h2>PRODUCTOS POR CATEGORÍA</h2>
    <br><br>
    <form class="row px-3" method="post" action="Categorias.php" id="formulario" class="formulario">
        <div class="container">
            <div class = "row">
                <div class="col-md-2">
                    <label class="input-group-text" for="inputGroupSelect01">Categoría</label>
                    <select  type='text' name = "idCategoria" class="form-select" id="inputGroupSelect01">
                        <?php
                            $sql = "select * from categorias";
                            $resultado = mysqli_query($enlace, $sql);
                            while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
                            <!-- En el option se va a guardar lo que este en 'value' -->
                            <option value = "<?php echo $fila[0]?>"><?php echo $fila[1]?></option>
                        <?php
                        }
                        mysqli_free_result($resultado);
                        ?>
                    </select>
                </div>
                <div class="col-md-2"> 
                    <button class="btn btn-primary" type="submit" name="btn_consultar">Consultar</button>
                </div>
            </div>
            
        </div>
    </form>
    <br>
    <?php
    if (isset($_POST['btn_consultar'])) {
            ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <table class="table table-hover table-bordered text-center">
                                <thead >
                                <tr>
                                        <th scope="col">idProducto</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">SubCategoría</th>
                                        <th scope="col">Categoría</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">CostoPromedio</th>
                                        <th scope="col">PrecioPub</th>
                                        <th scope="col">Existencia</th>
                                    </tr>
                                </thead>
                                <?php
                                    $idCat = $_POST['idCategoria'];
                                    $sql = "select p.idProducto, p.Nombre, sc.Concepto, c.Concepto, p.Descripcion, p.CostoPromedio, p.PrecioPub, p.Existencia 
                                            from productos as p INNER JOIN subcategorias as sc on p.idSubCategoria = sc.idSubCategoria 
                                            INNER JOIN categorias as c on sc.idCategoria = c.idCategoria 
                                            where c.idCategoria = '$idCat' order by p.Nombre ASC;                                    ";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                ?>
                                <tbody class="table-light">
                                    <tr>
                                        <td><?php echo $fila[0]?></td>
                                        <td><?php echo $fila[1]?></td>
                                        <td><?php echo $fila[2]?></td>
                                        <td><?php echo $fila[3]?></td>
                                        <td><?php echo $fila[4]?></td>
                                        <td text-align: right><?php echo $fila[5]?></td>
                                        <td text-align: right><?php echo $fila[6]?></td>
                                        <td text-align: right><?php echo $fila[7]?></td>
                                    </tr>
                                </tbody>
                                
                                <?php
                                }
                                mysqli_free_result($resultado);
                                ?>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td text-align: center>Total</td>
                                        <td text-align: right>
                                            <?php
                                            $query = "SELECT SUM(CostoPromedio) AS total FROM productos";
                                            $resultado = mysqli_query($enlace, $query);
                                            
                                            if ($fila = mysqli_fetch_assoc($resultado)) {
                                                $total = $fila['total'];
                                                echo "" . $total;
                                            }
                                            ?>
                                        </td>
                                        <td text-align: right>
                                            <?php
                                            $query = "SELECT SUM(PrecioPub) AS total FROM productos";
                                            $resultado = mysqli_query($enlace, $query);
                                            
                                            if ($fila = mysqli_fetch_assoc($resultado)) {
                                                $total = $fila['total'];
                                                echo "" . $total;
                                            }
                                            ?>
                                        </td>
                                        <td text-align: right>
                                            <?php
                                            $query = "SELECT SUM(Existencia) AS total FROM productos";
                                            $resultado = mysqli_query($enlace, $query);
                                            
                                            if ($fila = mysqli_fetch_assoc($resultado)) {
                                                $total = $fila['total'];
                                                echo "" . $total;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
    </body>
    
    <?php
        $archivo_csv=fopen('ProductosCategoría.csv','w');
        if($archivo_csv){
            $idCat = $_POST['idCategoria'];
            $R = "select p.idProducto, p.Nombre, sc.Concepto, c.Concepto, p.Descripcion, p.CostoPromedio, p.PrecioPub, p.Existencia 
                    from productos as p INNER JOIN subcategorias as sc on p.idSubCategoria = sc.idSubCategoria 
                    INNER JOIN categorias as c on sc.idCategoria = c.idCategoria 
                    where c.idCategoria = '$idCat' order by p.Nombre ASC;                                    ";
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
    </div>

    
    <br><br>
</html>