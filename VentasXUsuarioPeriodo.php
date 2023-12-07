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
    <br>
    <h2>VENTAS POR USUARIO Y PERIODO</h2>
    <br><br>
    <form class="row px-3" method="post" action="VentasXUsuarioPeriodo.php" id="formulario" class="formulario">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <label class="input-group-text" for="inputGroupSelect01">Usuario</label>
                </div>
                <div class="col-md-2">
                    <label class="input-group-text" for="FI">Fecha Inicio</label>
                </div>
                <div class="col-md-2">
                    <label class="input-group-text" for="FF">Fecha Fin</label>
                </div>
                
            </div>
            <div class = "row">
                <div class="col-md-2">
                    <select name = "idUsuario" class="form-select" id="inputGroupSelect01">
                        <?php
                            $sql = "select * from usuarios";
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
                    <input type="date" name="FI" id = "FI" required/>
                </div>
                <div class="col-md-2">
                    <input type="date" name="FF" id = "FF" required/>
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
                                    <th scope="col">idVenta</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Condición</th>
                                    <th scope="col">SubTotal</th>
                                    <th scope="col">IVA</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Saldo</th>
                                </tr>
                                </thead>
                                <?php
                                    $Usu = $_POST['idUsuario'];
                                    $FI = $_POST['FI'];
                                    $FF = $_POST['FF'];
                                    $sql = "select v.idVenta, u.Nombre, v.Fecha, v.Condicion, v.Subtotal, v.IVA, v.Total, v.Saldo 
                                            from ventas as v INNER JOIN usuarios as u on v.idCliente = u.idUsuario
                                            where u.idUsuario = '$Usu' AND v.Fecha BETWEEN '$FI' AND '$FF' order by u.Nombre ASC;";
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
                                        <td><?php echo $fila[5]?></td>
                                        <td><?php echo $fila[6]?></td>
                                        <td><?php echo $fila[7]?></td>
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
                                        <td>Total</td>
                                        <td>
                                        <?php
                                            $query = "SELECT SUM(Subtotal) AS total FROM ventas";
                                            $resultado = mysqli_query($enlace, $query);
                                            
                                            if ($fila = mysqli_fetch_assoc($resultado)) {
                                                $total = $fila['total'];
                                                echo "" . $total;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                            $query = "SELECT SUM(IVA) AS total FROM ventas";
                                            $resultado = mysqli_query($enlace, $query);
                                            
                                            if ($fila = mysqli_fetch_assoc($resultado)) {
                                                $total = $fila['total'];
                                                echo "" . $total;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                            $query = "SELECT SUM(Total) AS total FROM ventas";
                                            $resultado = mysqli_query($enlace, $query);
                                            
                                            if ($fila = mysqli_fetch_assoc($resultado)) {
                                                $total = $fila['total'];
                                                echo "" . $total;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $query = "SELECT SUM(Saldo) AS total FROM ventas";
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
            $archivo_csv=fopen('VentaUsuarioPeriodo.csv','w');
            if($archivo_csv){
                $Usu = $_POST['idUsuario'];
                $FI = $_POST['FI'];
                $FF = $_POST['FF'];
                $R = "select v.idVenta, u.Nombre, v.Fecha, v.Condicion, v.Subtotal, v.IVA, v.Total, v.Saldo 
                        from ventas as v INNER JOIN usuarios as u on v.idCliente = u.idUsuario
                        where u.idUsuario = '$Usu' AND v.Fecha BETWEEN '$FI' AND '$FF' order by u.Nombre ASC;";
                $resultado= mysqli_query($enlace,$R);
            
                                fputs($archivo_csv,"idVenta, Nombre, Fecha, Condicion, Subtotal, IVA, Total, Saldo ".PHP_EOL);

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
                          <a href="VentaUsuarioPeriodo.csv" download="VentaUsuarioPeriodo.csv" class= "btn btn-primary btn-lg">Descargar Ventas Por Usuario y Periodo CSV</a>
                     </div>
        </div>
    <br><br>
</html>